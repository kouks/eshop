<?php

namespace Lib\Contracts\Database;

interface ModelFactory
{
    /**
     * Create a record on the database.
     *
     * @param  array  $data
     * @return \MongoDB\Model\BSONDocument
     */
    public function create($data = []);
}
