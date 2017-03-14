<?php
/**
 * Boost - A PHP data structures and algorithms enhancement library
 *
 * @author  panlatent@gmail.com
 * @link    https://github.com/panlatent/boost
 * @license https://opensource.org/licenses/MIT
 */

namespace Panlatent\Boost;

class Storage extends ReadOnlyStorage implements Storable
{
    public function clear()
    {
        $this->storage = array();
    }

    public function set($name, $value)
    {
        $this->storage[$name] = $value;
    }

    public function destroy($name)
    {
        unset($this->storage[$name]);
    }

    public function offsetSet($name, $value)
    {
        $this->set($name, $value);
    }

    public function offsetUnset($name)
    {
        $this->destroy($name);
    }
}