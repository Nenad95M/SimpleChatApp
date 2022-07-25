<?php
class RegisterUser
{
    private $username;
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $password2;

    public function __construct($username, $firstname, $lastname,$email, $password, $password2)
    {
        $this->username = $username;
        $this->firstname=$firstname;
        $this->lastname=$lastname;
        $this->password = $password;
        $this->password2 = $password2;
        $this->email = $email;
    }
    //metoda koja registruje korisnike
   public function sendToDatabase(){
    //za ukljucivanje statickih metoda za povezivanje sa bazom
        require_once 'database/database.php';

    $pdo=Database::getConnection();

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql="INSERT INTO users (username, firstname, lastname, password, email) VALUES (:username, :firstname, :lastname, :password, :email)";

    if($stmt=$pdo->prepare($sql)){
        $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
        $stmt->bindParam(":firstname", $param_firstname, PDO::PARAM_STR);
        $stmt->bindParam(":lastname", $param_lastname, PDO::PARAM_STR);
        $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
        $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);

        $param_username=$this->username;
        $param_firstname=$this->username;
        $param_lastname=$this->username;
        $param_email=$this->username;
        //vrsim enkripciju pasworda pre cuvanja u bazu
        $param_password=password_hash($this->password, PASSWORD_DEFAULT);

        if($stmt->execute()){
           Database::disconnect();
           header("location:login.php");
        } else{
            echo "Imamo problem prilikom registracije";
        }

    }
    unset($pdo);
    unset($stmt);

    } 

}
