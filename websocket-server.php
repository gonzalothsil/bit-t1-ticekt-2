require 'vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class UserTracker implements MessageComponentInterface {
    protected $clients;
    protected $userCount = 0;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        $this->userCount++;
        $this->broadcastCount();
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        $this->userCount--;
        $this->broadcastCount();
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        // Not used
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        $conn->close();
    }

    private function broadcastCount() {
        foreach ($this->clients as $client) {
            $client->send(json_encode(['active_users' => $this->userCount]));
        }
    }
}

$server = \Ratchet\Server\IoServer::factory(
    new \Ratchet\Http\HttpServer(
        new \Ratchet\WebSocket\WsServer(
            new UserTracker()
        )
    ),
    8080 // Puerto WebSocket
);

$server->run();
