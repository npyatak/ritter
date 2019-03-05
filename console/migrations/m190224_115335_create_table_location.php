<?php

use yii\db\Migration;

class m190224_115335_create_table_location extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/locations/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%location}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'subtitle' => $this->string(),
            'text' => $this->string(),
            'image' => $this->string(),
            'image2' => $this->string(),
            'image_share' => $this->string(),
            'video' => $this->string(),
            'video2' => $this->string(),
        ], $tableOptions);

        $this->batchInsert('{{%location}}', ['id', 'title', 'subtitle', 'text'], [
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
        $this->dropTable('{{%location}}');
    }
}
/*
основной заголовок к шоколаду
Второстепенный заголовок к шоколаду
ссылку на картинку шоколада без наведения
Ссылку на картинку шоколада по наведению
связанный видео-ролик (ссылка на ID ролика) 
ссылка на картинку шеринга
*/