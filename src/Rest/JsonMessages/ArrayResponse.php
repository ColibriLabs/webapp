<?php

namespace Colibri\WebApp\Rest\JsonMessages;

/**
 * Class FlatArrayResponse
 * @package Colibri\WebApp\Rest\JsonMessages
 */
class ArrayResponse extends AbstractResponse
{
    
    /**
     * FlatArrayResponse constructor.
     * @param array $content
     */
    public function __construct(array $content = [])
    {
        foreach ($content as $name => $value) {
            $this->{$name} = $value;
        }
    }
    
    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return property_exists($this, $name) ? $this->{$name} : null;
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->{$name} = $value;
    }
    
}
