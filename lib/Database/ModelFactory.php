<?php

namespace Lib\Database;

use Lib\Contracts\Database\ModelFactory as ModelFactoryContract;
use Faker;

class ModelFactory implements ModelFactoryContract
{
    protected $model;
    protected $count;
    protected $factory;

    public function __construct($model, $count = 1)
    {
        $this->model = $model;
        $this->count = $count;

        $faker = Faker\Factory::create();
        $factories = require base_path('app/').'factories.php';

        $this->factory = $factories[$model];
    }

    /**
     * Create a record on the database.
     *
     * @param  array  $data
     * @return \MongoDB\Model\BSONDocument
     */
    public function create($data = [])
    {
        $data = array_merge($this->factory, $data);

        return $this->model::create($data);
    }
}
