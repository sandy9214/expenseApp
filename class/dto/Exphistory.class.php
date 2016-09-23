<?php
/**
 * Object represents table 'exphistory'
 *
 * @author: http://phpdao.com
 * @date: 2016-09-23 13:41
 */
class Exphistory {
	private $id;
	private $year;
	private $month;
	private $exp;

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getYear() {
		return $this->year;
	}

	public function setYear($year) {
		$this->year = $year;
	}

	public function getMonth() {
		return $this->month;
	}

	public function setMonth($month) {
		$this->month = $month;
	}

	public function getExp() {
		return $this->exp;
	}

	public function setExp($exp) {
		$this->exp = $exp;
	}


}
?>