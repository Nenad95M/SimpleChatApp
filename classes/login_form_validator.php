<?php 

class LoginFormValidator{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
    private function validUsername(){
     
        return !empty(trim($this->password));
    }
    private function validPassword(){
    
        return !empty(trim($this->password));
    }

    public function validLoginForm(){
   
        return $this->validUsername()&& $this->validPassword();
    }
}