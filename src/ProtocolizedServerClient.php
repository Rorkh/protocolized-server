<?php

namespace Ren\ProtocolizedServer;

/**
 * Protocolized server client class with data-storing and connection management capabilities
 */
class ProtocolizedServerClient
{
    /**
     * Protocolized server client object constructor
     * @param mixed $connection
     * @param array $data
     */
    public function __construct(private mixed $connection, private array $data = [])
    {
    }

    /**
     * Stores data by key
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function setData(string $key, mixed $value): void
    {

        $this->data[$key] = $value;
    }

    /**
     * Retrieves stored data by key or returns default if it's not exists
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function getData(string $key, mixed $default): mixed
    {
        if (!isset($this->data[$key])) {
            return $default;
        }
        return $this->data[$key];
    }

    /**
     * Writes data to connection
     *
     * @param mixed $data
     * @return void
     */
    public function write(mixed $data): void
    {
        $this->connection->write($data);
    }

    /**
     * Closes connection
     *
     * @return void
     */
    public function close(): void
    {
        $this->connection->close();
    }
}
