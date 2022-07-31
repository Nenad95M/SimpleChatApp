<?php
session_start();
require './database/database.php';
require './classes/message.php';

if ( isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]) {

    if ( $_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST['text'];
        $sender = $_SESSION['id'];
        $reciver = $_POST['reciver'];

    $messages = new Message($sender, $reciver, $text);
     $messages->sendMessage();
     echo "Poslato";
   

}}

?>