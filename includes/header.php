<?php
require 'config/config.php';

if (isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
}
else {
    header("Location: register.php");

}
?>

<html>
<head>
    <title>Welcome to Swirlfeed</title>

    <!--    Javascript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/2d226c3d36.js" crossorigin="anonymous"></script>

    <!--    CSS-->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

    <div class="top_bar">
        <div class="logo">
            <a href="index.php">Swirlfeed</a>
        </div>

        <nav>
            <a href="<?php echo $userLoggedIn; ?>">
                <?php echo $user['first_name']; ?>
            </a>
            <a href="index.php">
                <i class="fas fa-home"></i>
            </a>
            <a href="#">
                <i class="fas fa-mail-bulk"></i>
            </a>
            <a href="#">
                <i class="fas fa-bell"></i>
            </a>
            <a href="#">
                <i class="fas fa-user-friends"></i>
            </a>
            <a href="#">
                <i class="fas fa-cog"></i>
            </a>
            <a href="includes/handlers/logout.php">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </nav>

    </div>



    <div class="wrapper">

