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
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

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
            [['stage_id', 'user_id', 'score', 'is_finished', 'is_shared', 'location_id', 'status'], 'integer'],
            [['answers'], 'string'],
            [['stage_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stage::className(), 'targetAttribute' => ['stage_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'stage_id' => 'Этап',
            'user_id' => 'Пользователь',
            'answers' => 'Answers',
            'location_id' => 'Локация',
            'score' => 'Баллы',
            'is_finished' => 'Окончен?',
            'is_shared' => 'Поделился?',
            'status' => 'Статус',
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

    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }

    public function getStatusArray() {
        return [
            self::STATUS_ACTIVE => 'Участвует',
            self::STATUS_INACTIVE => 'Не участвует',
        ];
    }
}
