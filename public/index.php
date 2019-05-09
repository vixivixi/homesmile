<?php

require_once  __DIR__ . '/../vendor/autoload.php';

// TODO: всегда один и тотже файл в папке 'json/'
//(new  \App\Bootstrap())->run('img/', 'json/');
(new  \App\Bootstrap('img/', 'json/'))->run();