<?php

    define("URL_BASE", "https://sistema.tabacaria.ga");

    define("DATA_LAYER_CONFIG", [
        "driver" => "mysql",
        "host" => "sql304.epizy.com",
        "port" => "3306",
        "dbname" => "epiz_26146093_tabacaria",
        "username" => "epiz_26146093",
        "passwd" => "3ys3XiuG6Xe",
        "options" => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ]
    ]);