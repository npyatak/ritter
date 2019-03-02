<?php

use yii\db\Migration;

class m190224_225335_create_table_answer extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%answer}}', [
            'id' => $this->primaryKey(),
            'question_id' => $this->integer()->notNull(),
            'text' => $this->string(255)->notNull(),
            'is_right' => $this->integer(1),
        ], $tableOptions);
        
        $this->addForeignKey("{answer}_question_id_fkey", '{{%answer}}', 'question_id', '{{%question}}', 'id', 'CASCADE', 'CASCADE');

        $this->batchInsert('{{%answer}}', ['question_id', 'text'], [
            [1, '1912'],
            [1, '1935'],
            [1, '1990'],
            [1, '2001'],

            [2, 'Германия'],
            [2, 'Франция'],
            [2, 'Швейцария'],
            [2, 'Дания'],

            [3, 'одна'],
            [3, 'три'],
            [3, 'десять'],
            [3, 'пять'],

            [4, 'Вальденбух'],
            [4, 'Берлин'],
            [4, 'Гамбург'],
            [4, 'Мюнхен'],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%answer}}');
    }
}