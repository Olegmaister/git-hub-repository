<?php
namespace frontend\controllers;

use yii\web\Response;
use core\services\user\UserService;
use yii\web\Controller;

class UserController extends Controller
{
    private $service;

    public function __construct(
        $id,
        $module,
        UserService $service,
        $config = [])
    {
        $this->service = $service;
        parent::__construct($id, $module, $config);
    }

    public function actionAddFavorite()
    {
        $id = (int)\Yii::$app->request->post('id');
        try{
            $this->service->addFavorite($id);
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $items = [
                'success' => true,
                'message' => 'add new repository favorite',
            ];

        }catch (\DomainException $e){
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $items = [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }

        return $items;
    }

    public function actionRemoveFavorite()
    {
        $id = (int)\Yii::$app->request->post('id');
        try{
            $this->service->removeFavorite($id);
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $items = [
                'success' => true,
                'message' => 'remove repository favorite',
            ];

        }catch (\DomainException $e){
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $items = [
                'success' => true,
                'message' => $e->getMessage(),
            ];
        }

        return $items;
    }
}