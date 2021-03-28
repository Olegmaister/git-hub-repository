<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%favorites}}`.
 */
class m210327_152746_create_favorites_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        $this->createTable('{{%favorites}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'git_hub_id' => $this->integer()->notNull(),
            'api_id' => $this->integer()->notNull(),
        ],$tableOptions);

        $this->addForeignKey(
            '{{%fk-favorites-user_id}}',
            '{{%favorites}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE');


        $this->addForeignKey(
            '{{%fk-favorites-git_hub_id}}',
            '{{%favorites}}',
            'git_hub_id',
            '{{%git_hubs}}',
            'id',
            'CASCADE');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%favorites}}');
    }
}
