<?php
session_start();


?>
<section id="messages">
<div id="messages-output">

</div>

    <form action="post" id="chat">
    <input type="text" name="chatInput" id="chatInput">
    <button class="btn" type="submit">Send</button>
    </form>
</section>


<?php

// foreach ($messages->printMessage() as $message) {
//     // $time = new \DateTime($message["date_time"]);
//     $time='ad';
//     //korisniku ne zelim da prikazem njegov username u listi aktivnih korisnika
//     echo "<li>" . $message["text"] . '<small> ' . $message["date_time"] . "</small></li>";
// }
// ?> 