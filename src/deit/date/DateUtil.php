<?php

namespace deit\date;
use DateTime;

/**
 * Date class
 * @author James Newell <james@digitaledgeit.com.au>
 */
class DateUtil {

	/**
	 * Gets the start and end date of the financial year
	 * @param   \DateTime|int $now
	 * @return  \DateTime[]
	 */
	static public function getFinancialYear($now = null) {

		if (is_null($now)) {
			$now = time();
		} else if (is_string($now)) {
			$now = strtotime($now);
		} else if ($now instanceof DateTime) {
			$now = $now->getTimestamp();
		}

		$sofy = mktime(0, 0, 0, 7, 1, date('Y', $now));

		if ($now >= $sofy) {
			$startYear = date('Y', $now);

		} else {
			$startYear = date('Y', $now)-1;
		}

		return [
			'start' => date('Y-m-d', mktime(0, 0, 0, 7, 1, $startYear)),
			'end'   => date('Y-m-d', mktime(0, 0, 0, 6, 30, $startYear+1)),
		];

	}

	/**
	 * Gets the financial year from the offset
	 * @param   int $offset
	 * @return  \DateTime[]
	 */
	static public function getFinancialYearFromOffset($offset) {
		return self::getFinancialYear(mktime(
			0, 0, 0, date('n'), date('j'), date('Y')+$offset
		));
	}

}
 