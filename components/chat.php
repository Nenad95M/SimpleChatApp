<?php
session_start();

require './classes/message.php';
//kao argument prosledjujem id ulogovanog korisnika
$messages = new Message(13, 15, "Pozdrav");
try {
    $messages->sendMessage();
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
?>
<section id="messages">

    <h3>Poruke:</h3>
    <ul class="message-list">
        <?php

        foreach ($messages->printMessage() as $message) {
            // $time = new \DateTime($message["date_time"]);
            $time='ad';
            //korisniku ne zelim da prikazem njegov username u listi aktivnih korisnika
            echo "<li>" . $message["text"] . '<small> ' . $message["date_time"] . "</small></li>";
        }
        ?>
    </ul>
    <form action="post" id="chat">
    <input type="text" name="chatInput" id="chatInput">
    <button class="btn" type="submit">Send</button>
    </form>
</section>