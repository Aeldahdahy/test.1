<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="images/logo.png" width="100px">Invesco</a>


    <div class="user_profile_drop_down" tabindex="1" id="user_profile_drop_down">
      <img class="img-profile rounded-circle" src="images/undraw_profile.svg" width="40px">
      <?php echo isset($_SESSION['full_name']) ? $_SESSION['full_name'] : header('Location: Signup.php'); ?>
      <span class="user_drop_down_icon"><i class="fa-solid fa-angle-down"></i></span>
      <ul>
        <li><a href="Profile.php">Profile</a></li>
        <li><a href="Logout.php">Sign out</a></li>

      </ul>
    </div>

  </div>
  </div>
</nav>