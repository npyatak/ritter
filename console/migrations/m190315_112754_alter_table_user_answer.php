<?php

use yii\db\Migration;

class m190315_112754_alter_table_user_answer extends Migration
{
    
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->addColumn('user_answer', 'status', $this->integer(1)->notNull()->defaultValue(1));
    }

    public function safeDown() {
        $this->dropColumn('user_answer', 'status');
    }
}