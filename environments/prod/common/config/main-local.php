<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'pgsql:host=db;dbname=local_test', 'username' => '', 'password' => '',
            'charset' => 'utf8',
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 3600,
        ],
        'db_irbis' =>  [
            'class' => 'sfedosimov\oci8pdo\Oci8PDO_Connection',
                'dsn' => 'oci:dbname=(DESCRIPTION =
                    (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.100.11)(PORT = 1521))
                (CONNECT_DATA =
                    (SERVER = DEDICATED)
                    (SERVICE_NAME = irbis)
                )
            );charset=UTF8;',
            'username'=>'',
            'password'=>'',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'ad' => [
            'class' => 'Edvlerblog\Adldap2\Adldap2Wrapper',
            'providers' => [
                'default' => [ 
                    'autoconnect' => true,
                    'config' => [
                        'account_suffix' => '@tattelecom.ttc',
                        'hosts' => ['192.168.100.152'],
                        'base_dn' => 'DC=tattelecom,DC=ttc',
                        'username' => 'tattelecom\tat100',
                        'password' => '',
                    ]
                ],
            ],
        ],
    ],
];
