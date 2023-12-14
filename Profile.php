<?php
error_reporting(E_ERROR | E_PARSE);
include('Links.php');
include('start_session.php');
include('Navbaraftersignin.php');
include('Functions.php');
?>
<div class="space"></div>

<header>
    <h1>User Profile</h1>
</header>

<section class="profile-section">
    <div class="profile-container">
        <form action="" method="post" enctype="multipart/form-data" class="form-profile">
            <img src="images/invest2.jpg" alt="Profile Picture" class="profile-picture">
            <input type="file" name="profile_photo" accept="image/*">

            <div class="profile-info">
                <span class="profile-text-info"><span class="profile-text-info-title">User ID:</span><?php echo htmlspecialchars($_SESSION['User_ID']); ?></span>
                <span class="profile-text-info"><span class="profile-text-info-title">User Name:</span><?php echo htmlspecialchars($_SESSION['full_name']); ?><i class="fa-solid fa-pen-to-square"></i></span>
                <span class="profile-text-info"><span class="profile-text-info-title">E-mail:</span><?php echo htmlspecialchars($_SESSION['Emial']); ?><i class="fa-solid fa-pen-to-square"></i></span>
                <span class="profile-text-info"><span class="profile-text-info-title">User Type:</span><?php echo htmlspecialchars($_SESSION['User_Type']); ?><i class="fa-solid fa-pen-to-square"></i></span>

                <label for="bio">User Bio:</label>
                <textarea id="bio" name="bio" rows="4" placeholder="Write your bio here..."></textarea>
            </div>
            <button type="submit" class="submit">Update Data</button>
        </form>
    </div>
</section>

<div class="space"></div>




<?php
include('Footer.php');
include('Scripts.php');
?>