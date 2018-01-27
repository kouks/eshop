<?php

namespace Lib\Routing;

use ReflectionMethod;
use ReflectionFunction;

class BindingResolver
{
    /**
     * Resolves implicit bindings for a provided route.
     *
     * @param  array|\Closure  $action
     * @return array
     */
    public function resolve($action)
    {
        $reflection = $this->getReflection($action);
        $args = [];

        foreach ($reflection->getParameters() as $param) {
            if (/*$param instanceof Mode*/ false) {
                //
            }

            $args[] = app((string) $param->getType());
        }

        return $args;
    }

    /**
     * Returns corresponding reflection class per action.
     *
     * @param  array|\Closure  $action
     * @return \ReflectionFunctionAbstract
     */
    protected function getReflection($action)
    {
        if (is_array($action)) {
            return new ReflectionMethod(...$action);
        }

        return new ReflectionFunction($action);
    }
}
