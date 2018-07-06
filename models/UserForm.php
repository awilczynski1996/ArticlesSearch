<?php

namespace app\models;

use Yii;
use yii\base\Model;

class UserForm extends Model
{
    public $name;
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['name', 'email', 'password'], 'required'],
            ['email', 'email'],
        ];
    }
}