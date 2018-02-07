<?php

namespace Lib\Contracts\Database;

interface ModelFactory
{
    /**
     * Create a record on the database.
     *
     * @param  array  $data
     * @return void
     */
    public function create($data = []);
}
