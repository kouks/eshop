<?php

namespace Lib\Contracts\Database;

interface Connection
{
    /**
     * Retrieve the database connection.
     *
     * @return \MongoDB\Client
     */
    public function getConnection();
}
