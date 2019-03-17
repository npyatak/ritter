<?php

use yii\db\Migration;

use common\models\UserAnswer;

class m190315_112754_alter_table_user_answer extends Migration
{
    
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->addColumn('user_answer', 'status', $this->integer(1)->notNull()->defaultValue(0));

        $userAnswers = UserAnswer::find()->all();
        foreach ($userAnswers as $userAnswer) {
            if($userAnswer->is_shared) {
                $userAnswer->status = 1;
                $userAnswer->save(false, ['status']);
            }
        }
    }

    public function safeDown() {
        $this->dropColumn('user_answer', 'status');
    }
}