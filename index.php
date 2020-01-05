<!--KM_Bank Index.php-->
<?php
    require "header.php";
?>


      
<!-- 
 <div class="loginbox">
      <i class="fas fa-user-circle fa-4x"></i>
      <h1>Login Here</h1>
    </div>
	 -->
	
   <?php
        //Logged in will display message. Check if userId is sending any variable back. If so then logged in.
          if (isset($_SESSION['userId'])){
            echo '<p class="login-status"> You are logged in!</p>';
          }
          // Logged out of website
          else {
            echo '<p class="login-status">You are logged out! Test</p>';
          }
        
        ?>

    <div class="carousel">
      <button class="carousel__button carousel__button--left is-hidden">
        <i class="fas fa-angle-left fa-4x"></i>
      </button>
      <div class="carousel__track-container">
        <ul class="carousel__track">
          <li class="carousel__slide current-slide">
            <img
              class="carousel__images"
              src="img/carousel-img/carousel1.jpg"
              alt=""
            />
          </li>
          <li class="carousel__slide">
            <img
              class="carousel__images"
              src="img/carousel-img/carousel2.jpg"
              alt=""
            />
          </li>
          <li class="carousel__slide">
            <img
              class="carousel__images"
              src="img/carousel-img/carousel3.jpg"
              alt=""
            />
          </li>
          <li class="carousel__slide">
            <img
              class="carousel__images"
              src="img/carousel-img/carousel4.jpg"
              alt=""
            />
          </li>
          <li class="carousel__slide">
            <img
              class="carousel__images"
              src="img/carousel-img/carousel5.jpg"
              alt=""
            />
          </li>
          <li class="carousel__slide">
            <img
              class="carousel__images"
              src="img/carousel-img/carousel6.jpg"
              alt=""
            />
          </li>
          <li class="carousel__slide">
            <img
              class="carousel__images"
              src="img/carousel-img/carousel7.jpg"
              alt=""
            />
          </li>
          <li class="carousel__slide">
            <img
              class="carousel__images"
              src="img/carousel-img/carousel8.jpg"
              alt=""
            />
          </li>
        </ul>
      </div>
      <button class="carousel__button carousel__button--right">
        <i class="fas fa-angle-right fa-4x"></i>
      </button>

      <div class="carousel__nav">
        <button class="carousel__indicator current-slide"></button>
        <button class="carousel__indicator"></button>
        <button class="carousel__indicator"></button>
        <button class="carousel__indicator"></button>
        <button class="carousel__indicator"></button>
        <button class="carousel__indicator"></button>
        <button class="carousel__indicator"></button>
        <button class="carousel__indicator"></button>
      </div>
    </div>

    <!-- Login -->
    <div class="loginbox">
      <i class="fas fa-user-circle fa-4x"></i>
      <h1>Login Here</h1>
      <form action="includes/login.inc.php" method="post">
        <p>Username</p>
        <input type="text" name="mailuid" placeholder="Enter Username" />
        <p>Password</p>
        <input type="password" name="pwd" placeholder="Enter Password" />
        <input type="submit" name="login-submit" value="Login" />
        <a href="#">Forgot password?</a><br />
        <a href="signup.php">Not Enrolled? Sign Up Now.</a>
      </form>
    </div>



    <!--  //Section: Information Grid -->
    <br />
    <br />
    <div class="grid-wrapper">
      <div class="grid-line"></div>
      <div class="grid-1-container">
        <div class="grid-pic-1"></div>
        <div class="grid-info-1">
          <h2>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe.
          </h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Voluptates, delectus quos. Accusamus eum atque accusantium!
          </p>
        </div>
        <div class="grid-button-1">Learn more</div>
      </div>

      <div class="grid-line"></div>
      <div class="grid-2-container">
        <div class="grid-pic-2"></div>
        <div class="grid-info-2">
          <h2>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe.
          </h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Voluptates, delectus quos. Accusamus eum atque accusantium!
          </p>
        </div>
        <div class="grid-button-2">Learn more</div>
      </div>

      <div class="grid-line"></div>
      <div class="grid-3-container">
        <div class="grid-pic-3"></div>
        <div class="grid-info-3">
          <h2>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe.
          </h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Voluptates, delectus quos. Accusamus eum atque accusantium!
          </p>
        </div>
        <div class="grid-button-3 ">Learn more</div>
      </div>
    </div>
<?php
  require "footer.php";
?>