<?php
class UserLogIn
{
    private $username;
    private $password;
  

    public function __construct($username, $password)
    {
        $this->username = $username;

        $this->password = $password;
    }
    //metoda koja registruje korisnike
    public function sendToDatabase()
    {
        //za ukljucivanje statickih metoda za povezivanje sa bazom
        require_once 'database/database.php';

        $pdo = Database::getConnection();

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM users WHERE username = :username";

        if ($stmt = $pdo->prepare($sql)) {
            //bajndujemo username sa upitom
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            //setujemo parametre
            $param_username = $this->username;
            $password=$this->password;
            // ako se stejtment izvrsi idemo dalje sa logovanjem
            if ($stmt->execute()) {
                //ako postoji kolona sa ovim korisnickom imenom fecujemo njene podatke i proveravamo pasword
                if ($stmt->rowCount()>0) {
            //ako ima korisnika fecujemo njegove podatke iz tabele
                    if ($row = $stmt->fetch()) {
                        $tableId = $row["id"];
                        $tableUsername = $row["username"];
                        $tablePassword = $row["password"];
                        if (password_verify($password, $tablePassword)) {
                            //startujemo sesiju da upisemo podatke u nju
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["username"] = $tableUsername;
                            $_SESSION["id"] = $tableId;
                            Database::disconnect();
                            // redirektujemo korisnika na stranicu gde je sada ulogovan
                            header("location:index.php");
                        } else{
                            echo "Netacan password";
                        }
                    } 
                }else{
                    echo "Korisnicko ime nije registrovano";
                }
               
            } else{
                echo "Stejtment nije uspeo da se zavrsi";
            }
            //zatvaramo stejtment
            unset($stmt);
        }
        //zatvaramo konekciju
        unset($pdo);
    }
}
