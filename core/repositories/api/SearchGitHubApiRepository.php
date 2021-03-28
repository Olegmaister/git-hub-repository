<?php
namespace core\repositories\api;

use core\forms\GitHubSearchForm;
use GuzzleHttp\Client;

class SearchGitHubApiRepository
{
    private $client;
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
    public function getList(GitHubSearchForm $form)
    {
        $response = $this->client->request('GET', "https://api.github.com/search/repositories?q={$form->search}&per_page=50&page=1", [
            'json' => [
                'headers' => [
                    'Content-Type' => "application/json",
                    'Accept-Language' => 'ru',
                ],

            ],
        ]);

        $data = json_decode($response->getBody()->getContents(),true);
        return $data;
    }

    public function searchById($id)
    {

        $response = $this->client->request('GET', 'https://api.github.com/repositories/'.$id, [
            'json' => [
                'headers' => [
                    'Content-Type' => "application/json",
                    'Accept-Language' => 'ru',
                ],

            ],
        ]);

        $data = json_decode($response->getBody()->getContents(),true);
        return $data;
    }
}
