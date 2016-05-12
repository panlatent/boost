<?php

namespace Seven\Boost;

class Container implements ContainerInterface, \ArrayAccess, \Countable, \Iterator {

    protected $_storage;

    public function __construct($storage = array())
    {
        $this->_storage = $storage;
    }

    public function clear()
    {
        $this->_storage = array();
    }

    public function get($name)
    {
        return $this->_storage[$name];
    }

    public function has($name)
    {
        return isset($this->_storage[$name]);
    }

    public function set($name, $value)
    {
        $this->_storage[$name] = $value;
    }

    public function destroy($name)
    {
        unset($this->_storage[$name]);
    }

    public function count()
    {
        return count($this->_storage);
    }

    public function offsetExists($name)
    {
        return $this->has($name);
    }

    public function offsetGet($name)
    {
        return $this->get($name);
    }

    public function offsetSet($name, $value)
    {
        $this->set($name, $value);
    }

    public function offsetUnset($name)
    {
        $this->destroy($name);
    }

    public function current()
    {
        return current($this->_storage);
    }

    public function next()
    {
        return next($this->_storage);
    }

    public function key()
    {
        return key($this->_storage);
    }

    public function valid()
    {
        return key($this->_storage) !== null;
    }

    public function rewind()
    {
        return reset($this->_storage);
    }

}