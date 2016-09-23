<?php

/**
 * Class that operate on table 'tempbudgetmonthly'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-09-06 12:51
 */
class TempbudgetmonthlyMySqlDAO implements TempbudgetmonthlyDAO {

	/**
	 * Get Domain object by primary key
	 *
	 * @param String $id - primary key
	 * @return Tempbudgetmonthly
	 */
	public function load($id) {
		$sql = 'SELECT * FROM tempbudgetmonthly WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 *
	 * @return Tempbudgetmonthly[]
	 */
	public function queryAll() {
		$sql = 'SELECT * FROM tempbudgetmonthly';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn - column name
	 *
	 * @return Tempbudgetmonthly[]
	 */
	public function queryAllOrderBy($orderColumn) {
		$sql = 'SELECT * FROM tempbudgetmonthly ORDER BY ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($orderColumn);
		return $this->getList($sqlQuery);
	}

	/**
	 * Delete record from table
	 *
	 * @param tempbudgetmonthly - primary key
	 *
	 * @return int
	 */
	public function delete($id){
		$sql = 'DELETE FROM tempbudgetmonthly WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
	 * Insert record to table, id is auto-incremented
	 *
	 * @param Tempbudgetmonthly tempbudgetmonthly
	 *
	 * @return String
	 */
	public function insert($tempbudgetmonthly) {
		$sql = 'INSERT INTO tempbudgetmonthly (TUserId, TotalExp, RecieveAmt) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tempbudgetmonthly->getTUserId());
		$sqlQuery->setNumber($tempbudgetmonthly->getTotalExp());
		$sqlQuery->setNumber($tempbudgetmonthly->getRecieveAmt());

		$id = $this->executeInsert($sqlQuery);
		$tempbudgetmonthly->setId($id);
		return $id;
	}

	/**
	 * Insert record to table with specified id
	 *
	 * @param Tempbudgetmonthly tempbudgetmonthly
	 *
	 * @return string
	 */
	public function insertWithId(Tempbudgetmonthly $tempbudgetmonthly) {
		$sql = 'INSERT INTO tempbudgetmonthly (id, TUserId, TotalExp, RecieveAmt) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($tempbudgetmonthly->getId());
		
		$sqlQuery->setNumber($tempbudgetmonthly->getTUserId());
		$sqlQuery->setNumber($tempbudgetmonthly->getTotalExp());
		$sqlQuery->setNumber($tempbudgetmonthly->getRecieveAmt());

		$id = $this->executeInsert($sqlQuery);
		return $id;
	}

	/**
	 * Update record in table
	 *
	 * @param Tempbudgetmonthly tempbudgetmonthly
	 *
	 * @return int
	 */
	public function update($tempbudgetmonthly){
		$sql = 'UPDATE tempbudgetmonthly SET TUserId = ?, TotalExp = ?, RecieveAmt = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tempbudgetmonthly->getTUserId());
		$sqlQuery->setNumber($tempbudgetmonthly->getTotalExp());
		$sqlQuery->setNumber($tempbudgetmonthly->getRecieveAmt());

		$sqlQuery->setNumber($tempbudgetmonthly->getId());
		return $this->executeUpdate($sqlQuery);
	}

	/**
	 * Delete all rows
	 *
	 * @return int
	 */
	public function clean() {
		$sql = 'DELETE FROM tempbudgetmonthly';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

  public function queryByTUserId($value){
    $sql = 'SELECT * FROM tempbudgetmonthly WHERE TUserId = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->setNumber($value);
    return $this->getList($sqlQuery);
  }

  public function queryByTotalExp($value){
    $sql = 'SELECT * FROM tempbudgetmonthly WHERE TotalExp = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->setNumber($value);
    return $this->getList($sqlQuery);
  }

  public function queryByRecieveAmt($value){
    $sql = 'SELECT * FROM tempbudgetmonthly WHERE RecieveAmt = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->setNumber($value);
    return $this->getList($sqlQuery);
  }


  public function deleteByTUserId($value){
    $sql = 'DELETE FROM tempbudgetmonthly WHERE TUserId = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->setNumber($value);
    return $this->executeUpdate($sqlQuery);
  }

  public function deleteByTotalExp($value){
    $sql = 'DELETE FROM tempbudgetmonthly WHERE TotalExp = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->setNumber($value);
    return $this->executeUpdate($sqlQuery);
  }

  public function deleteByRecieveAmt($value){
    $sql = 'DELETE FROM tempbudgetmonthly WHERE RecieveAmt = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->setNumber($value);
    return $this->executeUpdate($sqlQuery);
  }



	/**
	 * Read row
	 *
	 * @return Tempbudgetmonthly
	 */
	protected function readRow($row) {
		$tempbudgetmonthly = new Tempbudgetmonthly();
		
		$tempbudgetmonthly->setId($row['id']);
		$tempbudgetmonthly->setTUserId($row['TUserId']);
		$tempbudgetmonthly->setTotalExp($row['TotalExp']);
		$tempbudgetmonthly->setRecieveAmt($row['RecieveAmt']);

		return $tempbudgetmonthly;
	}

	/**
	 * @param $sqlQuery
	 *
	 * @return Tempbudgetmonthly[]
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
	 * @return Tempbudgetmonthly
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
