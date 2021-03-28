<?php
namespace core\services\user;

use core\entities\GitHub;
use core\entities\User;
use core\helpers\UserHelper;
use core\repositories\api\SearchGitHubApiRepository;
use core\repositories\GitHubRepository;
use core\repositories\UserRepository;
use core\services\api\GitHubService;

class UserService
{
    private $hubRepository;
    private $gitHubService;
    private $userRepository;
    private $searchGitHubApiRepository;

    public function __construct(
        GitHubRepository $hubRepository,
        UserRepository $userRepository,
        GitHubService $gitHubService,
        SearchGitHubApiRepository $searchGitHubApiRepository
    )
    {
        $this->hubRepository = $hubRepository;
        $this->userRepository = $userRepository;
        $this->gitHubService = $gitHubService;
        $this->searchGitHubApiRepository = $searchGitHubApiRepository;
    }


    public function addFavorite(int $id) :void
    {
        //get user id
        $userId = UserHelper::getUserId();

        /* @var $user User */
        $user = $this->userRepository->getById($userId);

        //
        $gitHub = $this->hubRepository->getByGitHubId($id);

        //
        if(!$gitHub){

            if(!$apiGitHub = $this->searchGitHubApiRepository->searchById($id)){
                throw new \DomainException('not found GitHub repository.');
            }

            /* @var $gitHub GitHub**/
            $gitHub = $this->gitHubService->create($apiGitHub);

            $this->hubRepository->save($gitHub);

        }

        //add  new repository to favorites
        $user->addFavorite($userId,$gitHub->id,$gitHub->hub_api_id);

        //save
        $this->userRepository->save($user);

    }

    public function removeFavorite(int $id) : void
    {
        //get id user
        $userId = UserHelper::getUserId();

        /* @var $user User */
        $user = $this->userRepository->getById($userId);

        $user->removeFavorite($id);

        $this->userRepository->save($user);
    }
}