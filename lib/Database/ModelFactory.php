<?php

namespace Lib\Database;

use Faker;
use Lib\Contracts\Database\ModelFactory as ModelFactoryContract;

class ModelFactory implements ModelFactoryContract
{
    /**
     * The model name.
     *
     * @var string
     */
    protected $model;

    /**
     * Count of documents to be inserted.
     *
     * @var int
     */
    protected $count;

    /**
     * The factory assigned to the model.
     *
     * @var \Closure
     */
    protected $factory;

    /**
     * The faker library instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Class constructor.
     *
     * @param  string  $model
     * @param  int  $count
     * @return void
     */
    public function __construct($model, $count = 1)
    {
        $this->model = $model;
        $this->count = $count;
        $this->faker = Faker\Factory::create();
        $this->factory = $this->loadFactoryFor($model);
    }

    /**
     * Finds the appropriate factory for the model.
     *
     * @param  string  $model
     * @return \Closure
     */
    protected function loadFactoryFor($model)
    {
        $factories = require base_path('app/').'factories.php';

        return $factories[$model];
    }

    /**
     * Create a record on the database.
     *
     * @param  array  $data
     * @return void
     */
    public function create($defaultData = [])
    {
        $factory = $this->factory;

        for ($x = 0; $x < $this->count; $x++) {
            $data = array_merge($factory($this->faker), $defaultData);

            $this->model::create($data);
        }
    }
}
