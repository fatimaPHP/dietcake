<?php

class Users extends AppModel
{
    public $validation = array(
        'username' => array(
            'length' => array(
                'validate_between',3,20
            ),
            'unique' => array(
                'is_unique','username','user'
            )
        ),
        'password' => array(
            'length' => array(
                'validate_between',6,20
            )
        )
    );

    public function save()
    {
        $this->validate();

        if($this->hasError()) {
            throw new ValidationException('invalid username or password');
        }

        $db = DB::conn();
        $db->query(
            'INSERT INTO user SET username = ?, password = ?',
            array($this->username, md5($this->password))
        );
    }

    public function isExisting()
    {
        $this->validate();

        if(!empty($user->validation_errors['username']['length']) ||
                !empty($user->validation_errors['password']['length'])
        ) {
            throw new ValidationException('invalid username or password');
        }

        $db = DB::conn();
        $user = $db->row('SELECT * FROM user WHERE username = ? AND password = ?',
            array($this->username, md5($this->password))
        );

        return $user;
    }
}