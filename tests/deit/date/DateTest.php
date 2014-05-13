<?php

namespace deit\date;
use DateTime;
use deit\date\DateUtil;

/**
 * Date test
 * @author James Newell <james@digitaledgeit.com.au>
 */
class DateTest extends \PHPUnit_Framework_TestCase {

	public function test_getFinancialYear() {

		$period = DateUtil::getFinancialYear(mktime(0, 0, 0, 6, 30, 2014));
		$this->assertEquals('2013-07-01', $period['start']);
		$this->assertEquals('2014-06-30', $period['end']);

		$period = DateUtil::getFinancialYear(mktime(0, 0, 0, 7, 1, 2014));
		$this->assertEquals('2014-07-01', $period['start']);
		$this->assertEquals('2015-06-30', $period['end']);

	}

	public function test_getFinancialYearOffset() {

		$period = DateUtil::getFinancialYearFromOffset(2);

	}

}
 