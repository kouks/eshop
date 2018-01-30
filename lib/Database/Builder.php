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

    /**
     * The collection that this builder instance is using.
     *
     * @var string
     */
    protected $collection;

    /**
     * Class constructor.
     *
     * @param  \Lib\Contracts\Database\Connection  $connection
     * @return void
     */
    public function __construct(Connection $connection)
    {
        $this->driver = $connection->getDriver();
        $this->database = $connection->getDatabase();
    }

    /**
     * Assigns a collection to be used with this builder instance.
     *
     * @param  string  $collection
     * @return static
     */
    public function collection($collection)
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * Performs insertion of data.
     *
     * @param  array  $data
     * @return \MongoDB\Model\BSONDocument
     */
    public function create($data)
    {
        return $this->query()->insertOne($data);
    }

    /**
     * Performs listing of all data in the collection.
     *
     * @return \MongoDB\Model\BSONDocument
     */
    public function all()
    {
        return $this->query()->find();
    }

    /**
     * Performs a selection based on provided restrictions
     *
     * @param  array  $restrictions
     * @return \MongoDB\Model\BSONDocument
     */
    public function find($restrictions)
    {
        return $this->query()->find($restrictions);
    }

    /**
     * Performs an update query on restriceted elements.
     *
     * @param  array  $restrictions
     * @param  array  $data
     * @return \MongoDB\Model\BSONDocument
     */
    public function update($restrictions, $data)
    {
        return $this->query()->updateMany($restrictions, ['$set' => $data]);
    }

    /**
     * Performs a delete query based on provided restrictions.
     *
     * @param  array  $restrictions
     * @return \MongoDB\Model\BSONDocument
     */
    public function delete($restrictions)
    {
        return $this->query()->deleteMany($restrictions);
    }

    /**
     * Returns the database and the collection to perform the query on.
     *
     * @return \MongoDB\Collection
     */
    protected function query()
    {
        return $this->driver->{$this->database}->{$this->collection};
    }
}
