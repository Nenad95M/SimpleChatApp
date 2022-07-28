<?php
class loggedUsers{
private $users;

//metoda koja iz baze fecuje sve korisnike 
    private function fetchLoggedUsers(){

    //za ukljucivanje statickih metoda za povezivanje sa bazom
    require_once 'database/database.php';

    $pdo = Database::getConnection();

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT id, username FROM users  WHERE active=1";

    if ($stmt = $pdo->prepare($sql)) {
        if ($stmt->execute()) {
            Database::disconnect();
            $this->users=$stmt;

        } else {
            echo "Imamo problem sa preuzimanjem korisnika iz baze";
        }
    }
    unset($pdo);
    unset($stmt);
    }
    //lista korisnika izvrvsava privatnu metodu koja daje listu korisnika iz baze
    public function listOfLoggedUsers(){
        $this->fetchLoggedUsers();
        return $this->users;        
    }

}
