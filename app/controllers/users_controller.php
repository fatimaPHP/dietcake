<?php

class UsersController extends AppController
{
    public function create()
    {
        $user = new Users;
        $page = Param::get('page_next','create');

        switch ($page) {
            case 'create':
                break;
            case 'create_end':
                $user->username = clean(Param::get('username'));
                $user->password = clean(Param::get('password'));

                try {
                    $user->save();
                } catch (ValidationException $e) {
                    $page = 'create';
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
                        session_start();
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
}