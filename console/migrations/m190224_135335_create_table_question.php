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
            'location_id' => $this->integer(),
            'status' => $this->integer(1)->notNull()->defaultValue(1),
            'text' => $this->string(),
            'video' => $this->string(),
            'comment_wrong' => $this->string(),
            'comment_right' => $this->string(),
        ], $tableOptions);
        
        $this->addForeignKey("{question}_stage_id_fkey", '{{%question}}', 'stage_id', '{{%stage}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey("{question}_location_id_fkey", '{{%question}}', 'location_id', '{{%location}}', 'id', 'RESTRICT', 'RESTRICT');

        $this->batchInsert('{{%question}}', ['id', 'location_id', 'stage_id', 'video', 'text', 'comment_right', 'comment_wrong'], [
            [
                1,
                1,
                1,
                'https://rutube.ru/video/65f3d059291746d2e85e3a4f52f085b6',
                'В 2013 году в Турции за 100 $ можно было получить 450 лир. К 2018 году ситуация поменялась. За те же 100$ сумма выходила иная. Какая?',
                'Молодец!',
                'Не правильно. Не расстраивайся, это всего лишь вопрос.',
            ],
            [
                2,
                1,
                1,
                'https://rutube.ru/video/1a3ec90ad1fb7b8aa6974398ca08d54c/?pl_type=source&pl_id=14039',
                '30 лет назад Мармарис был маленьким рыбацким городком. Спустя годы он превратился в шикарный курорт. Этому поспособствовал один европейский народ. Какой?',
                'Отлично!',
                'Ошибка. Играем дальше?',
            ],
            [
                3,
                2,
                1,
                'https://rutube.ru/video/84de972dbf5c4edcd4c6f9ddbddacd64/?pl_type=source&pl_id=14039',
                'В далекие времена мыс Финистерре считался крайней точкой земли - концом света, так как люди не догадывались, что планета круглая и имеет другие континенты. Ситуация изменилась, когда местные жители увидели корабли на горизонте. В каком веке это произошло?',
                'правильно!',
                'Неверный ответ. Но, здесь главное – участие!',
            ],
            [
                4,
                2,
                1,
                'https://rutube.ru/video/abfa1b76256fa8362000c7b1989023f2/?pl_type=source&pl_id=11572',
                'Для того, чтобы путешествовать по Барселоне на любом виде транспорта стоит приобрести специальную карточку. Каково ее название?',
                'Великолепно!',
                'Неверно. Не беда, главное – участие!',
            ],
            [
                5,
                3,
                1,
                '',
                'Республика Сингапур- город- государство, расположенный на островах в Юго-Восточной Азии. Название Сингапур произошло от малайского синга -  название животного. Какого?',
                'Умница!',
                'Ошибка. Посмотрим, что дальше?',
            ],
            [
                6,
                3,
                1,
                'https://rutube.ru/video/c28dd8e85eaf50202c899fd4b81dd54a/?pl_id=11572&pl_type=source',
                'В Сингапуре очень много необычного для туристов и жителей. Есть одно увлекательное развлечение, во время которого вы можете почувствовать себя в настоящих джунглях. Какое?',
                'Правильно!',
                'Правильный – другой ответ. Но, не стоит огорчаться.',
            ],
            [
                7,
                4,
                1,
                'https://rutube.ru/video/c425c948e73368b57e8a4e0784a9e9e5/?pl_id=11572&pl_type=source',
                'В Сан-Франциско множество пирсов. Один из них, пирс 39, богат необычными пассажирами. Какими?',
                'Умница!',
                'Не верно. Но, вы прекрасный игрок!',
            ],
            [
                8,
                4,
                1,
                'https://rutube.ru/video/623f37dfd6f593f8402495bfe43d68e6/?pl_id=11572&pl_type=source',
                'В Лос-Анджелесе есть пляжи, знаменитые на весь мир, которые тянутся на 35 км. В каком районе они находятся?',
                'Отлично!',
                'Не верно! Но, вы – прекрасный игрок!',
            ],
            [
                9,
                5,
                1,
                'https://rutube.ru/video/797ccae83dd89821e9cbc799a1c71417/?pl_id=14039&pl_type=source',
                'Чтобы стать полноценным путешественником Австралии, нужно поменять валюту на австралийские деньги. Сколько стоят 100$ в австралийских AUD?',
                'Верно!',
                'Не верно! Но, вы – прекрасный игрок!',
            ],
            [
                10,
                5,
                1,
                'https://rutube.ru/video/4aa361c6f5911f39c49fb06032f73847/?pl_id=14039&pl_type=source',
                'Аделаида – город, богатый достопримечательностями. Главной достопримечательностью города является набережная. Она расположена на берегу залива. Какого?',
                'Верно!',
                'Правильный – другой ответ. Но, не стоит огорчаться!',
            ],
            [
                11,
                6,
                1,
                'https://rutube.ru/video/273ba79f6d49c1c3ddf42c6d90f25c49/?pl_id=11572&pl_type=source',
                'Архитектура центра Мехико весьма необычна. Ей не присущ мексиканский стиль, складывается впечатление, что попадаешь в другую страну. В какую?',
                'Великолепно!',
                'Правильный – другой ответ. Но, не стоит огорчаться!',
            ],
            [
                12,
                6,
                1,
                'https://rutube.ru/video/cbc0102f969fca308e9257a7833abad8/?pl_type=source&pl_id=14039',
                'П-ов Калифорния с запада омывается Тихим океаном, а с востока морем Кортеса, которое так именуется только в Мексике. Какое название данное море имеет в других странах?',
                'Молодец!',
                'Правильный – другой ответ. Но, не стоит огорчаться!',
            ],
            [
                13,
                7,
                1,
                'https://rutube.ru/video/58e5082cfe945025f26ede272523ce81/?pl_id=11572&pl_type=source',
                '150 лет назад Париж находился в запустении и разрухе. Местные власти решили исправить ситуацию. Они полностью изменили здания города. Каким образом?',
                'Правильно!',
                'Не правильно. Не расстраивайся, это всего лишь вопрос.',
            ],
            [
                14,
                7,
                1,
                'https://rutube.ru/video/db98a885651f3e3bd7ecbb83dc744bb1/?pl_id=14039&pl_type=source',
                'В Ла-Рошель есть шестьсот летняя башня, к которой раньше сходились все улицы города. Горожане с помощью нее узнавали время. Как называется данная башня?',
                'Молодец!',
                'Ошибка. Играем дальше?',
            ],
            [
                15,
                8,
                1,
                'https://rutube.ru/video/7cfd77cf1004c6edde56e7e59aa13419/?pl_id=11572&pl_type=source',
                'Город Берлин имеет множество достопримечательностей, главная из которых открывает путь в город. О чем именно идет речь?',
                'Верно!',
                'Ошибка. Играем дальше?',
            ],
            [
                16,
                8,
                1,
                '',
                'Германия – государство в Центральной Европе. Столицей является Берлин. Официальный язык - немецкий. Большая часть населения относится к одной религии. Какой?',
                'Умница!',
                'Ошибка. Играем дальше?',
            ],
            [
                17,
                9,
                1,
                'https://rutube.ru/video/5ca7405da0a2df7d8a84948381dff963/?pl_type=source&pl_id=11572',
                'Варанаси - главный город одноименной области в северо-восточной Индии. Один из старейших городов мира и, возможно, старейший в Индии. Является главным центром. Чего?',
                'Отлично!',
                'Не верный ответ. Но, здесь главное- участие',
            ],
            [
                18,
                9,
                1,
                'https://rutube.ru/video/10eb49e18aace21b0f0f8b215c78e1ed/?pl_type=source&pl_id=11572',
                'Мумбай – город на западе Индии, на побережье Аравийского моря. Город имеет глубокую естественную гавань, являясь самым большим портом Индии. В какой именно части?',
                'Верно!',
                'Не верный ответ. Но, здесь главное – участие!',
            ],
            [
                19,
                10,
                1,
                'https://rutube.ru/video/3a14be4538359ae149d5bdcd61fcec65/?pl_type=source&pl_id=11572',
                'В Танзании можно арендовать необычное жилье. Оно передвигается по воде, позволяя насладиться миром океана и видами вокруг. О чем именно идет речь?',
                'Правильно!',
                'Ошибка. Посмотрим, что дальше?',
            ],
            [
                20,
                10,
                1,
                '',
                'Дар-Эс-Салам – крупнейший город Танзании. Он является самым богатым городом страны и крупнейшим экономическим центром. Однако древний перевод названия города противоречит его современным характеристикам. Как переводится Дар-Эс-Салам?',
                'Отлично!',
                'Ошибка. Посмотрим, что дальше?',
            ],
            [
                21,
                11,
                1,
                'https://rutube.ru/video/54fe8b175db815846ce9125471fd213e/?pl_id=14039&pl_type=source',
                'Флорес – это не большой, но живописный клочок земли, который привлекает туристов. Он образовался весьма обычным для островов образом. Каким?',
                'Великолепно!',
                'Ответ неправильный. Спасибо за чудесную игру!',
            ],
            [
                22,
                11,
                1,
                'https://rutube.ru/video/5989c00566a991cd8fc198adb8bf73c3/?pl_id=14039&pl_type=source',
                'Бали умеет удивлять самых искушенных туристов. Например, на острове имеется ресторан, из окна которого можно наблюдать удивительный мир. Чего?',
                'Верно!',
                'Ответ неправильный. Спасибо за чудесную игру!',
            ],
            [
                23,
                12,
                1,
                '',
                'Шри-Ланка – демократическая социалистическая республика. Находится в Южной Азии. До 1972 г. Шри-Ланка называлась Цейлоном. Так ее окрестили европейские народы, которые вторглись на ее территорию. Какие?',
                'Отлично!',
                'Ответ неправильный. Спасибо за чудесную игру!',
            ],
            [
                24,
                12,
                1,
                'https://rutube.ru/video/37cd384c7b26b8def435367ea44029ee/?pl_id=11572&pl_type=source',
                'На Шри-Ланке есть чем заняться. Можно гулять между небоскребами или любоваться старой частью города с колоритными постройками. А для любителей экстрима на улице можно найти укротителя опасных  животных. Каких?',
                'Ты справился!',
                'Ответ неправильный. Спасибо за чудесную игру!',
            ],
            [
                25,
                13,
                1,
                '',
                'Макао, как и многие полуострова и острова, являлся европейской колонией. Это была самая старая европейская колония в Восточной Азии. Какой стране она принадлежала?',
                'Вы справились!',
                'Вы ошиблись. Но, главное - участие!',
            ],
            [
                26,
                13,
                1,
                'https://rutube.ru/video/6b9e64459f29e044cfbc02f89b1e4f57/?pl_type=source&pl_id=11572',
                'Побывав в сафари-парке в Гуанчжоу, можно из детской бутылочки с соской покормить существ, которые там обитают. Каких?',
                'Да!',
                'Вы ошиблись. Но, главное- участие!',
            ],
            [
                27,
                14,
                1,
                'https://rutube.ru/video/359ce7657d3582bfd440fd15349005e4/?pl_id=14039&pl_type=source',
                'Салвадор делится на 2 города- нижний и верхний. Они соединяются друг с другом. Посредством чего?',
                'Отлично!',
                'Вы ошиблись. Но, главное – участие!',
            ],
            [
                28,
                14,
                1,
                '',
                'Ресифи – город в Бразилии, столица штата Пернамбуку. Город невероятно красив, благодаря множеству каналов, мостов, старинных зданий. Благодаря этому Ресифи получил название одного европейского города. Какого?',
                'Так держать!',
                'Вы ошиблись. Но, главное – участие!',
            ],
            [
                29,
                15,
                1,
                'https://rutube.ru/video/fecf6e5b2951767994631c94867e167c/?pl_type=source&pl_id=11572',
                'Для того, чтобы познакомиться с Венецией, необходимо прокатиться по главному каналу города. Он представляет собой перевернутую латинскую букву «Эс». Каково его название?',
                'Правильно!',
                'Вы ошиблись. Но, главное – участие!',
            ],
            [
                30,
                15,
                1,
                'https://rutube.ru/video/624b4c0990cae275479c91d2f46f83d2/?pl_type=source&pl_id=14039',
                'Амальфитанское побережье – это 50 км живописных дорог. Они узки и соединяют десятки городов. Вдоль чего пролегает такая дорога?',
                'Ты справился!',
                'Вы ошиблись. Но, главное – участие!',
            ],
            [
                31, 
                1, 
                1, 
                NULL, 
                'В каком году началось производство шоколада Ritter Sport?', 
                'Правильно!', 
                'К сожалению, ответ неверный'
            ],
            [
                32, 
                2,
                1, 
                NULL,
                'А какая страна является Родиной шоколада Ritter Sport? ', 
                'Отличный результат: Германия', 
                'Не правильно. Не расстраивайся, это всего лишь вопрос'
            ],
            [
                33, 
                3,
                1, 
                NULL,
                'Сколько фабрик Ritter Sport на данный момент мире?', 
                'Правильно!', 
                'Неверно. Не расстраивайся, это всего лишь вопрос'
            ],
            [
                34, 
                4,
                1, 
                NULL,
                'В каком году началось производство шоколада Ritter Sport?', 
                'Правильно! 1912', 
                'К сожалению, ответ неверный'
            ],
            [
                35, 
                5,
                1, 
                NULL,
                'А какая страна является Родиной шоколада Ritter Sport?', 
                'Отличный результат: Германия', 
                'Не правильно. Не расстраивайся, это всего лишь вопрос'
            ],
            [
                36, 
                6,
                1, 
                NULL,
                'Сколько фабрик Ritter Sport на данный момент мире?', 
                'Правильно!', 
                'Неверно. Не расстраивайся, это всего лишь вопрос'
            ],
            [
                37, 
                7,
                1, 
                NULL,
                'В каком году началось производство шоколада Ritter Sport?', 
                'Правильно! 1912', 
                'К сожалению, ответ неверный'
            ],
            [
                38, 
                8,
                1, 
                NULL,
                'А какая страна является Родиной шоколада Ritter Sport? ', 
                'Отличный результат: Германия', 
                'Не правильно. Не расстраивайся, это всего лишь вопрос'
            ],
            [
                39, 
                9,
                1, 
                NULL,
                'Сколько фабрик Ritter Sport на данный момент мире?', 
                'Правильно!', 
                'Неверно. Не расстраивайся, это всего лишь вопрос'
            ],
            [
                40, 
                10,
                1, 
                NULL,
                'В каком году началось производство шоколада Ritter Sport?', 
                'Правильно! 1912', 
                'К сожалению, ответ неверный'
            ],
            [
                41, 
                11,
                1, 
                NULL,
                'А какая страна является Родиной шоколада Ritter Sport?', 
                'Отличный результат: Германия', 
                'Не правильно. Не расстраивайся, это всего лишь вопрос'
            ],
            [
                42, 
                12,
                1, 
                NULL,
                'Сколько фабрик Ritter Sport на данный момент мире?', 
                'Правильно!', 
                'Неверно. Не расстраивайся, это всего лишь вопрос'
            ],
            [
                43, 
                13,
                1, 
                NULL,
                'В каком году началось производство шоколада Ritter Sport?', 
                'Правильно! 1912', 
                'К сожалению, ответ неверный'
            ],
            [
                44, 
                14,
                1, 
                NULL,
                'А какая страна является Родиной шоколада Ritter Sport?', 
                'Отличный результат: Германия', 
                'Не правильно. Не расстраивайся, это всего лишь вопрос'
            ],
            [
                45, 
                15,
                1, 
                NULL,
                'Сколько фабрик Ritter Sport на данный момент мире?', 
                'Правильно!', 
                'Неверно. Не расстраивайся, это всего лишь вопрос'
            ]
        ]);
    }

    public function safeDown()
    {
        $this->dropForeignKey('{question}_stage_id_fkey', '{{%question}}');

        $this->dropTable('{{%question}}');
    }
}