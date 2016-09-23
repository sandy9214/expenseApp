<?php
/**
 * Object represents table 'month'
 *
 * @author: http://phpdao.com
 * @date: 2016-09-23 13:23
 */
class Month {
	private $mId;
	private $month;

	public function getMId() {
		return $this->mId;
	}

	public function setMId($mId) {
		$this->mId = $mId;
	}

	public function getMonth() {
		return $this->month;
	}

	public function setMonth($month) {
		$this->month = $month;
	}


}
?>