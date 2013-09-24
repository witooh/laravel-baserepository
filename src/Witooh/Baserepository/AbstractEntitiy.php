<?php
namespace Witooh\Entities;

use Illuminate\Support\Contracts\ArrayableInterface;

abstract class AbstractEntitiy implements ArrayableInterface
{
    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     * @throws \BadMethodCallException
     */
    public function __call($name, $arguments)
    {
        $type = str_split($name, 3)[0];
        if ($type == 'get') {
            return $this->getMethod($this->toCamelCase("get", $name));
        } elseif ($type == 'set') {
            $this->setMethod($this->toCamelCase("set", $name), $arguments[0]);
        }
    }

    /**
     * @param string $cut
     * @param string $methodName
     * @return string
     */
    private function toCamelCase($cut, $methodName)
    {
        return camel_case(str_replace($cut, "", $methodName));
    }

    /**
     * @param string $name
     * @return mixed
     * @throws \BadMethodCallException
     */
    private function getMethod($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        } else {
            throw new \BadMethodCallException("This method doesn't exist");
        }
    }

    /**
     * @param string $name
     * @param mixed $value
     * @throws \BadMethodCallException
     */
    private function setMethod($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        } else {
            throw new \BadMethodCallException("This method doesn't exist");
        }
    }

    /**
     * @param array $attributes
     */
    public function fill(array $attributes)
    {
        $properties = $this->toArray();

        foreach ($attributes as $key => $value) {
            if (array_key_exists($key, $properties)) {
                $method = "set" . ucfirst($key);
                $this->$method($value);
            }
        }
    }

    /**
     * Get the collection of items as a plain array.
     *
     * @return array
     */
    public function toArray()
    {
        return array_map(function ($value) {
            return $value instanceof ArrayableInterface ? $value->toArray() : $value;

        }, get_object_vars($this));
    }

    /**
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }
}