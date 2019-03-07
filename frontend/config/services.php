<?php 
return [
    /*'fb' => [
        // register your app here: https://developers.facebook.com/apps/
        'class' => 'frontend\models\social\FbOAuth2Service',
        'clientId' => '502516763613354',
        'clientSecret' => 'b4cbc20cef191563f0c1e1c5d0450cad',
        'title' => 'Facebook',
    ],*/
    'vk' => [
        // register your app here: https://vk.com/editapp?act=create&site=1
        'class' => 'frontend\models\social\VkOAuth2Service',
        'clientId' => '6883306',
        'clientSecret' => 'YPG6iiniJymVRM45thkm',
        'title' => 'Вконтакте',
    ],
    'ok' => [
        // register your app here: http://dev.odnoklassniki.ru/wiki/pages/viewpage.action?pageId=13992188
        // ... or here: http://www.odnoklassniki.ru/dk?st.cmd=appsInfoMyDevList&st._aid=Apps_Info_MyDev
        'class' => 'frontend\models\social\OkOAuth2Service',
        'clientId' => '1276841472',
        'clientPublic' => 'CBAPAMBNEBABABABA',
        'clientSecret' => 'ADD8797ED0DF9E0D9C0279E0',
        'title' => 'Одноклассники',
    ],
];