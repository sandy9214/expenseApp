<?php

/**
 * Class that operate on table 'month'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-09-23 13:23
 */
class MonthMySqlDAO implements MonthDAO {

	/**
	 * Get Domain object by primary key
	 *
	 * @param String $id - primary key
	 * @return Month
	 */
	public function load($id) {
		$sql = 'SELECT * FROM month WHERE MId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 *
	 * @return Month[]
	 */
	public function queryAll() {
		$sql = 'SELECT * FROM month';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn - column name
	 *
	 * @return Month[]
	 */
	public function queryAllOrderBy($orderColumn) {
		$sql = 'SELECT * FROM month ORDER BY ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($orderColumn);
		return $this->getList($sqlQuery);
	}

	/**
	 * Delete record from table
	 *
	 * @param month - primary key
	 *
	 * @return int
	 */
	public function delete($MId){
		$sql = 'DELETE FROM month WHERE MId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($MId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
	 * Insert record to table, id is auto-incremented
	 *
	 * @param Month month
	 *
	 * @return String
	 */
	public function insert( $month) {
		$sql = 'INSERT INTO month (Month) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($month->getMonth());

		$id = $this->executeInsert($sqlQuery);
		$month->setMId($id);
		return $id;
	}

	/**
	 * Insert record to table with specified id
	 *
	 * @param Month month
	 *
	 * @return string
	 */
	public function insertWithId( $month) {
		$sql = 'INSERT INTO month (MId, Month) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($month->getMId());
		
		$sqlQuery->set($month->getMonth());

		$id = $this->executeInsert($sqlQuery);
		return $id;
	}

	/**
	 * Update record in table
	 *
	 * @param Month month
	 *
	 * @return int
	 */
	public function update( $month){
		$sql = 'UPDATE month SET Month = ? WHERE MId = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($month->getMonth());

		$sqlQuery->setNumber($month->getMId());
		return $this->executeUpdate($sqlQuery);
	}

	/**
	 * Delete all rows
	 *
	 * @return int
	 */
	public function clean() {
		$sql = 'DELETE FROM month';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

  public function queryByMonth($value){
    $sql = 'SELECT * FROM month WHERE Month = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->set($value);
    return $this->getList($sqlQuery);
  }


  public function deleteByMonth($value){
    $sql = 'DELETE FROM month WHERE Month = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->set($value);
    return $this->executeUpdate($sqlQuery);
  }



	/**
	 * Read row
	 *
	 * @return Month
	 */
	protected function readRow($row) {
		$month = new Month();
		
		$month->setMId($row['MId']);
		$month->setMonth($row['Month']);

		return $month;
	}

	/**
	 * @param $sqlQuery
	 *
	 * @return Month[]
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
	 * @return Month
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
