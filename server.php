<?php
require("SocketServer.php");

/**
 * Initialize the server and set up listeners and packet handling.
 */
$server = new SocketServer();

$server->addListener("0.0.0.0", 1812);
$server->addListener("0.0.0.0", 1813);
$server->addListener("0.0.0.0", 3799);

$server->on('Packet', function(SocketServer $server, $packet, $clientInfo){
    $log = sprintf("Recieved Packet from %s:%s", $clientInfo['address'], $clientInfo['port']);
    echo("$log\r\n");
});

$server->run();