<?php
/**
 * Object represents table 'users'
 *
 * @author: http://phpdao.com
 * @date: 2016-09-14 07:24
 */
class User {
	private $userId;
	private $userName;
	private $firstName;
	private $lastName;
	private $emailid;
	private $mobile;
	private $password;
	private $date;
	private $isAdmin;

	public function getUserId() {
		return $this->userId;
	}

	public function setUserId($userId) {
		$this->userId = $userId;
	}

	public function getUserName() {
		return $this->userName;
	}

	public function setUserName($userName) {
		$this->userName = $userName;
	}

	public function getFirstName() {
		return $this->firstName;
	}

	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}

	public function getLastName() {
		return $this->lastName;
	}

	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}

	public function getEmailid() {
		return $this->emailid;
	}

	public function setEmailid($emailid) {
		$this->emailid = $emailid;
	}

	public function getMobile() {
		return $this->mobile;
	}

	public function setMobile($mobile) {
		$this->mobile = $mobile;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function getDate() {
		return $this->date;
	}

	public function setDate($date) {
		$this->date = $date;
	}

	public function getIsAdmin() {
		return $this->isAdmin;
	}

	public function setIsAdmin($isAdmin) {
		$this->isAdmin = $isAdmin;
	}


}
?>