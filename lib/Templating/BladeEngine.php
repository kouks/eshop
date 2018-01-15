<?php

namespace Lib\Templating;

use Philo\Blade\Blade;
use Lib\Contracts\Templating\Engine;

class BladeEngine implements Engine
{
    /**
     * Blade engine instance.
     *
     * @var \Philo\Blade\Blade
     */
    protected $blade;

    /**
     * Class constructor.
     *
     * @param  \Philo\Blade\Blade  $blade
     * @return void
     */
    public function __construct(Blade $blade)
    {
        $this->blade = $blade;
    }

    /**
     * Function to render a given view.
     *
     * @param  string  $view
     * @param  array  $attributes
     * @return string
     */
    public function render($view, array $attributes = [])
    {
        return $this->blade->view()->make($view, $attributes)->render();
    }
}
