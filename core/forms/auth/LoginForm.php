<?php
namespace core\forms\auth;

use yii\base\Model;

class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            [['email'],'email'],
            ['rememberMe', 'boolean']
        ];
    }

}