<?php
namespace core\readModels;

use core\entities\Favorite;
use core\helpers\UserHelper;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class FavoriteReadRepository
{
    public function getList()
    {
        return ArrayHelper::map(
            Favorite::find()->where(['user_id' => UserHelper::getUserId()])->all(),
            'api_id',
            'api_id'
        );
    }

    public function getListUser()
    {
        $query = Favorite::find()
            ->with('hub')
            ->where(['user_id' => UserHelper::getUserId()]);

        return $this->getProvider($query);
    }

    private function getProvider($query) : ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => Favorite::DISPLAY_ON_PAGE,
                'pageSizeParam' => false,
                'forcePageParam' => false
            ],

        ]);
    }
}