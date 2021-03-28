<?php
namespace frontend\controllers;

use Yii;
use core\readModels\GitHubReadRepository;
use core\readModels\FavoriteReadRepository;
use core\repositories\api\SearchGitHubApiRepository;
use core\forms\GitHubSearchForm;
use yii\web\Controller;

class SearchController extends Controller
{
    private $searchGitHubApiRepository;
    private $favoriteReadRepository;
    private $gitHubReadRepository;

    public function __construct(
        $id,
        $module,
        SearchGitHubApiRepository $searchGitHubApiRepository,
        FavoriteReadRepository $favoriteReadRepository,
        GitHubReadRepository $gitHubReadRepository,
        $config = [])
    {
        $this->searchGitHubApiRepository = $searchGitHubApiRepository;
        $this->favoriteReadRepository = $favoriteReadRepository;
        $this->gitHubReadRepository = $gitHubReadRepository;
        parent::__construct($id, $module, $config);

    }

    public function actionRequest()
    {
        $form = new GitHubSearchForm();

        if ($form->load(Yii::$app->request->get()) && $form->validate()) {

                $favorites = $this->favoriteReadRepository->getList();
                $provider = $this->gitHubReadRepository->getList(
                    $this->searchGitHubApiRepository->getList($form)
                );

                return $this->render('index',[
                    'provider' => $provider,
                    'favorites' => $favorites
                ]);



        }
    }
}