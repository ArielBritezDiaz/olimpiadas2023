<?php
    define('DB_HOST', 'localhost');
    define('DB_HOST_USER', 'root');
    define('DB_HOST_USER_PASSWORD', '');
    define('DB_NAME', 'centro_medico_db');

    try {
        $pdo = new PDO("mysqli:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_HOST_USER, DB_HOST_USER_PASSWORD);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Conectado a db';
    } catch(\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int) $e->getCode());
        echo 'error';
    }
?>