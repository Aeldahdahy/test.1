<?php
error_reporting(E_ERROR | E_PARSE);
include('start_session.php');
include('Links.php');
include('Functions.php');
?>
<div class="cont_box">
    <div class="cont">
        <div class="form sign-in">
            <?= Signup(); ?>
            <div class="form_signup">
                <form id="registrationForm" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                    <h2>Create your Account</h2>
                    <label class="investor_radio">
                        <span>Investor</span>
                        <input type="radio" name="user_type" id="user_type1" value="Investor" checked>
                    </label>
                    <label class="Entrepreneur_radio">
                        <span>Entrepreneur</span>
                        <input type="radio" name="user_type" id="user_type2" value="Entrepreneur">
                    </label>
                    <label>
                        <span>First Name</span>
                        <input type="text" name="fname" required>
                    </label>
                    <label>
                        <span>Last Name</span>
                        <input type="text" name="lname" required>
                    </label>
                    <label>
                        <span>Country</span>
                        <input type="text" name="city" required>
                    </label>
                    <label>
                        <span>State</span>
                        <input type="text" name="state" required>
                    </label>
                    <label>
                        <span>Zip code</span>
                        <input type="number" name="zipcode" required>
                    </label>
                    <label>
                        <span>E-mail</span>
                        <input type="email" name="signup_email" required>
                    </label>
                    <label>
                        <span>Password</span>
                        <input type="password" name="signup_password" required>
                    </label>
                    <label>
                        <span>Confirm Password</span>
                        <input type="password" name="cpassword" required>
                    </label>
                    <button type="submit" class="submit_up" name="signup_submit_button">Sign Up</button>
                </form>
            </div>
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                    <div class="description" id="description"></div>
                </div>
                <div class="img__text m--in">
                    <h3>Don't have an account? Please Sign up!<h3>
                </div>
                <div class="img__btn">
                    <span class="m--up">Sign In</span>
                    <span class="m--in">Sign Up</span>
                </div>
            </div>
            <div class="form sign-up" id="signInForm" style="display:block;">
                <h2>Welcome</h2>
                <?php Signin(); ?>
                <div class="form_signin">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                        <label>
                            <span>Email</span>
                            <input type="email" name="signin_email" required>
                        </label>
                        <label>
                            <span>Password</span>
                            <input type="password" name="signin_password" required>
                        </label>
                        <a id="forgetPasswordLink" class="forgot-pass" style="cursor: pointer;" tabindex="1" onclick="showForgetPasswordForm()">Forgot password?</a>
                        <button type="submit" class="submit" name="signin_submit_button">Sign In</button>
                    </form>
                </div>
            </div>
            <div class="form sign-up" id="forgetPasswordForm" style="display:none;">
                <h2>Reset your password</h2>
                <?php ForgetPassword(); ?>
                <div class="form_signin">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                        <label>
                            <span>Email</span>
                            <input type="email" name="forget_email" required>
                        </label>
                        <label>
                            <span>Password</span>
                            <input type="password" name="foget_password" required>
                        </label>
                        <label>
                            <span>Confirm Password</span>
                            <input type="password" name="forget_cpassword" required>
                        </label>
                        <span class="forget_password_button">
                            <a id="backLink" class="forgot-pass" style="cursor: pointer;" tabindex="1" onclick="goBack()">Back!</a>
                            <button type="submit" class="submit" name="forget_submit_button">Reset Password</button>
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('Scripts.php');
?>