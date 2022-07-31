<?php
session_start();

require './classes/logged_users.php';
//kao argument prosledjujem id ulogovanog korisnika
$loggedUsers = new loggedUsers();

?>
<section id="listOfUsers">

    <h3>Aktivni korisnici:</h3>
    <ul id="users">
        <?php

        foreach ($loggedUsers->listOfLoggedUsers() as $loggedUser) {
            //korisniku ne zelim da prikazem njegov username u listi aktivnih korisnika
            if ($loggedUser["id"] == $_SESSION["id"]) {
                continue 1;
            }
            echo "<li data-id='" . $loggedUser["id"] . "' >" . $loggedUser["username"] . " </li>";
        }
        ?>
    </ul>
</section>