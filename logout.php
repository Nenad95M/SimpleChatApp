<?php

require_once 'classes/user_login.php';
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {

//staticka metoda kojom korisnik prekida sesiju
UserLogIn::setInactive($_SESSION["id"]);

UserLogIn::logOut();
}

?>
