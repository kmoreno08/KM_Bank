<?php



if(isset($_POST["reset-request-submit"])){
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    
    $url = "http://localhost/KM_bank/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    //Expire time for token
    $expires = date("U") + 1800;

    //Database info
    require 'dbh.inc.php';

    //Grab the email the user put in
    $userEmail = $_POST["email"];

    //sql statement to delete
    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    //If it does not succeed 
    if (!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    //sql statement to input pwd fields
    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?); "; //sql statement
    $stmt = mysqli_stmt_init($conn);
    //If it does not succeed 
    if (!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error";
        exit();
    } else {
        // Send info to database of user with hashed password
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }
    //Close the connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $userEmail;
    $subject = 'Reset your password for KM_Bank!';

    $message = '<p>We have recieved a password reset request. Please click the link to reset your password. If you did not make this request, you can ignore this email. </p> ';
    $message .= "<p>Here is your password reset link: </br>";
    $message .= '<a href="' . $url . '">' . $url . '</a></p>';

    $headers = "From: KM_Bank <km_bank@gmail.com>\r\n";
    $headers .= "Reply-To: KM_Bank <km_bank@gmail.com>\r\n";
    $headers .= "Content-type: text/html\r\n";


       

        // Load Composer's autoloader
        require('../PHPMailer-5.2-stable/PHPMailer-5.2-stable/PHPMailerAutoLoad.php');

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '587';
        $mail->isHTML(true);
        $mail->Body = $message;
        $mail->Username = 'kmbank11@gmail.com';
        $mail->Password = "kmbank!!!!";
        $mail->SetFrom('no-reply@kmbank.org');
        $mail->Subject = $subject;
        $mail->addAddress('morenokv@gmail.com');

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }

    //mail($to, $subject, $message, $headers);

    header("Location: ../reset-password.php?reset=success");

} else {
    header("Location: ../index.php");
}