<?php

if (isset($_POST['login_button'])){

    $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); //Sanitize email (check if it is in the correct format).

    $_SESSION['log_email'] = $email; //Store email into session variable
    $password = md5($_POST['log_password']); //Get password

    $check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    $check_login_query = mysqli_num_rows($check_database_query);

    if ($check_login_query == 1) {
        $row = mysqli_fetch_array($check_database_query); //Makes us see the results from the $check_database_query and the result is stored in the $row.
        $username = $row['username']; //We say from what we want to see the result, so in this case the username.


        $user_closed_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND user_closed='yes'");
        if (mysqli_num_rows($user_closed_query) == 1) {
           $reopen_account = mysqli_query($con, "UPDATE users SET user_closed='no' WHERE email='$email'");
        }

        $_SESSION['username'] = $username; //Creates a new session variable called 'username' and it's going to set it to the $username.
        header("Location: index.php");
        exit();
    }
    else {
        array_push($error_array, "Email or password was incorrect<br>");
    }

}

?>