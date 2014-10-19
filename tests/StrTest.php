<?php

namespace Test {

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
    		$this->assertEquals('boost-phplibray', Str::convertSnake('BoostPHPLibray', '-', false));
		}

	}

}