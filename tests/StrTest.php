<?php

namespace Test;

use Boost\Str;

class StrTest extends \PHPUnit_Framework_TestCase {

	public function testConvertCamel()
	{
		$this->assertEquals('BoostOnGithub', Str::convertCamel('boost_on_github'));
        $this->assertEquals('BoostOnGithub', Str::convertCamel('boost-on-github'));
        $this->assertEquals('Boost-On-Github', Str::convertCamel('boost-on-github', ['-'], '-'));
	}

	public function testConvertSnake()
	{
		$this->assertEquals('boost_p_h_p_library', Str::convertSnake('BoostPHPLibrary'));
        $this->assertEquals('boost-p-h-p-library', Str::convertSnake('BoostPHPLibrary', '-'));
	}

	public function testRandom()
	{
		$this->assertTrue(1 === preg_match('/^[0-9a-zA-Z]{6}$/', Str::random()));
		$this->assertTrue(1 === preg_match('/^[0-9a-zA-Z]{4}$/', Str::random(4)));
		$this->assertTrue(1 === preg_match('/^[0-9]{6}$/', Str::random(6, '0123456789')));
	}

}