<?php

namespace App\Controllers;

use App\Models\User;
use App\Views\View;
use App\Controllers\Authorization;

class Registration
{
    static public function getRegisterForm()
    {
        if (isset($_SESSION["is_auth"]) && $_SESSION["is_auth"] !== true) {
            return new View('registration', [
                'title' => 'Регистрация'
            ]);
        } else {
            if ($_SESSION['user_info']['role'] == 'administrator' || $_SESSION['user_info']['role'] == 'moderator'){
                return header("Location: /admin");
            } else {
                return header("Location: /");
            }
        }
    }

    static public function register()
    {
        if (isset($_POST['register'])) {
            $options = [
                'login' =>  htmlspecialchars($_POST['login']),
                'email' =>  $_POST['email'],
                'password'  =>  password_hash($_POST['password'], PASSWORD_BCRYPT),
                'role_id'   =>  3
            ];
           $user = User::firstOrNew($options);
            try {
                $user->save();
                Authorization::login();
            } catch (\Exception $e){
                var_dump($e->getMessage());
            }

        }
    }

}
