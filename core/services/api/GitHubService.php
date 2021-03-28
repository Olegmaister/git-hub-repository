<?php
namespace core\services\api;



use core\entities\GitHub;

class GitHubService
{
    public function create(array $data) : GitHub
    {

        $gitHub = GitHub::create(
            $data['id'],
            $data['owner']['login'],
            $data['name'],
            $data['html_url'],
            $data['description'],
            $data['stargazers_count']
        );

        return $gitHub;
    }
}