<?php

use yii\db\Migration;

class m190315_145340_create_table_winner extends Migration
{
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%winner}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'stage_id' => $this->integer()->notNull(),
            'place' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey("{winner}_user_id_fkey", '{{%winner}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey("{winner}_stage_id_fkey", '{{%winner}}', 'stage_id', '{{%stage}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function safeDown() {
        $this->dropForeignKey('{winner}_stage_id_fkey', '{{%winner}}');
        $this->dropForeignKey('{winner}_user_id_fkey', '{{%winner}}');

        $this->dropTable('{{%winner}}');
    }
}
