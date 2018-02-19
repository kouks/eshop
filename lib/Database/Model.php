<?php

namespace Lib\Database;

abstract class Model
{
    /**
     * The primary key to be used.
     *
     * @var string
     */
    public static $key = '_id';

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
        return static::query()->insertOne($data);
    }

    /**
     * Performs listing of all data in the collection.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function all()
    {
        return static::hydrateMany(static::query()->find());
    }

    /**
     * Performs a single selection based on provided restrictions
     *
     * @param  array  $restrictions
     * @return static
     */
    public static function find($restrictions)
    {
        return static::hydrate(static::query()->findOne($restrictions));
    }

    /**
     * Performs a selection based on provided restrictions
     *
     * @param  array  $restrictions
     * @return \Illuminate\Support\Collection
     */
    public static function where($restrictions)
    {
        return static::hydrateMany(static::query()->find($restrictions));
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
        return static::query()->updateMany($restrictions, ['$set' => $data]);
    }

    /**
     * Performs a delete query based on provided restrictions.
     *
     * @param  array  $restrictions
     * @return \MongoDB\Model\BSONDocument
     */
    public static function delete($restrictions)
    {
        return static::query()->deleteMany($restrictions);
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
    protected static function query()
    {
        $instance = new static(app(\Lib\Contracts\Database\Connection::class));

        return $instance->driver->{$instance->database}->{$instance->getCollectionName()};
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

    /**
     * Hydrates a model with provided data.
     *
     * @param  array  $data
     * @return static
     */
    protected static function hydrate($data)
    {
        if (count($data) === 0) {
            return null;
        }

        $instance = new static(app(\Lib\Contracts\Database\Connection::class));

        foreach ($data as $field => $value) {
            $instance->$field = $value;
        }

        return $instance;
    }


    /**
     * Hydrates a collection of models with provided data.
     *
     * @param  array  $data
     * @return \Illuminate\Support\Collection
     */
    protected static function hydrateMany($data)
    {
        return collect($data)->map(function ($item) {
            return static::hydrate($item);
        });
    }
}
