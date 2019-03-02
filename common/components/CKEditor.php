<?php
namespace common\components;

use Yii;

use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use mihaildev\elfinder\ElFinder;

Class CKEditor extends \mihaildev\ckeditor\CKEditor {

    public function init()
    {
        if (array_key_exists('preset', $this->editorOptions)) {
            switch ($this->editorOptions['preset']) {
                case 'linkOnly':
                    $this->presetLinkOnly();
                    break;
                case 'colorAndAlign':
                    $this->presetColorAndAlign();
                    break;
                case 'iFrameOnly':
                    $this->presetIFrameOnly();
                    break;
            }
        }
        $this->editorOptions['language'] = 'ru';

        parent::init();
    }

    private function presetLinkOnly() {
        /*
            Гиперссылка
        */
        $options['height'] = 100;

        $options['toolbarGroups'] = [
            ['name' => 'links', 'groups' => ['links']],
        ];


        $this->editorOptions = ArrayHelper::merge($options, $this->editorOptions);
    }

    private function presetColorAndAlign() {
        /*
            Только выбор цвета и выравнивание
        */
        $options['height'] = 100;

        $options['toolbarGroups'] = [
            ['name' => 'basicstyles', 'groups' => ['align', 'colors']],
        ];


        $this->editorOptions = ArrayHelper::merge($options, $this->editorOptions);
    }

    private function presetIFrameOnly() {
        /*
            Только выбор цвета и выравнивание
        */
        $options['height'] = 100;

        $options['toolbar'] = [
            ['name' => 'links', 'items' => ['Iframe']],
        ];


        $this->editorOptions = ArrayHelper::merge($options, $this->editorOptions);
    }
}