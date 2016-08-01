<?php

namespace Test;

use Boost\BetterString;

class BetteStringTest extends \PHPUnit_Framework_TestCase {

	public function testConvertCamel()
	{
		$this->assertEquals('BoostOnGithub', BetterString::convertCamel('boost_on_github'));
        $this->assertEquals('BoostOnGithub', BetterString::convertCamel('boost-on-github'));
        $this->assertEquals('Boost-On-Github', BetterString::convertCamel('boost-on-github', ['-'], '-'));
	}

	public function testConvertSnake()
	{
		$this->assertEquals('boost_p_h_p_library', BetterString::convertSnake('BoostPHPLibrary'));
        $this->assertEquals('boost-p-h-p-library', BetterString::convertSnake('BoostPHPLibrary', '-'));
	}

	public function testRandom()
	{
		$this->assertTrue(1 === preg_match('/^[0-9a-zA-Z]{6}$/', BetterString::random()));
		$this->assertTrue(1 === preg_match('/^[0-9a-zA-Z]{4}$/', BetterString::random(4)));
		$this->assertTrue(1 === preg_match('/^[0-9]{6}$/', BetterString::random(6, '0123456789')));
	}

}