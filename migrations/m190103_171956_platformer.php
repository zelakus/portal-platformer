<?php

use yii\db\Migration;

/**
 * Class m190103_171956_platformer
 */
class m190103_171956_platformer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('highscores', [
            'userid' => $this->integer(),
            'gameid' => $this->integer(),
            'score' => $this->integer()->notNull()
        ],'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4');
        $this->addPrimaryKey('groups_pk', 'highscores', ['userid', 'gameid']);

        $this->createTable('games', [
            'id' => $this->primaryKey(),
            'title' => $this->string(24)->notNull(),
            'url' => $this->string(32)->notNull(),
            'icon' => $this->string(32)->notNull(),
            'description' => $this->string(500)->notNull()
        ],'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'); 
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('highscores');
        $this->dropTable('games');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190103_171956_platformer cannot be reverted.\n";

        return false;
    }
    */
}
