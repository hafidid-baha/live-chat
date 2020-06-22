<?php
require dirname(__DIR__) . '/vendor/autoload.php';

use Socket\Chat;
use Ratchet\Server\IoServer;


    $server = IoServer::factory(
        new Chat(),
        8080
    );

    $server->run();