<?php
session_start();

require './classes/message.php';
//kao argument prosledjujem id ulogovanog korisnika
$messages = new Message(13, 15, "PORUKA 3");
try {
    $messages->sendMessage();
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
?>
<section id="messages">

    <h3>Poruke:</h3>
    <ul>
        <?php

        foreach ($messages->printMessage() as $message) {
            //korisniku ne zelim da prikazem njegov username u listi aktivnih korisnika

            echo "<li>" . $message["text"] . '<small> ' . $message["date_time"] . "</small></li>";
        }
        ?>
    </ul>
</section>