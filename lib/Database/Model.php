<?php

namespace Lib\Database;

abstract class Model
{
    /**
     * The primary key to be used.
     *
     * @var string
     */
    protected $key = '_id';

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
     * Performs insertion of data.
     *
     * @param  array  $data
     * @return \MongoDB\Model\BSONDocument
     */
    public static function create($data)
    {
        return (new static(app(\Lib\Contracts\Database\Connection::class)))
            ->query()->insertOne($data);
    }

    /**
     * Performs listing of all data in the collection.
     *
     * @return \MongoDB\Model\BSONDocument
     */
    public static function all()
    {
        return (new static(app(\Lib\Contracts\Database\Connection::class)))
            ->query()->find();
    }

    /**
     * Performs a selection based on provided restrictions
     *
     * @param  array  $restrictions
     * @return \MongoDB\Model\BSONDocument
     */
    public static function find($restrictions)
    {
        return (new static(app(\Lib\Contracts\Database\Connection::class)))
            ->query()->find($restrictions);
    }

    /**
     * Performs an update query on restriceted elements.
     *
     * @param  array  $restrictions
     * @param  array  $data
     * @return \MongoDB\Model\BSONDocument
     */
    public static function update($restrictions, $data)
    {
        return (new static(app(\Lib\Contracts\Database\Connection::class)))
            ->query()->updateMany($restrictions, ['$set' => $data]);
    }

    /**
     * Performs a delete query based on provided restrictions.
     *
     * @param  array  $restrictions
     * @return \MongoDB\Model\BSONDocument
     */
    public static function delete($restrictions)
    {
        return (new static(app(\Lib\Contracts\Database\Connection::class)))
            ->query()->deleteMany($restrictions);
    }

    /**
     * Truncates the given collection.
     *
     * @return \MongoDB\Model\BSONDocument
     */
    public static function truncate()
    {
        return static::delete([]);
    }

    /**
     * Returns the database and the collection to perform the query on.
     *
     * @return \MongoDB\Collection
     */
    protected function query()
    {
        return $this->driver->{$this->database}->{$this->getCollectionName()};
    }

    /**
     * Returns the collection name for given model.
     *
     * @return string
     */
    protected function getCollectionName()
    {
        return str_plural(strtolower(substr(strrchr(get_class($this), "\\"), 1)));
    }
}
