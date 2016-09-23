<?php
/**
 * Object represents table 'tempbudgetmonthly'
 *
 * @author: http://phpdao.com
 * @date: 2016-09-06 12:51
 */
class Tempbudgetmonthly {
	private $id;
	private $tUserId;
	private $totalExp;
	private $recieveAmt;

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getTUserId() {
		return $this->tUserId;
	}

	public function setTUserId($tUserId) {
		$this->tUserId = $tUserId;
	}

	public function getTotalExp() {
		return $this->totalExp;
	}

	public function setTotalExp($totalExp) {
		$this->totalExp = $totalExp;
	}

	public function getRecieveAmt() {
		return $this->recieveAmt;
	}

	public function setRecieveAmt($recieveAmt) {
		$this->recieveAmt = $recieveAmt;
	}


}
?>