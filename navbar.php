<div id="navbar" class="nav">
  <div class="leftSide">
    <a href="index.php" class="logoContent">
      <div class="logo"><img src="/web2-flight/images/SkyKosovoLogo.png" alt="Logo"></div>

      <div class="title">SkyKosovo</div>
    </a>
  </div>
  <div class="nav-links">
    <div class="nav-link-container">
      <a href="offers.php" class="nav-link">
        Offers
      </a>
    </div>
    <div class="nav-link-container">
      <a href="about.php" class="nav-link">
        About Us
      </a>
    </div>
    <div class="nav-link-container">
      <a href="regulations.php" class="nav-link">
        Regulations
      </a>
    </div>
  </div>
  <div class="rightSide">
    <?php

    // start session
    session_start();
    if (isset($_SESSION["loggedin"])) {
      echo ' <a href="logout.php" class="logIn authenticationButton">Log out</a>';
      echo ' <a href="bookings.php" class="bookings authenticationButton">My Bookings</a>';
    } else {
      echo ' <a href="login.php" class="logIn authenticationButton">Log in</a>';
      echo ' <a href="register.php" class="createAccount authenticationButton">Create Account</a>';
    }
    ?>
    <!-- <a href="login.php" class="logIn authenticationButton">Log in</a>
    <a href="register.php" class="createAccount authenticationButton">Create Account</a> -->
  </div>



  <!-- <MobileNav /> -->
</div>