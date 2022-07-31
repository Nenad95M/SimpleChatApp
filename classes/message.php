<?php
class Message
{
    private $sender;
    private $reciver;
    private $text;
    private $messages;

    public function __construct($sender, $reciver, $text)
    {
        $this->sender = $sender;
        $this->reciver = $reciver;
        $this->text = $text;
    }
    public function sendMessage(){
        //za ukljucivanje statickih metoda za povezivanje sa bazom
        require_once 'database/database.php';
        $pdo = Database::getConnection();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO `messages` (`sender_id`, `reciver_id`, `text`) VALUES (:sender_id, :reciver_id, :text)";

        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(':sender_id', $param_sender, PDO::PARAM_STR);
            $stmt->bindParam(':reciver_id', $param_reciver, PDO::PARAM_STR);
            $stmt->bindParam(':text', $param_text, PDO::PARAM_STR);

            $param_sender =htmlentities($this->sender);
            $param_reciver = htmlentities($this->reciver);
            $param_text = htmlentities($this->text);

            if ($stmt->execute()) {
                Database::disconnect();
            } 
        }
        else{
            echo 'Greska';
        }
        unset($pdo);
        unset($stmt);
    }

    private function fetchMessage()
    {
        //za ukljucivanje statickih metoda za povezivanje sa bazom
        require_once 'database/database.php';

        $pdo = Database::getConnection();

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT `sender_id`, `reciver_id`, `text`, `date_time` FROM `messages` ORDER BY 'date_time' DESC LIMIT 10";

        if ($stmt = $pdo->prepare($sql)) {
            if ($stmt->execute()) {
                Database::disconnect();
                $this->messages = $stmt;
            } else {
                echo "Imamo problem sa preuzimanjem korisnika iz baze";
            }
        }
        unset($pdo);
        unset($stmt);
    }
    
    public function printMessage(){
        $this->fetchMessage();
        return $this->messages;
    }
}