<?php require_once 'templates/header.php' ?>

<?php

session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    //pozdrav
    include './components/login_message.php';
//lista ulogovanih korisnika
    include './components/list_of_users.php';

    include './components/chat.php';

} else {
    include './components/initial_message.php';
}
?>
<?php require_once 'templates/footer.php' ?>

