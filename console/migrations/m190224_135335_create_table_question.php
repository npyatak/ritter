<?php

use yii\db\Migration;

class m190224_135335_create_table_question extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%question}}', [
            'id' => $this->primaryKey(),
            'stage_id' => $this->integer(),
            'status' => $this->integer(1)->notNull()->defaultValue(1),
            'title' => $this->string()->notNull(),
            'subtitle' => $this->string(),
            'text' => $this->string(),
            'comment_wrong' => $this->string(),
            'comment_right' => $this->string(),
            'link' => $this->string(),
            'image' => $this->string(),
        ], $tableOptions);
        
        $this->addForeignKey("{question}_stage_id_fkey", '{{%question}}', 'stage_id', '{{%stage}}', 'id', 'RESTRICT', 'RESTRICT');

        $this->batchInsert('{{%question}}', ['id', 'title', 'subtitle', 'text'], [
        	[
	            1,
	            'Extra nut. Цельный миндаль',
	            'шоколад молочный',
	            'В каком году началось производство шоколада Ritter Sport?',
			],
        	[
	            2,
	            'Extra nut. Цельный миндаль',
	            'шоколад молочный',
	            'А какая страна является Родиной шоколада Ritter Sport?',
			],
        	[
	            3,
	            'Extra nut. Цельный миндаль',
	            'шоколад молочный',
	            'Скажите, сколько фабрик Ritter Sport на данный момент мире?',
			],
        	[
	            4,
	            'Extra nut. Цельный миндаль',
	            'шоколад молочный',
	            'В каком городе находится единственная фабрика шоколада Ritter Sport?',
			],
        ]);
    }

    public function safeDown()
    {
        $this->dropForeignKey('{question}_stage_id_fkey', '{{%question}}');

        $this->dropTable('{{%question}}');
    }
}
