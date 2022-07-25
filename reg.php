<?php
//inicijalizujem sesiju na pocetku
session_start();
//proverom sesije proveravam da li je korisnik mozda vec ulogovan 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true){
    header("location:index.php");
    exit;
}
//pozivam fajl gde je klasa za konekciju sa bazom
require_once "./database/database.php";
$pdo=Database::getConnection();


//preuzimanje inputa 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //uzimam vrednosti iz input polja
$username=trim(htmlspecialchars($_POST['username']));
$firstname=trim(htmlspecialchars($_POST['firstname']));
$lastname=trim(htmlspecialchars($_POST['lastname']));
$email=trim($_POST['email']);
$password= trim($_POST['password']);
$password2=trim($_POST['password2']);


//pozivam fajl sa klasom za registrovanje i instanciram

    require_once "./classes/user_reg.php";
$validateInputs=new RegistrationFormValidator($username, $firstname, $lastname, $email, $password,$password2);
require_once "./classes/register_users.php";
if($validateInputs->isValid()){
$registerUser=new RegisterUser($username, $firstname, $lastname, $email, $password,$password2);
$registerUser->sendToDatabase();
}
}
