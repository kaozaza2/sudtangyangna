<?php

$http = new swoole_http_server('127.0.0.1', 8080);

$http->set([
    'document_root' => __DIR__ . '/app',
    'enable_static_handler' => true,
]);

$http->on("start", function ($server) {
    printf("HTTP server started at %s:%s\n", $server->host, $server->port);
    printf("Master  PID: %d\n", $server->master_pid);
    printf("Manager PID: %d\n", $server->manager_pid);
});

$http->start();
