<?php
// Alert messages
function showAlerts($classname, $msg)
{
    $alert_msg = <<<TEXT
        <div class='alert alert-$classname'>
                $msg
        </div>
TEXT;
    return $alert_msg;
}

// Add New user
function Signup()
{
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $User_type = htmlspecialchars($_POST["user_type"]);
        $First_name = htmlspecialchars($_POST["fname"]);
        $Last_name = htmlspecialchars($_POST["lname"]);
        $Country = htmlspecialchars($_POST["city"]);
        $State = htmlspecialchars($_POST["state"]);
        $Zip_code = htmlspecialchars($_POST["zipcode"]);
        $E_mail = htmlspecialchars($_POST["signup_email"]);
        $Password = $_POST["signup_password"];
        $Cpassword = $_POST["cpassword"];
        $signup_submit = $_POST['signup_submit_button'];
        if (empty(isset($signup_submit))) {
            return;
        }

        $errors = [];
        if (
            empty($First_name) || empty($Last_name) || empty($Country) || empty($State)
            || empty($Zip_code) || empty($Password)
        ) {
            $errors[] = "Please Fill in All Fields";
        } elseif (strlen($First_name) < 3) {
            $errors[] = "First name should be at least 3 characters";
        } elseif (strlen($Last_name) < 3) {
            $errors[] = "Last name should be at least 3 characters";
        } elseif (strlen($Country) < 3) {
            $errors[] = "Country should be at least 3 characters";
        } elseif (strlen($State) < 3) {
            $errors[] = "State should be at least 3 characters";
        } elseif (strlen($Zip_code) < 1) {
            $errors[] = "Zipcode should be at least 1 characters";
        } elseif (strlen($Password) < 5) {
            $errors[] = "Password should be at least 5 characters";
        } elseif ($Password != $Cpassword) {
            $errors[] = "Password is mismatch";
        }


        for ($i = 0; $i < count($errors); $i++) {
            if (!empty($errors)) {
                echo showAlerts('danger', $errors[$i]);
            }
        }

        if (empty($errors)) {

            $Password = md5($_POST["signup_password"]);


            $connection = mysqli_connect("localhost", "root", "", "investment_system");

            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql_query = "INSERT INTO `user_repository` (`User_Type`, `first_name`, `last_name`, `Address_city`, `Address_state`, `Address_zipcode`, `Emial`, `Password`) ";
            $sql_query .= "VALUES ('$User_type', '$First_name', '$Last_name', '$Country', '$State', '$Zip_code', '$E_mail', '$Password')";
            $send_query = mysqli_query($connection, $sql_query);


            // $send_query = mysqli_stmt_execute($connection, $sql_query);
            // $sql_query .= "VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            // $stmt = mysqli_prepare();

            // mysqli_stmt_bind_param($stmt, "ssssssss", $User_type, $First_name, $Last_name, $Country, $State, $Zip_code, $E_mail, $Password);


            if ($send_query) {
                echo showAlerts('success', "Successfully Registered");
            }
            //else {
            // if (mysqli_errno($connection) == 1062) {
            //     echo showAlerts('danger', "Email address is already in use. Please choose a different one.");
            // } else {
            //     echo showAlerts('danger', "An error occurred during registration. Please try again later.");
            // }
            // }

            // mysqli_stmt_close($stmt);
            // mysqli_close($connection);
        }
    }
}

// Log in user account
function fetchUserDataByEmail($E_mail)
{
    $connection = mysqli_connect("localhost", "root", "", "investment_system");
    $sql_query = "SELECT `User_ID`, `full_name`, `Emial`, `User_Type` FROM `user_repository` WHERE `Emial` = '$E_mail'";
    $send_query = mysqli_query($connection, $sql_query);

    while ($rows = mysqli_fetch_assoc($send_query)) {
        return $rows;
    }

    return [];
}

function Signin()
{
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $E_mail = htmlspecialchars($_POST["signin_email"]);
        $Password = md5(htmlspecialchars($_POST["signin_password"]));
        $signin_submit = $_POST['signin_submit_button'];
        if (empty(isset($signin_submit))) {
            return;
        }

        if (strlen($E_mail) < 8) {
            echo showAlerts('danger', 'Email must be at least 8 characters long');
            return;
        }
        if (strlen($Password) < 6) {
            echo showAlerts('danger', 'Password must be at least 6 characters long');
            return;
        }

        $connection = mysqli_connect("localhost", "root", "", "investment_system");
        $sql_query = "SELECT * from `user_repository` where `Emial` = '$E_mail' AND `Password` = '$Password'";
        $send_query = mysqli_query($connection, $sql_query);

        if (mysqli_num_rows($send_query) > 0) {
            $user_data = fetchUserDataByEmail($E_mail);

            $_SESSION['User_ID'] = $user_data['User_ID'];
            $_SESSION['full_name'] = $user_data['full_name'];
            $_SESSION['Emial'] = $user_data['Emial'];
            $_SESSION['User_Type'] = $user_data['User_Type'];

            if ($_SESSION['User_Type'] == "Investor") {
                header('Location: investor.php');
            }
            if ($_SESSION['User_Type'] == "Entrepreneur") {
                header('Location: entreprenur.php');
            }
            exit;
        } else {
            echo showAlerts('danger', 'Invalid email or password');
        }
    }
}

function ForgetPassword()
{
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $E_mail = $_POST['forget_email'];
        $Password = $_POST['foget_password'];
        $Cpassword = $_POST['forget_cpassword'];
        $forgetsubmitbutton = $_POST['forget_submit_button'];

        if (!isset($forgetsubmitbutton)) {
            return;
        }

        $errors = [];

        if (empty($E_mail) || empty($Password)) {
            $errors[] = "Please Fill in All Fields";
        } elseif (strlen($E_mail) < 8) {
            $errors[] = "E-mail should be at least 8 characters";
        } elseif (strlen($Password) < 5) {
            $errors[] = "Password should be at least 5 characters";
        } elseif ($Password != $Cpassword) {
            $errors[] = "Password is mismatch";
        }

        foreach ($errors as $error) {
            echo showAlerts('danger', $error);
        }

        if (empty($errors)) {
            // Connect to the database
            $connection = mysqli_connect("localhost", "root", "", "investment_system");

            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Retrieve the existing hashed password from the database
            $sql = "SELECT `Password` FROM `user_repository` WHERE `Emial` = '$E_mail'";
            $result = mysqli_query($connection, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $existingPassword = $row['Password'];

                $newHashedPassword = md5($Password);

                // Update the password in the database
                $updateSql = "UPDATE `user_repository` SET `Password` = '$newHashedPassword' WHERE `Emial` = '$E_mail'";
                $updateResult = mysqli_query($connection, $updateSql);

                if ($updateResult) {
                    echo showAlerts('success', "Password Updated Successfully");
                } else {
                    echo showAlerts('danger', "Error updating password: " . mysqli_error($connection));
                }
            } else {
                echo showAlerts('danger', "User not found.");
            }

            // Close the database connection
            mysqli_close($connection);
        }
    }
}




// function UserPhotoUpload($E_mail)
// {
    //     if($_SERVER['REQUEST_METHOD'] === "POST"){
        //         $image =  htmlspecialchars($_POST['user_profile_upload']);
        
        
        //     }
// }