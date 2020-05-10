<?php

namespace App\Controllers;

use App\Controllers\User;
use App\Views\View;

class Profile
{
    static public function getProfile($login)
    {
        $user = User::getUser($login);
        return new View('profile', [
            'title'  =>  "Профиль пользователя",
            'profile'   =>  $user,
            'subscribe' => Subscribe::checkSubsriber($user->email)
        ]);
    }

    static public function editProfileForm($login)
    {
        $user = User::getUser($login);
        return new View('edit_profile', [
            'title'  =>  "Редактирование профиля пользователя",
            'profile'   =>  $user,
        ]);
    }

    static public function editProfile($login)
    {
        if (isset($_POST['editProfile'])) {
            $user = User::getUser($login);
            if (password_verify($_POST['password'], $user->password)) {
                $login = htmlspecialchars($_POST['login']) != $user->email ? htmlspecialchars($_POST['login']) : $user->email;
                $fio = htmlspecialchars($_POST['fio']) != $user->email ? htmlspecialchars($_POST['fio']) : $user->fio;
                $newPassword = $_POST['newPassword'] != '' ? password_hash($_POST['newPassword'], PASSWORD_BCRYPT) : $user->password;
                $email = $_POST['email'] != $user->email ? $_POST['email'] : $user->email;
                $avatar = $_POST['avatar'] != '' ? UPLOAD_DIR . $_POST['avatar'] : $user->avatar;
                $about = htmlspecialchars($_POST['about']) != $user->about ? htmlspecialchars($_POST['about']) : $user->about;

                $user->fio = $fio;
                $user->email = $email;
                $user->login = $login;
                $user->password = $newPassword;
                $user->avatar = $avatar;
                $user->about = $about;
                $user->save();
                return header("Location: /profile/$user->login");
            } else {
                return new View('edit_profile', [
                    'title'  =>  "Редактирование профиля пользователя",
                    'error'  => 'Введен не верный пароль',
                    'profile'   =>  $user,

                ]);
            }
        }

    }
}
