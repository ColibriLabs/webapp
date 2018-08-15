<?php

namespace Colibri\WebApp\Rest\JsonMessages\Helper;

/**
 * Trait ModelNameAwareTrait
 * @package Colibri\WebApp\Rest\JsonMessages\Helper
 */
trait ModelNameAwareTrait
{
    
    /**
     * @var string
     */
    public $mapper;
    
    /**
     * @return string
     */
    public function getEntityName()
    {
        return $this->mapper;
    }
    
    /**
     * @param string $modelName
     */
    public function setEntityName($modelName)
    {
        $this->mapper = $modelName;
    }
    
    /**
     * @return void
     */
    public function useClassName()
    {
        $this->setEntityName($this->normalizeClassName(static::class));
    }
    
    /**
     * @param $className
     * @return string
     */
    private function normalizeClassName($className)
    {
        list($name, $prefix) = array_reverse(explode('\\', $className));

        $suffix = preg_replace('/response$/i', null, lcfirst($name));

        return sprintf('%s.%s', lcfirst($prefix), $suffix);
    }
    
}
