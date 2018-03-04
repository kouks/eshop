<?php

namespace Lib\Session;

use Lib\Contracts\Session\Factory as FactoryContract;

class Factory implements FactoryContract
{
    /**
     * Set a session parameter.
     *
     * @param  string  $name
     * @param  mixed  $value
     * @return void
     */
    public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    /**
     * Flash a session parameter.
     *
     * @param  string  $name
     * @param  mixed  $value
     * @param  int  $lives
     * @return void
     */
    public function flash($name, $value, $lives = 1)
    {
        $_SESSION['__FLASH'][$name] = compact('value', 'lives');
    }

    /**
     * Retrieves the value from session storage.
     *
     * @param  string  $name
     * @return mixed
     */
    public function get($name)
    {
        return $_SESSION[$name] ?? '';
    }

    /**
     * Retrieves a flashed value from the session.
     *
     * @param  string  $name
     * @return mixed
     */
    public function flashed($name)
    {
        return $_SESSION['__FLASH'][$name]['value'] ?? null;
    }

    /**
     * Removes the value from session storage.
     *
     * @param  string  $name
     * @return void
     */
    public function remove($name)
    {
        unset($_SESSION[$name]);
    }

    /**
     * Flushes the flashed parameters in a session.
     *
     * @return void
     */
    public function flush()
    {
        if (! isset($_SESSION['__FLASH'])) {
            return;
        }

        foreach ($_SESSION['__FLASH'] as $name => $value) {
            if ($value['lives'] === 0) {
                unset($_SESSION['__FLASH'][$name]);
            } else {
                $_SESSION['__FLASH'][$name]['lives']--;
            }
        }
    }
}
