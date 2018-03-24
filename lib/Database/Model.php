<?php

namespace Lib\Database;

use Illuminate\Contracts\Support\Arrayable;

abstract class Model implements Arrayable
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
     * The data field populated after executing a query.
     *
     * @var array
     */
    public $data = [];

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
     * @return static
     */
    public static function create($data)
    {
        static::query()->insertOne($data);

        return static::hydrate($data);
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
     * Performs a single selection based on provided restrictions.
     *
     * @param  array  $restrictions
     * @return static
     */
    public static function find($restrictions)
    {
        return static::hydrate(static::query()->findOne($restrictions));
    }

    /**
     * Performs a selection based on provided restrictions.
     *
     * @param  array  $restrictions
     * @param  array  $options
     * @return \Illuminate\Support\Collection
     */
    public static function where(array $restrictions = [], array $options = [])
    {
        return static::hydrateMany(static::query()->find($restrictions, $options));
    }

    /**
     * Performs an update query on restricted elements.
     *
     * @param  array  $restrictions
     * @param  array  $data
     * @return \MongoDB\UpdateResult
     */
    public static function update($restrictions, $data)
    {
        return static::query()->updateMany($restrictions, ['$set' => $data]);
    }

    /**
     * Performs a delete query based on provided restrictions.
     *
     * @param  array  $restrictions
     * @return \MongoDB\DeleteResult
     */
    public static function delete($restrictions)
    {
        return static::query()->deleteMany($restrictions);
    }

    /**
     * Truncates the given collection.
     *
     * @return \MongoDB\DeleteResult
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
        return str_plural(strtolower(substr(strrchr(get_class($this), '\\'), 1)));
    }

    /**
     * Hydrates a model with provided data.
     *
     * @param  \MongoDB\Model\BSONDocument  $data
     * @return static
     */
    protected static function hydrate($data)
    {
        if (count((array) $data) === 0) {
            return null;
        }

        $instance = new static(app(\Lib\Contracts\Database\Connection::class));
        $instance->data = (array) $data;

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

    /**
     * Casts the model to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }

    /**
     * Accessing the data array implicitly.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->data[$key];
    }
}
