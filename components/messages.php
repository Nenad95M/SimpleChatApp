<?php
session_start();
require './classes/message.php';
//kao argument prosledjujem id ulogovanog korisnika

/*NIJE ZAVRSENO!!!*/

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $str_json = file_get_contents('php://input'); 
    $response = json_decode($str_json, true); 
    
    $lName = $response[0];
    $age = $response[1];
    
    $text = trim(htmlspecialchars($_POST['text']));
    $sender = $_SESSION['id'];
    $reciver = trim(htmlspecialchars($_POST['reciver']));

    //instanciram message i u njega ubacujem korisnikov komentar
    $messages = new Message($sender, $reciver, $text);
    try {
        $messages->sendMessage();
    } catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
    }
}
