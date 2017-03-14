<?php
/**
 * Boost - A PHP data structures and algorithms enhancement library
 *
 * @author  panlatent@gmail.com
 * @link    https://github.com/panlatent/boost
 * @license https://opensource.org/licenses/MIT
 */

namespace Panlatent\Boost;

class ReadOnlyStorage implements ReadOnlyStorable, \ArrayAccess, \Countable, \Iterator
{
    protected $storage;

    protected $isCountable = true;

    public function __construct($storage = array())
    {
        if (is_array($storage)) {
            $this->storage = $storage;
        } elseif (is_object($storage)) {
            if ($storage instanceof \ArrayAccess) {
                $this->storage = clone $storage;
                if ( ! $storage instanceof \Countable) {
                    $this->isCountable = false;
                }
            } elseif ($storage instanceof \Iterator) {
                foreach ($storage as $key => $value) {
                    $this->storage[$key] = $value;
                }
            } else {
                $this->storage = (array)$storage;
            }
        } else {
            throw new Exception();
        }
    }

    public function get($name)
    {
        return $this->storage[$name];
    }

    public function has($name)
    {
        return isset($this->storage[$name]);
    }

    public function count()
    {
        if ( ! $this->isCountable) {
            throw new Exception();
        }

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
        throw new ReadOnlyException();
    }

    public function offsetUnset($name)
    {
        throw new ReadOnlyException();
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