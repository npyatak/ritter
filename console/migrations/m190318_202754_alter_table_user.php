<?php

use yii\db\Migration;

class m190318_202754_alter_table_user extends Migration
{
    
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->addColumn('user', 'password_reset_token', $this->string()->unique());
    }

    public function safeDown() {
        $this->dropColumn('user', 'password_reset_token');
    }
}