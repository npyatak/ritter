<?php

namespace common\models;

use Yii;

class Question extends \yii\db\ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    public $answersArray;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'stage_id'], 'integer'],
            [['title', 'subtitle', 'text', 'comment_wrong', 'comment_right', 'link', 'image'], 'string', 'max' => 255],
            ['answersArray', function($attribute, $params) {
                if(count($this->answersArray) < 2) {
                    $this->addError($attribute, 'Не менее двух вариантов ответов');
                } elseif(count($this->answersArray) > 5) {
                    $this->addError($attribute, 'Не более пяти вариантов ответов');
                } else {
                    foreach ($this->answersArray as $item) {
                        $item->validate();
                        if($item->hasErrors()) {
                            $this->addError($attribute, 'Необходимо заполнить варианты ответов');
                        }
                    }
                }
            }],
        ];
    }

    public function afterSave($insert, $changedAttributes) {
        $answerIds = [];
        $oldIds = Answer::find()->select('id')->where(['question_id' => $this->id])->column();
        foreach ($this->answersArray as $answer) {
            if($answer->id) {
                $answerIds[] = $answer->id;
            }
            $answer->question_id = $this->id;
            $answer->save();
        }

        foreach (array_diff($oldIds, $answerIds) as $idToDel) {
            Answer::findOne($idToDel)->delete();
        }

        return parent::afterSave($insert, $changedAttributes);
    }

    public function loadAnswers($newModels) {
        foreach ($newModels as $model) {
            if(isset($model['id']) && $model['id']) {
                $answer = Answer::findOne($model['id']);
            } else {
                $answer = new Answer;
            }
            $answer->load($model);
            $answer->attributes = $model;
            $this->answersArray[] = $answer;
        }

        return $this->answersArray;
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
            'comment_wrong' => 'Комментарий для правильного',
            'comment_right' => 'Комментарий для неправильного',
            'link' => 'Ссылка',
            'image' => 'Изображение',
            'stage_id' => 'Этап',
            'status' => 'Статус',
        ];
    }
    
    public function getStage()
    {
        return $this->hasOne(Stage::className(), ['id' => 'stage_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answer::className(), ['question_id' => 'id']);
    }

    public function getStatusArray() {
        return [
            self::STATUS_ACTIVE => 'Активен',
            self::STATUS_INACTIVE => 'Не активен',
        ];
    }
}
