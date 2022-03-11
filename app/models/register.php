<?php

require_once '../app/core/connection.php';

class register extends Connection
{
    public function registerinfo($data){
        
        $data1=$data;
        // echo '<pre>';
        // print_r($data1);
        // return;
        $firstname=$data1['firstname'];
        $lastname=$data1['lastname'];
        $email=$data1['email'];
        $age=$data1['age'];
        $password=$data1['password'];

          $this->connect()->query("INSERT INTO `user` ( `firstname`, `lastname`, `age`, `email`, `password`) VALUES ( '$firstname','$lastname', $age, '$email','$password')");

    }

    public function login($data){
        // echo '<pre>';
        // print_r($data);
        // return;
        $data1=$data;
        $email=$data1['email'];
        $password=$data1['password'];

        $user = $this->connect()->query (" SELECT * FROM `user` WHERE `password`= '$password' AND `email` = '$email' ");
        $admin = $this->connect()->query (" SELECT * FROM `admin` WHERE `password`= '$password' AND `email` = '$email' ");
        $data=['user'=>$user,'admin'=>$admin];
        return $data;

    }
  

}