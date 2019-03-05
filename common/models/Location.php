<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $id
 * @property string $title
 * @property string $subtitle
 * @property string $text
 * @property string $image
 * @property string $image2
 * @property string $image_share
 * @property string $video
 * @property string $video2
 *
 * @property Question[] $questions
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title', 'subtitle', 'text', 'image', 'image2', 'image_share', 'video', 'video2'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'subtitle' => 'Подзаголовок',
            'text' => 'Текст',
            'image' => 'Изображение',
            'image2' => 'Изображение 2',
            'image_share' => 'Изображение соц.сети',
            'video' => 'Видео',
            'video2' => 'Видео 2',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['location_id' => 'id']);
    }
}
