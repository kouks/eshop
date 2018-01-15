<?php

namespace Lib\Contracts\Templating;

interface Engine
{
    /**
     * Function to render a given view.
     *
     * @param  string  $view
     * @param  array  $attributes
     * @return string
     */
    public function render($view, array $attributes = []);
}
