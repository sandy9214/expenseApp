<?php

/**
 * Class that operate on table 'users'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-09-14 07:24
 */
class UsersMySqlDAO implements UsersDAO {

public function checkLogin($user)
	{
		$sql = 'SELECT * FROM users WHERE UserName = ? and Password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($user->getUserName());
		$sqlQuery->set($user->getPassword());
		return $this->getRow($sqlQuery);
	}	/**
	 * Get Domain object by primary key
	 *
	 * @param String $id - primary key
	 * @return User
	 */
	public function load($id) {
		$sql = 'SELECT * FROM users WHERE userId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 *
	 * @return User[]
	 */
	public function queryAll() {
		$sql = 'SELECT * FROM users';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn - column name
	 *
	 * @return User[]
	 */
	public function queryAllOrderBy($orderColumn) {
		$sql = 'SELECT * FROM users ORDER BY ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($orderColumn);
		return $this->getList($sqlQuery);
	}

	/**
	 * Delete record from table
	 *
	 * @param user - primary key
	 *
	 * @return int
	 */
	public function delete($userId){
		$sql = 'DELETE FROM users WHERE userId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($userId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
	 * Insert record to table, id is auto-incremented
	 *
	 * @param User user
	 *
	 * @return String
	 */
	public function insert($user) {
		$sql = 'INSERT INTO users (UserName, FirstName, LastName, emailid, mobile, password, date, isAdmin) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($user->getUserName());
		$sqlQuery->set($user->getFirstName());
		$sqlQuery->set($user->getLastName());
		$sqlQuery->set($user->getEmailid());
		$sqlQuery->setNumber($user->getMobile());
		$sqlQuery->set($user->getPassword());
		$sqlQuery->set($user->getDate());
		$sqlQuery->setNumber($user->getIsAdmin());

		$id = $this->executeInsert($sqlQuery);
		$user->setUserId($id);
		return $id;
	}

	/**
	 * Insert record to table with specified id
	 *
	 * @param User user
	 *
	 * @return string
	 */
	public function insertWithId(User $user) {
		$sql = 'INSERT INTO users (userId, UserName, FirstName, LastName, emailid, mobile, password, date, isAdmin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($user->getUserId());
		
		$sqlQuery->set($user->getUserName());
		$sqlQuery->set($user->getFirstName());
		$sqlQuery->set($user->getLastName());
		$sqlQuery->set($user->getEmailid());
		$sqlQuery->setNumber($user->getMobile());
		$sqlQuery->set($user->getPassword());
		$sqlQuery->set($user->getDate());
		$sqlQuery->setNumber($user->getIsAdmin());

		$id = $this->executeInsert($sqlQuery);
		return $id;
	}

	/**
	 * Update record in table
	 *
	 * @param User user
	 *
	 * @return int
	 */
	public function update($user){
		$sql = 'UPDATE users SET UserName = ?, FirstName = ?, LastName = ?, emailid = ?, mobile = ?, password = ?, date = ?, isAdmin = ? WHERE userId = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($user->getUserName());
		$sqlQuery->set($user->getFirstName());
		$sqlQuery->set($user->getLastName());
		$sqlQuery->set($user->getEmailid());
		$sqlQuery->setNumber($user->getMobile());
		$sqlQuery->set($user->getPassword());
		$sqlQuery->set($user->getDate());
		$sqlQuery->setNumber($user->getIsAdmin());

		$sqlQuery->setNumber($user->getUserId());
		return $this->executeUpdate($sqlQuery);
	}

	/**
	 * Delete all rows
	 *
	 * @return int
	 */
	public function clean() {
		$sql = 'DELETE FROM users';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

  public function queryByUserName($value){
    $sql = 'SELECT * FROM users WHERE UserName = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->set($value);
    return $this->getList($sqlQuery);
  }

  public function queryByFirstName($value){
    $sql = 'SELECT * FROM users WHERE FirstName = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->set($value);
    return $this->getList($sqlQuery);
  }

  public function queryByLastName($value){
    $sql = 'SELECT * FROM users WHERE LastName = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->set($value);
    return $this->getList($sqlQuery);
  }

  public function queryByEmailid($value){
    $sql = 'SELECT * FROM users WHERE emailid = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->set($value);
    return $this->getList($sqlQuery);
  }

  public function queryByMobile($value){
    $sql = 'SELECT * FROM users WHERE mobile = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->setNumber($value);
    return $this->getList($sqlQuery);
  }

  public function queryByPassword($value){
    $sql = 'SELECT * FROM users WHERE password = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->set($value);
    return $this->getList($sqlQuery);
  }

  public function queryByDate($value){
    $sql = 'SELECT * FROM users WHERE date = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->set($value);
    return $this->getList($sqlQuery);
  }

  public function queryByIsAdmin($value){
    $sql = 'SELECT * FROM users WHERE isAdmin = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->setNumber($value);
    return $this->getList($sqlQuery);
  }


  public function deleteByUserName($value){
    $sql = 'DELETE FROM users WHERE UserName = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->set($value);
    return $this->executeUpdate($sqlQuery);
  }

  public function deleteByFirstName($value){
    $sql = 'DELETE FROM users WHERE FirstName = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->set($value);
    return $this->executeUpdate($sqlQuery);
  }

  public function deleteByLastName($value){
    $sql = 'DELETE FROM users WHERE LastName = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->set($value);
    return $this->executeUpdate($sqlQuery);
  }

  public function deleteByEmailid($value){
    $sql = 'DELETE FROM users WHERE emailid = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->set($value);
    return $this->executeUpdate($sqlQuery);
  }

  public function deleteByMobile($value){
    $sql = 'DELETE FROM users WHERE mobile = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->setNumber($value);
    return $this->executeUpdate($sqlQuery);
  }

  public function deleteByPassword($value){
    $sql = 'DELETE FROM users WHERE password = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->set($value);
    return $this->executeUpdate($sqlQuery);
  }

  public function deleteByDate($value){
    $sql = 'DELETE FROM users WHERE date = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->set($value);
    return $this->executeUpdate($sqlQuery);
  }

  public function deleteByIsAdmin($value){
    $sql = 'DELETE FROM users WHERE isAdmin = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->setNumber($value);
    return $this->executeUpdate($sqlQuery);
  }



	/**
	 * Read row
	 *
	 * @return User
	 */
	protected function readRow($row) {
		$user = new User();
		
		$user->setUserId($row['userId']);
		$user->setUserName($row['UserName']);
		$user->setFirstName($row['FirstName']);
		$user->setLastName($row['LastName']);
		$user->setEmailid($row['emailid']);
		$user->setMobile($row['mobile']);
		$user->setPassword($row['password']);
		$user->setDate($row['date']);
		$user->setIsAdmin($row['isAdmin']);

		return $user;
	}

	/**
	 * @param $sqlQuery
	 *
	 * @return User[]
	 */
	protected function getList($sqlQuery) {
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for ($i = 0; $i < count($tab); $i++) {
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}

	/**
	 * Get row
	 *
	 * @param $sqlQuery
	 * @return User
	 */
	protected function getRow($sqlQuery) {
		$tab = QueryExecutor::execute($sqlQuery);
		if (count($tab) == 0) {
			return null;
		}
		return $this->readRow($tab[0]);
	}

    	/**
	 * @param $sqlQuery
	 * @return int
	 */
	protected function execute($sqlQuery) {
		return QueryExecutor::execute($sqlQuery);
	}

    	/**
	 * @param $sqlQuery
	 * @return int
	 */
	protected function executeUpdate($sqlQuery) {
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * @param $sqlQuery
	 * @return int
	 */
	protected function querySingleResult($sqlQuery) {
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * @param $sqlQuery
	 * @return int
	 */
	protected function executeInsert($sqlQuery) {
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>
