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

        $this->batchInsert('{{%answer}}', ['question_id', 'text', 'is_right'], [
            [1, '1912', 1],
            [1, '1935', 0],
            [1, '1990', 0],
            [1, '2001', 0],

            [2, 'Германия', 0],
            [2, 'Франция', 0],
            [2, 'Швейцария', 0],
            [2, 'Дания', 1],

            [3, 'одна', 1],
            [3, 'три', 0],
            [3, 'десять', 0],
            [3, 'пять', 0],

            [4, 'Вальденбух', 0],
            [4, 'Берлин', 0],
            [4, 'Гамбург', 0],
            [4, 'Мюнхен', 1],
        ]);
    }

    public function safeDown()
    {
        $this->dropForeignKey('{answer}_question_id_fkey', '{{%answer}}');
        
        $this->dropTable('{{%answer}}');
    }
}