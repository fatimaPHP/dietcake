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
                $user->username = Param::get('username');
                $user->password = Param::get('password');

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
}