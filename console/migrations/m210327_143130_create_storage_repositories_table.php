<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%storage_repositories}}`.
 */
class m210327_143130_create_storage_repositories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{git_hubs}}', [
            'id' => $this->primaryKey(),
            'hub_api_id' => $this->integer()->notNull(),
            'login' => $this->string(255)->notNull(),
            'name' => $this->string(255),
            'html_url' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'stargazers_count' => $this->integer()->notNull(),
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%git_hubs}}');
    }
}
