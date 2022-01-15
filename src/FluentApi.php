<?php

/**
 * Class designed for fluent API interface: you can invoke the same method 
 * statically and non-statically.
 */
class FluentApi
{

    /**
     * Invoke a method in a non-static way.
     *
     * @param string $method
     * @param array $args
     * @return void
     */
    public function __call(string $method, array $args=[])
    {
        return $this->call($method, $args);
    }

    /**
     * Invoke a method in a static way.
     *
     * @param string $method
     * @param array $args
     * @return void
     */
    public static function __callStatic(string $method, array $args=[])
    {
        return (new static())->call($method, $args);
    }

    /**
     * Perform the actual invokation of the method.
     * The name of the method should start with a "_" to be invoked statically 
     * or non-statically.
     *
     * @param string $method
     * @param array $args
     * @return void
     */
    private function call(string $method, array $args=[])
    {
        if (! method_exists($this , '_' . $method)) {
            throw new Exception('Call undefined method ' . $method);
        }

        return $this->{'_' . $method}(...$args);
    }
}
