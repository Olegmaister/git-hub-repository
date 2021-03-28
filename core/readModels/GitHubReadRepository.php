<?php
namespace core\readModels;


use yii\data\ArrayDataProvider;


class GitHubReadRepository
{
    public function getList(array $data)
    {
        $provider =   new ArrayDataProvider([
            'allModels' => $data['items'],
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $provider;

    }
}
