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
     * The current builder instance.
     *
     * @var \Lib\Database\Builder
     */
    protected $builder;

    public function newQuery()
    {
        return $this->builder = app('builder');
    }

    public static function __callStatic($method, $args)
    {
        $instance = new static;

        return $instance->newQuery()->$method($instance->getCollectionName(), ...$args);
    }

    public function hydrate()
    {
        //
    }

    protected function getCollectionName()
    {
        return str_plural(strtolower(substr(strrchr(get_class($this), "\\"), 1)));
    }
}
