<?php

namespace Test;

use Boost\ArrObj;

class ArrObjTest extends \PHPUnit_Framework_TestCase {

	public function testValue()
	{
		$this->assertNull(ArrObj::value('boost', 'boost'));
		$this->assertEquals('library', ArrObj::value(array('boost'), 'boost', 'library'));
		$this->assertEquals('library', ArrObj::value(array('boost' => 'library'), 'boost'));
		$this->assertEquals('library', ArrObj::value((object)array('boost'), 'boost', 'library'));
		$this->assertEquals('library', ArrObj::value((object)array('boost' => 'library'), 'boost'));
	}

	public function testValueByDot()
	{
		$this->assertEquals('library', ArrObj::valueByDot(array('boost'), 'boost', 'library'));
		$this->assertEquals('library', ArrObj::valueByDot(array('boost' => 'library'), 'boost'));
		$this->assertEquals('library', ArrObj::valueByDot((object)array('boost'), 'boost', 'library'));
		$this->assertEquals('library', ArrObj::valueByDot((object)array('boost' => 'library'), 'boost'));
		$this->assertNull(ArrObj::valueByDot(array('boost' => array('library')), 'boost.library'));
		$this->assertEquals('php', ArrObj::valueByDot(array('boost' => array('library' => 'php')), 'boost.library'));
	}

}