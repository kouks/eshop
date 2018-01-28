<?php

namespace Lib\Database;

use Lib\Contracts\Database\Connection;

class Builder
{
    /**
     * The database driver.
     *
     * @var \MongoDB\Client
     */
    protected $driver;

    /**
     * The database name.
     *
     * @var string
     */
    protected $database;

    public function __construct(Connection $connection)
    {
        $this->driver = $connection->getDriver();
        $this->database = $connection->getDatabase();
    }

    public function create($collection, $data)
    {
        return $this->query()->$collection->insertOne($data);
    }

    public function all($collection)
    {
        return $this->query()->$collection->find();
    }

    protected function query()
    {
        return $this->driver->{$this->database};
    }
}
