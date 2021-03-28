<?php

namespace core\entities;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%git_hubs}}".
 *
 * @property int $id
 * @property int $hub_api_id
 * @property string $login
 * @property string|null $name
 * @property string $html_url
 * @property string|null $description
 * @property int $stargazers_count
 */
class GitHub extends ActiveRecord
{

    public static function create($hubApiId,$login, $name, $htmlUrl,$description,$stargazersCount) : self
    {
        $gitHub = new self();
        $gitHub->hub_api_id = $hubApiId;
        $gitHub->login = $login;
        $gitHub->name = $name;
        $gitHub->html_url = $htmlUrl;
        $gitHub->description = $description;
        $gitHub->stargazers_count = $stargazersCount;

        return $gitHub;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%git_hubs}}';
    }

}
