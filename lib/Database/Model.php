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
     * Creates a new builder instance for the model.
     *
     * @return \Lib\Database\Builder
     */
    public function newQuery()
    {
        return app('builder')->collection($this->getCollectionName());
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
     * Magic function that redirects all method calls to the builder instance.
     *
     * @param  string  $method
     * @param  array  $args
     * @return \MongoDB\Model\BSONDocument
     */
    public static function __callStatic($method, $args)
    {
        return (new static)->newQuery()->$method(...$args);
    }
}
