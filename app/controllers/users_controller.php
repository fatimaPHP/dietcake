<?php

class UsersController extends AppController
{
    public function __construct()
    {
        parent::__construct('users');
        session_start();
    }

    public function register()
    {
        if(isset($_SESSION['login']) && $_SESSION['login'] === true) {
            redirect(url('/'));
        }

        $user = new Users;
        $page = Param::get('page_next','register');

        switch ($page) {
            case 'register':
                break;
            case 'register_end':
                $user->username = clean(Param::get('username'));
                $user->password = clean(Param::get('password'));

                try {
                    $user->save();
                } catch (ValidationException $e) {
                    $page = 'register';
                }
                break;
            default:
                throw new NotFoundException("{$page} not found");
        }

        $this->set(get_defined_vars());
        $this->render($page);
    }

    public function login()
    {
        if(isset($_SESSION['login']) && $_SESSION['login'] === true) {
            redirect(url('/'));
        }

        $result = "";
        $page = Param::get('page_next','login');

        $user = new Users;
        $user->username = clean(Param::get('username'));
        $user->password = clean(Param::get('password'));

        switch ($page) {
            case 'login':
                break;
            case 'login_end':
                try{
                    if($user->isExisting()) {
                        $_SESSION['login'] = true;
                        $_SESSION['user'] = $user->username;
                    } else {
                        $result = 'Invalid username or password';
                        $page = 'login';
                    }
                } catch (ValidationException $e) {
                    $page = 'login';
                }
                break;
            default:
                throw new NotFoundException("{$page} not found");
        }
        $this->set(get_defined_vars());
        $this->render($page);
    }

    public function logout()
    {
        session_destroy();
        redirect(url('users/login'));
    }
}