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
     * The database to be used.
     *
     * @var string
     */
    protected $database;

    /**
     * Class constructor.
     *
     * @param  array  $credentials
     * @return void
     */
    public function __construct(array $credentials)
    {
        $this->connection = new MongoDB\Client($credentials['uri']);
        $this->database = $credentials['database'];
    }

    /**
     * Retrieve the database driver.
     *
     * @return \MongoDB\Client
     */
    public function getDriver()
    {
        return $this->connection;
    }

    /**
     * Retrieve the database name.
     *
     * @return string
     */
    public function getDatabase()
    {
        return $this->database;
    }
}
