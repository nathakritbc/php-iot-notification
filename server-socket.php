<?php
require 'vendor/autoload.php';

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class RealTimeServer implements MessageComponentInterface {
    protected $clients;
    protected $db;

    public function __construct() {
        $this->clients = new \SplObjectStorage;

        // เชื่อมต่อกับฐานข้อมูล MySQL
        $this->db = new \mysqli('localhost', 'root', '', 'test');
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "Client connected ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        // ค้นหาข้อมูลจากฐานข้อมูล MySQL
        $query = "SELECT * FROM your_table";
        $result = $this->db->query($query);

        if ($result) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $from->send(json_encode($data));
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new RealTimeServer()
        )
    ),
    8080
);

echo "WebSocket server started at ws://127.0.0.1:8080\n";

$server->run();