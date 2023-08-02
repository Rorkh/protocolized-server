<?php

namespace Shit;

require_once 'vendor/autoload.php';

use Ren\ProtocolizedServer\ProtocolizedServerClient;
use Ren\ProtocolizedServer\ProtocolizedServerTrait;

class MyOwnServer
{
    use ProtocolizedServerTrait;

    private function handleEcho(ProtocolizedServerClient $client, string $payload)
    {
        $counter = $client->getData('counter', 0);
        $client->setData('counter', $counter + 1);

        $client->write("Counter: " . $counter + 1);
    }

    private function registerHandlers(): array
    {
        return [
            0x00 => [$this, 'handleEcho']
        ];
    }
    
    private function onDataRead(string $data): array
    {
        $packetId = ord(substr($data, 0, 1));
        $payload = substr($data, 1);
        return [$packetId, $payload];
    }
}

$server = new MyOwnServer();
$server->start(1345);
