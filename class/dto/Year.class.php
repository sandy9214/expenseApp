<?php
/**
 * Object represents table 'year'
 *
 * @author: http://phpdao.com
 * @date: 2016-09-23 13:23
 */
class Year {
	private $yId;
	private $year;

	public function getYId() {
		return $this->yId;
	}

	public function setYId($yId) {
		$this->yId = $yId;
	}

	public function getYear() {
		return $this->year;
	}

	public function setYear($year) {
		$this->year = $year;
	}


}
?>