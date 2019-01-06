<?php

namespace kouosl\platformer\models;

use Yii;

/**
 * This is the model class for table "highscores".
 *
 * @property int $userid
 * @property int $gameid
 * @property int $score
 */
class Highscores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'highscores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userid', 'gameid', 'score'], 'required'],
            [['userid', 'gameid', 'score'], 'integer'],
            [['userid', 'gameid'], 'unique', 'targetAttribute' => ['userid', 'gameid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'gameid' => 'Gameid',
            'score' => 'Score',
        ];
    }
}
