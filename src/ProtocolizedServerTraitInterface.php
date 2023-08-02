<?php

namespace Ren\ProtocolizedServer;

/**
 * Protocolized server interface for traits
 */
trait ProtocolizedServerTraitInterface
{
    /**
     * Array of handlers
     * @var array
     */
    private array $handlers;

    /**
     * Protocolized server object
     * @var mixed
     */
    private mixed $server;

    /**
     * Server start function
     * @param string|int $address
     * @return void
     */
    abstract public function start(string|int $address): void;

    /**
     * Server close function
     * @return void
     */
    abstract public function close(): void;

    /**
     * Register packet handlers function
     *
     * Should return associative array where key is packet identificator and value is callable
     * @return array
     */
    abstract private function registerHandlers(): array;

    /**
     * Packet parse function
     *
     * Should return array with packet identificator and packet payload
     * @param string $data
     * @return array
     */
    abstract private function onDataRead(string $data): array;

    /**
     * On new connection function
     * @param mixed $connection
     * @return void
     */
    private function onConnection(mixed $connection): void
    {
    }

    /**
     * On new error function
     * @param mixed $error
     * @return void
     */
    private function onError(mixed $error): void
    {
    }
}
