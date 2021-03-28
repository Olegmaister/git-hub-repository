<?php
namespace core\repositories;

use core\entities\User;
use yii\web\NotFoundHttpException;

class UserRepository
{

    public function getById($id): User
    {
        return $this->getBy(['id' => $id]);
    }

    public function findByEmail($email): ?User
    {
        return User::find()->where(['email' => $email])->one();
    }



    public function getByEmail($email): User
    {
        return $this->getBy(['email' => $email]);
    }


    public function save(User $user): void
    {
        if (!$user->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    private function getBy(array $condition): User
    {
        if (!$user = User::find()->andWhere($condition)->limit(1)->one()) {
            throw new NotFoundHttpException('User not found.');
        }
        return $user;
    }
}