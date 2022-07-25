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
        $result=false;
        if(!empty(trim($this->password))){
          $result=true;
        }
        return $result;
    }
    private function validPassword(){
        $result=false;
        if(!empty(trim($this->password))){
          $result=true;
        }
        return $result;
    }

    public function validLoginForm(){
        $result=false;

        if($this->validUsername()&& $this->validPassword()){
            $result=true;
        }
        return $result;
    }
}