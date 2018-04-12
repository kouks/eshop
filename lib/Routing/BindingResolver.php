<?php

namespace Lib\Routing;

use Lib\Http\Request;
use ReflectionMethod;
use ReflectionFunction;
use MongoDB\BSON\ObjectId;

class BindingResolver
{
    /**
     * Resolves implicit bindings for a provided route.
     *
     * @param  \Lib\Http\Request  $request
     * @param  array|\Closure  $action
     * @return array
     */
    public function resolve(Request $request, $action)
    {
        $reflection = $this->getReflection($action);
        $args = [];

        foreach ($reflection->getParameters() as $param) {
            if (strpos((string) $param->getType(), 'App\\Models\\') !== false) {
                $model = (string) $param->getType();

                $query = $model::$key === '_id'
                    ? new ObjectId($request->param($param->getName()))
                    : $request->param($param->getName());

                $args[] = $model::find([$model::$key => $query]);

                continue;
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
