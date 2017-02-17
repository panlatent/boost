<?php
/**
 * Boost - A PHP data structures and algorithms enhancement library
 *
 * @author  panlatent@gmail.com
 * @link    https://github.com/panlatent/boost
 * @license https://opensource.org/licenses/MIT
 */

namespace Panlatent\Boost;

class Storage implements Storable, \ArrayAccess, \Countable, \Iterator
{
    protected $storage;

    public function __construct($storage = array())
    {
        $this->storage = $storage;
    }

    public function clear()
    {
        $this->storage = array();
    }

    public function get($name)
    {
        return $this->storage[$name];
    }

    public function has($name)
    {
        return isset($this->storage[$name]);
    }

    public function set($name, $value)
    {
        $this->storage[$name] = $value;
    }

    public function destroy($name)
    {
        unset($this->storage[$name]);
    }

    public function count()
    {
        return count($this->storage);
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
        return current($this->storage);
    }

    public function next()
    {
        return next($this->storage);
    }

    public function key()
    {
        return key($this->storage);
    }

    public function valid()
    {
        return key($this->storage) !== null;
    }

    public function rewind()
    {
        return reset($this->storage);
    }
}