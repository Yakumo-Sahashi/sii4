<?php
    use Illuminate\Database\Capsule\Manager as Database;
    $dotenv = Dotenv\Dotenv::createImmutable('../../');
    $dotenv->load();
    define('DB_USER', $_ENV['DB_USER']);
    define('DB_PASSWD', $_ENV['DB_PASSWD']);
    define('DB_NAME', $_ENV['DB_NAME']);
    define('DB_HOST', $_ENV['DB_HOST']);
    define('DB_PORT', $_ENV['DB_PORT']);
    define('DB_CHARSET', $_ENV['DB_CHARSET']);
    
    $basedatos = new Database;
    $basedatos->addConnection([
        'driver' => 'mysql',
        'host' => DB_HOST,
        'database' => DB_NAME,
        'username' => DB_USER,
        'password' => DB_PASSWD,
        'charset' => DB_CHARSET,
        'collation' => 'utf8_unicode_ci',
        'port'=>DB_PORT
    ]);
    $basedatos->setAsGlobal();
    $basedatos->bootEloquent();
?>