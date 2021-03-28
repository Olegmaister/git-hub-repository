<?php
namespace frontend\controllers;

use core\readModels\FavoriteReadRepository;
use yii\filters\AccessControl;
use yii\web\Controller;

class FavoriteController extends Controller
{
    private $favoriteReadRepository;

    public function __construct(
        $id,
        $module,
        FavoriteReadRepository $favoriteReadRepository,
        $config = [])
    {
        $this->favoriteReadRepository = $favoriteReadRepository;
        parent::__construct($id, $module, $config);
    }


    public function actionFavorite()
    {
        $provider = $this->favoriteReadRepository->getListUser();
        return $this->render('index',[
            'provider' => $provider
        ]);
    }
}