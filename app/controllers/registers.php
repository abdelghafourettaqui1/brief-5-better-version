<?php

class registers extends controller
{
    public function index()
    {

        $this->view('register/register');
    }
    public function showlogin()
    {
        $this->view('register/login');
    }

    public function login()
    {
        if(isset($_POST['login'])){
            // echo "hello";
            // die;    
            $data = [
                'email' => $_POST["email"],
                'password' => $_POST["password"]
            ];
            $this->model = $this->model('register');
            $test = $this->model->login($data);
            $user = $test['user']->fetch_assoc();
            $admin = $test['admin']->fetch_assoc();
            //    echo '<pre>';
            //    print_r($admin['idadmin']);
            //   return;

            if (empty($user)) {
                echo '<script> alert("invalid password or email")</script>';
                $this->view('register/login');
            }
             else if (!empty($user)) {
                session_start();
                
                $_SESSION['iduser'] = $user['iduser'];
                header("location: " . URL . "users/index" );
            }
            if (empty($admin)) {
                echo '<script> alert("invalid password or email")</script>';
                $this->view('register/login');
            } 
            elseif (!empty($admin)) {
                session_start();
                 $_SESSION['idadmin'] = $admin['idadmin'];

                header("location: " . URL . "admins/showAllflight");
            }
        }
        else{
            // echo "I'm here";
            // return;
            $this->view('register/login');
        }
         
    }


    public function info()
    {
        if (isset($_POST["register"])) {

            $data = [
                'firstname' => $_POST["firstname"],
                'lastname' => $_POST["lastname"],
                'age' => $_POST["age"],
                'email' => $_POST["email"],
                'password' => $_POST["password"],
                'repeat' => $_POST["repeat"],
                'firstnameerror' => "",
                'lastnameerror' => "",
                'ageerror' => "",
                'emailerror' => "",
                'passworderror' => ""
            ];
        }
        if (empty($data['firstname'])) {
            $data['firstnameerror'] = "please enter firstname";
        }
        if (empty($data['lastname'])) {
            $data['lastnameerror'] = "please enter lastname";
        }
        if (empty($data['age'])) {
            $data['ageerror'] = "please enter age";
        }

        if (empty($data['email'])) {
            $data['emailerror'] = "please enter email";
        } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $data['emailerror'] = "please enter the correct email format";
        }

        if (empty($data['password'])) {
            $data['passworderror'] = "password doesn't match";
        } else if ($data['password'] !== $data['repeat']) {
            $data['passworderror'] = "password doesn't match";
        }

        if (empty($data['firstnameerror']) && empty($data['emailerror']) && empty($data['passworderror']) && empty($data['lastnameerror']) && empty($data['ageerror'])) {
            $this->model = $this->model('register');
            $this->model->registerinfo($data);
            $this->view('register/login');
        }
    }
}
