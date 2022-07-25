<?php
class RegistrationFormValidator
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
    //metoda koja proverava da polja nisu slucajno prazna
    private function notEmpty()
    {
        $result = false;
        if (!empty($this->username) && !empty($this->firstname)&& !empty($this->lastname) && !empty($this->password) && !empty($this->password2) && !empty($this->email)) {
            $result = true;
        }
        return $result;
    }

    //metoda proverava korisnicko ime pomocu regularnih izraza
    private function validUsername()
    {
        $result = false;
        if (preg_match('/^[a-zA-Z0-9\s]+$/', $this->username)) {
            $result = true;
        }
        return $result;
    }
      //metoda proverava  ime pomocu regularnih izraza
      private function validFirstname()
      {
          $result = false;
          if (preg_match('/^[a-zA-Z0-9\s]+$/', $this->firstname)) {
              $result = true;
          }
          return $result;
      }
            //metoda proverava  ime pomocu regularnih izraza
            private function validLastname()
            {
                $result = false;
                if (preg_match('/^[a-zA-Z0-9\s]+$/', $this->lastname)) {
                    $result = true;
                }
                return $result;
            }
    //metoda koja proverava mejl adresu
    private function validEmail()
    {
        $result = false;
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        return $result;
    }

    //proverava da li je korisnik uneo istu lozinku
    private function passwordMatch()
    {
        $result = false;
        if ($this->password === $this->password2) {
            $result = true;
        }
        return $result;
    }
    //proverava da li korisnik mozda vec postoji u bazi
    private function uniqeUser()
    {
        $result = false;
        //uvozim zbog staticke metode za povezivanje sa bazom
        require_once 'database/database.php';

    $pdo=Database::getConnection();

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="SELECT id FROM users WHERE username=:username";
    if($stmt=$pdo->prepare($sql)){
        $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
        $param_username=$this->username;
        if($stmt->execute()){
            if(!($stmt->rowCount()>0)){
                $result =true;
            }
        }
    }
    Database::disconnect();
    unset($stmt);
    return $result;
    }
//javna metoda koja proverava da li su svi inputi validni
    public function isValid(){
        $result=false;
        if($this->notEmpty() && $this->validUsername() && $this->validFirstname() && $this->validLastname() && $this->passwordMatch() && $this->uniqeUser()){
        $result=true;
        }
        else{
            echo "Imamo problem sa unosom";
        }
        return $result;
    }
}
