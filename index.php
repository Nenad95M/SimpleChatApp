<?php require_once 'templates/header.php' ?>

<?php

session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    include './components/login_message.php';
} else {
    include './components/initial_message.php';
}
?>
<?php require_once 'templates/footer.php' ?>

