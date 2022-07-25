<?php
session_start();
//proverom sesije proveravam da li je korisnik mozda vec ulogovan 
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location:index.php");
    exit;
}
//pozivam fajl gde je klasa za konekciju sa bazom
require_once "./database/database.php";
$pdo = Database::getConnection();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //uzimam inpute iz forme

    $username = trim(htmlspecialchars($_POST['username']));
    $password =trim($_POST['password']);

    require_once "./classes/login_form_validator.php";
    require_once "./classes/user_login.php";

    //proveravam da li je forma validna pomocu klase za validaciju
    $checkFormInput = new LoginFormValidator($username, $password);
    if ($checkFormInput->validLoginForm()) {
        //logujem korisnika
        $loginUser=new UserLogIn($username,$password);
        $loginUser->sendToDatabase();

}
}