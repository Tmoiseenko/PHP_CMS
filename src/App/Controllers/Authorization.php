<?php

namespace App\Controllers;

use App\Models\User;
use App\Views\View;

class Authorization
{
    static public function getLoginForm()
    {
        if (isset($_SESSION["is_auth"]) && $_SESSION["is_auth"] === true && $_SESSION['user_info']['role'] == 'administrator' && $_SESSION['user_info']['role'] == 'moderator') {
            header("Location: /admin");
        } else {
            return new View('login', [
                'title' => 'Вход в систему'
            ]);
        }
    }

    static public function login()
    {
        try {
            $user = User::where('login', '=', htmlspecialchars($_POST['login']))->firstOrFail();
            if(password_verify($_POST['password'], $user->password)){
                $_SESSION['user_info']['email'] = $user->email;
                $_SESSION['user_info']['role'] = $user->role->name;
                $_SESSION["is_auth"] = true;
                if (isset($_SESSION["logon_error"])) {
                    unset($_SESSION["logon_error"]);
                }
                if ($_SESSION['user_info']['role'] == 'administrator' || $_SESSION['user_info']['role'] == 'moderator'){
                    return header("Location: /admin");
                } else {
                    return header("Location: /");
                }
            } else {
                $_SESSION["is_auth"] = false;
                $_SESSION["logon_error"] = true;
                return header("Location: /login");
            }
        } catch (\Exception $e) {
            $_SESSION["is_auth"] = false;
            $_SESSION["logon_error"] = true;
            return header("Location: /login");
        }
    }

    static public function logout()
    {
        if ($_SESSION["is_auth"] === true) {
            $_SESSION["is_auth"] = false;
            unset($_SESSION['logon_error']);
            unset($_SESSION['user_info']);
            header("Location: /");
        }

    }

}