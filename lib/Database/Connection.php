<?php

namespace Lib\Database;

use MongoDB;
use Lib\Contracts\Database\Connection as ConnectionContract;

class Connection implements ConnectionContract
{
    /**
     * The database connection.
     *
     * @var \MongoDB\Client
     */
    protected $connection;

    /**
     * The collection to be used.
     *
     * @var string
     */
    protected $collection;

    /**
     * Class constructor.
     *
     * @param  array  $credentials
     * @return void
     */
    public function __construct(array $credentials)
    {
        $this->connection = new MongoDB\Client($credentials['uri']);
        $this->collection = $credentials['collection'];
    }

    /**
     * Retrieve the database connection.
     *
     * @return \MongoDB\Client
     */
    public function getConnection()
    {
        return $this->connection;
    }
}
