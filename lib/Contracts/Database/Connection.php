<?php

namespace Lib\Contracts\Database;

interface Connection
{
    /**
     * Retrieve the database driver.
     *
     * @return \MongoDB\Client
     */
    public function getDriver();

    /**
     * Retrieve the database name.
     *
     * @return string
     */
    public function getDatabase();
}
