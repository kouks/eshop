<?php

namespace Lib\Core;

use Closure;
use Illuminate\Support\Collection;

class Pipe
{
    /**
     * The passable item that is supposed to go through the pipe.
     *
     * @var mixed
     */
    protected $passable;

    /**
     * The chain of responsibility that the passable item goes through.
     *
     * @var  \Illuminate\Support\Collection
     */
    protected $chain;

    /**
     * We set the passable item that is supposed to go through the pipe.
     *
     * @param  mixed  $passable
     * @return static
     */
    public function pass($passable)
    {
        $this->passable = $passable;

        return $this;
    }

    /**
     * We set the chain of responsibility that the passable item goes through.
     *
     * @param  \Illuminate\Support\Collection  $chain
     * @return static
     */
    public function through(Collection $chain)
    {
        $this->chain = $chain;

        return $this;
    }

    /**
     * We set the destination and go through the pipe, calling all items in
     * the chain of responsibility.
     *
     * @param  \Closure  $destination
     * @return \Closure
     */
    public function finally(Closure $destination)
    {
        $action = $this->chain->reduce(function ($carry, $item) {
            return function ($passable) use ($carry, $item) {
                return $item->handle($passable, $carry);
            };
        }, $destination);

        return $action($this->passable);
    }
}
