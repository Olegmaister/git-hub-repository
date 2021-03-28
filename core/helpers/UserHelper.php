<?php
namespace core\helpers;

class UserHelper
{
    public static function getUserId()
    {
        return \Yii::$app->user->getId();
    }
}