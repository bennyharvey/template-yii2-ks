<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => "pgsql:host={$_ENV['DB_HOST']};port={$_ENV['DB_PORT']};dbname={$_ENV['DB_NAME']}", 'username' => $_ENV['DB_USERNAME'], 'password' => $_ENV['DB_PASSWORD'],
            'charset' => 'utf8',
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 3600,
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        //'db_oracle' =>  [
        //    'class' => 'sfedosimov\oci8pdo\Oci8PDO_Connection',
        //        'dsn' => 'oci:dbname=(DESCRIPTION =
        //            (ADDRESS = (PROTOCOL = TCP)(HOST = )(PORT = ))
        //        (CONNECT_DATA =
        //            (SERVER = DEDICATED)
        //            (SERVICE_NAME = )
        //        )
        //    );charset=UTF8;',
        //    'username'=>'',
        //    'password'=>'',
        //    'charset' => 'utf8',
        //],
        //'ad' => [
        //    'class' => 'Edvlerblog\Adldap2\Adldap2Wrapper',
        //    'providers' => [
        //        'default' => [
        //            'autoconnect' => true,
        //            'config' => [
        //                'account_suffix' => '',
        //                'hosts' => [''],
        //                'base_dn' => 'DC=,DC=',
        //                'username' => '',
        //                'password' => '',
        //            ]
        //        ],
        //    ],
        //],
    ],
];
