<?php

use yii\db\Migration;

class m190304_125335_create_table_user_answer extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_answer}}', [
            'id' => $this->primaryKey(),
            'stage_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'answers' => $this->text(),
            'score' => $this->integer()->notNull()->defaultValue(0),
        ], $tableOptions);
        
        $this->addForeignKey("{user_answer}_stage_id_fkey", '{{%user_answer}}', 'stage_id', '{{%stage}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey("{user_answer}_user_id_fkey", '{{%user_answer}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey('{user_answer}_stage_id_fkey', '{{%user_answer}}');
        $this->dropForeignKey('{user_answer}_user_id_fkey', '{{%user_answer}}');

        $this->dropTable('{{%user_answer}}');
    }
}