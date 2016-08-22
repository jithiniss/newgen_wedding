<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$admin = dirname(dirname(__FILE__));
$frontend = dirname($admin);
Yii::setPathOfAlias('admin', $admin);
Yii::setPathOfAlias('booster', dirname(__FILE__) . '/../extensions/yiibooster');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');
Yii::setPathOfAlias('phpthumb', dirname(__FILE__) . '/../extensions/EPhpThumb/EPhpThumb');
//Yii::setPathOfAlias('infiniteScroll', dirname(__FILE__) . '/../extensions/yiiinfiniteScroll');
return array(
    'basePath' => $frontend,
    'controllerPath' => $admin . '/controllers',
    'viewPath' => $admin . '/views',
    'runtimePath' => $admin . '/runtime',
    'preload' => array('log', 'booster'),
    'import' => array(
        'admin.models.*',
        'admin.components.*',
        'application.models.*',
        'admin.components.*',
        'application.components.*',
        'admin.extensions.easyimage.EasyImage',
        'application.client.extensions.yiiinfiniteScroll.YiinfiniteScroller',
        'application.client.extensions.yii-mail.*',
    ),
    'modulePath' => $admin . '/modules/',
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'gii',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    'components' => array(
        'Smtpmail' => array(
            'class' => 'application.components.smtpmail.PHPMailer',
            'Host' => "smtp.gmail.com",
            'Username' => 'ashiq@intersmart.in',
            'Password' => 'lehkabudhan',
            'Mailer' => 'smtp',
            'Port' => 587,
            'SMTPAuth' => true,
        ),
        'mail' => array(
            'class' => 'application.client.extensions.yii-mail.YiiMail',
            'transportType' => 'smtp',
            'transportOptions' => array(
//                'host' => 'mail.ecareagora.com',
                'host' => 'mail.intersmarthosting.in',
                // 'encryption'=>'ssl', // use ssl
                'username' => "develop@intersmarthosting.in",
                'password' => "develop@123",
                'port' => '25', // ssl port for gmail
            ),
            'viewPath' => 'application.client.template',
            'logging' => true,
            'dryRun' => false
        ),
        'Upload' => array('class' => 'UploadFile'),
        'PhotoVisibility' => array('class' => 'PhotoVisibility'),
        'Matches' => array('class' => 'Matches'),
        'dateFormat' => array('class' => 'DateFormat'),
        'booster' => array(
            'class' => 'booster.components.Booster',
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => require(dirname(__FILE__) . '/urlrules.php'),
        ),
        'db' => array(
            'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
        ),
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=newgen_wedding',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'mysql',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                array(
                    'class' => 'CWebLogRoute',
                    'levels' => 'error,trace,info, warning',
                ),
                array(
                    'class' => 'CProfileLogRoute',
                    'report' => 'summary',
                ),
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);
