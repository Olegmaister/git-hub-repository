<?php
namespace core\repositories;

use core\entities\GitHub;
use http\Exception\RuntimeException;

class GitHubRepository
{
    public function getByGitHubId($hubApiId) : ?GitHub
    {
        return GitHub::find()->where(['hub_api_id' => $hubApiId])->one();
    }

    public function save(GitHub $gitHub) : void
    {
        if(!$gitHub->save()){
            throw new \RuntimeException('Saving error.');
        }

    }
}