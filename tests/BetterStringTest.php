<?php

namespace Test;

use Panlatent\Boost\BString;

class BetteStringTest extends \PHPUnit_Framework_TestCase {

	public function testConvertCamel()
	{
		$this->assertEquals('BoostOnGithub', BString::convertCamel('boost_on_github'));
        $this->assertEquals('BoostOnGithub', BString::convertCamel('boost-on-github'));
        $this->assertEquals('Boost-On-Github', BString::convertCamel('boost-on-github', ['-'], '-'));
	}

	public function testConvertSnake()
	{
		$this->assertEquals('boost_p_h_p_library', BString::convertSnake('BoostPHPLibrary'));
        $this->assertEquals('boost-p-h-p-library', BString::convertSnake('BoostPHPLibrary', '-'));
	}

	public function testRandom()
	{
		$this->assertTrue(1 === preg_match('/^[0-9a-zA-Z]{6}$/', BString::random()));
		$this->assertTrue(1 === preg_match('/^[0-9a-zA-Z]{4}$/', BString::random(4)));
		$this->assertTrue(1 === preg_match('/^[0-9]{6}$/', BString::random(6, '0123456789')));
	}

}