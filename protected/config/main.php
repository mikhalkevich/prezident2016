<?php
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Духовный лидер Человечества '.date('Y').' года',
    'language' => 'ru',
    // включение дефалтного контроллера
    'defaultController' => 'base',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.extensions.MongoYii.*',
        'application.extensions.MongoYii.validators.*',
        'application.extensions.MongoYii.behaviors.*',
        'application.extensions.MongoYii.util.*'
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'Qwerty',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            'allowAutoLogin' => true,
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                'home' => 'base/index',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/view',
            ),
        ),
        'db' => array(

            'connectionString' => 'mysql:host=localhost;dbname=yii2;port=3302',

            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),
        'mongodb' => array(
            'class' => 'EMongoClient',
            'server' => 'mongodb://localhost',
            'db' => 'test',
            'enableProfiling' => true
        ),
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);