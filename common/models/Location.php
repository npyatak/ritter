<?php

namespace common\models;

use Yii;

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
            [['title', 'name'], 'required'],
            [['title', 'place', 'place2', 'subtitle', 'text', 'image', 'image2', 'image_share', 'video', 'video2', 'name', 'video_title', 'video_title2', 'video_image', 'video_image2'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Место',
            'title' => 'Заголовок',
            'subtitle' => 'Подзаголовок',
            'text' => 'Текст',
            'image' => 'Изображение',
            'image2' => 'Изображение 2',
            'image_share' => 'Изображение соц.сети',
            'video' => 'Видео',
            'video2' => 'Видео 2',
            'video_title' => 'Видео заголовок',
            'video_title2' => 'Видео 2 заголовок',
            'place' => 'Город', 
            'place2' => 'Город 2', 
            'video_image' => 'Картинка видео', 
            'video_image2' => 'Картинка видео 2', 
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
