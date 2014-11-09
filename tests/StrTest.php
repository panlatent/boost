<?php

namespace Test;

use paboost\Str;

class StrTest extends \PHPUnit_Framework_TestCase {

	public function testConvertCamel()
	{
		$this->assertEquals('PaboostOnGithub', Str::convertCamel('paboost_on_github'));
        $this->assertEquals('PaboostOnGithub', Str::convertCamel('paboost-on-github'));
        $this->assertEquals('Paboost-On-Github', Str::convertCamel('paboost-on-github', ['-'], '-'));
	}

	public function testConvertSnake()
	{
		$this->assertEquals('boost_p_h_p_libray', Str::convertSnake('BoostPHPLibray'));
        $this->assertEquals('boost-p-h-p-libray', Str::convertSnake('BoostPHPLibray', '-'));
	}

	public function testRandom()
	{
		$this->assertTrue(1 === preg_match('/^[0-9a-zA-Z]{6}$/', Str::random()));
		$this->assertTrue(1 === preg_match('/^[0-9a-zA-Z]{4}$/', Str::random(4)));
		$this->assertTrue(1 === preg_match('/^[0-9]{6}$/', Str::random(6, '0123456789')));
	}

}