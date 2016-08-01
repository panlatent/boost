<?php

namespace Boost;

class BaseString implements \ArrayAccess, \Countable
{
    protected $store;
    
    public function __construct($phpString = '')
    {
        $this->store = $phpString;
    }

    public function __destruct()
    {
        unset($this->store);
    }

    public static function factory($var = null)
    {
        return new static($var);
    }

    public function chunkSplit($chunkLength = null, $end = null)
    {
        return chunk_split($this->store, $chunkLength, $end);
    }

    public function at($point)
    {
        return $this->store[$point];
    }

    public function count()
    {
        return 1;
    }

    public function isEmpty()
    {
        return empty($this->store);
    }

    public function length()
    {
        return mb_strwidth($this->store);
    }
    
    public function size()
    {
        return strlen($this->store);
    }

    public function sub($start = 0, $length = null)
    {
        return static::factory(substr($this->store, $start, $length));
    }

    public function explode($delimiter, $limit = null)
    {
        return static::factory(explode($delimiter, $this->store, $limit));
    }

    public function replace($search, $replace, $count = null)
    {
        return static::factory(str_replace($search, $replace, $count));
    }

    public function iReplace($search, $replace, $count = null)
    {
        return static::factory(str_ireplace($search, $replace, $count));
    }

    public function pad($padLength, $padString = null, $padType = null)
    {
       return static::factory(str_pad($this->store, $padLength, $padString, $padType));
    }

    public function lcFirst()
    {
        return static::factory(lcfirst($this->store));
    }

    public function ucFirst()
    {
        return static::factory(ucfirst($this->store));
    }

    public function ucWords()
    {
        return static::factory(ucwords($this->store));
    }

    public function toLower()
    {
        return static::factory(strtolower($this->store));
    }

    public function toUpper()
    {
        return static::factory(strtoupper($this->store));
    }

    public function __toString()
    {
        return $this->store;
    }

    public function offsetExists($offset)
    {
        return isset($this->store[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->store[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->store[$offset] = substr($value, 0, 1);
    }

    public function offsetUnset($offset)
    {
        throw new Exception('Cannot unset string offsets');
    }
    
}