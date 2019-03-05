<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_answer".
 *
 * @property int $id
 * @property int $stage_id
 * @property int $user_id
 * @property string $answers
 * @property int $score
 *
 * @property Stage $stage
 * @property User $user
 */
class UserAnswer extends \yii\db\ActiveRecord
{
    public $answersArray = [];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stage_id', 'user_id'], 'required'],
            [['stage_id', 'user_id', 'score'], 'integer'],
            [['answers'], 'string'],
            [['stage_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stage::className(), 'targetAttribute' => ['stage_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'stage_id' => 'Stage ID',
            'user_id' => 'User ID',
            'answers' => 'Answers',
            'score' => 'Score',
        ];
    }

    public function beforeSave($insert) 
    {
        $this->answers = json_encode($this->answersArray, true);

        return parent::beforeSave($insert);
    }

    public function afterFind() 
    {
        $this->answersArray = json_decode($this->answers, true);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStage()
    {
        return $this->hasOne(Stage::className(), ['id' => 'stage_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
