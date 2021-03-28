<?php
namespace core\forms;

use yii\base\Model;

class GitHubSearchForm extends Model
{
    public $search;

    public function rules()
    {
        return [
            [['search'],'required'],
            ['search', 'string', 'min' => 3],
            ['search', 'string', 'max' => 100],
        ];
    }
}