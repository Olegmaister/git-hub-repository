<?php

namespace core\entities;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%favorites}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $git_hub_id
 * @property int $api_id
 */
class Favorite extends ActiveRecord
{

    const DISPLAY_ON_PAGE = 10;

    public static function create($userId, $gitHubId, $hubApiId) : self
    {
        $favorite = new self();
        $favorite->user_id = $userId;
        $favorite->git_hub_id = $gitHubId;
        $favorite->api_id = $hubApiId;

        return $favorite;
    }

    public function isGitHubIdEqualTo($gitHubId)
    {
        return $this->git_hub_id === $gitHubId;
    }

    public function isHubApiIdEqualTo($hubApiId)
    {
        return $this->api_id === $hubApiId;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%favorites}}';
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'git_hub_id' => 'Git Hub ID',
        ];
    }

    /*========relations========*/
    public function getHub(): ActiveQuery
    {
        return $this->hasOne(GitHub::class, ['id' => 'git_hub_id']);
    }
}
