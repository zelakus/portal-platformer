<?php

namespace kouosl\platformer\models;

use Yii;

/**
 * This is the model class for table "games".
 *
 * @property int $id
 * @property string $title
 * @property string $url
 * @property string $icon
 * @property string $description
 */
class Games extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'games';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'url', 'icon', 'description'], 'required'],
            [['title'], 'string', 'max' => 24],
            [['url', 'icon'], 'string', 'max' => 32],
            [['description'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'url' => 'Url',
            'icon' => 'Icon',
            'description' => 'Description',
        ];
    }
}
