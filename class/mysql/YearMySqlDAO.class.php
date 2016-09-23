<?php

/**
 * Class that operate on table 'year'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-09-23 13:23
 */
class YearMySqlDAO implements YearDAO {

	/**
	 * Get Domain object by primary key
	 *
	 * @param String $id - primary key
	 * @return Year
	 */
	public function load($id) {
		$sql = 'SELECT * FROM year WHERE YId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 *
	 * @return Year[]
	 */
	public function queryAll() {
		$sql = 'SELECT * FROM year';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn - column name
	 *
	 * @return Year[]
	 */
	public function queryAllOrderBy($orderColumn) {
		$sql = 'SELECT * FROM year ORDER BY ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($orderColumn);
		return $this->getList($sqlQuery);
	}

	/**
	 * Delete record from table
	 *
	 * @param year - primary key
	 *
	 * @return int
	 */
	public function delete($YId){
		$sql = 'DELETE FROM year WHERE YId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($YId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
	 * Insert record to table, id is auto-incremented
	 *
	 * @param Year year
	 *
	 * @return String
	 */
	public function insert( $year) {
		$sql = 'INSERT INTO year (Year) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($year->getYear());

		$id = $this->executeInsert($sqlQuery);
		$year->setYId($id);
		return $id;
	}

	/**
	 * Insert record to table with specified id
	 *
	 * @param Year year
	 *
	 * @return string
	 */
	public function insertWithId( $year) {
		$sql = 'INSERT INTO year (YId, Year) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($year->getYId());
		
		$sqlQuery->setNumber($year->getYear());

		$id = $this->executeInsert($sqlQuery);
		return $id;
	}

	/**
	 * Update record in table
	 *
	 * @param Year year
	 *
	 * @return int
	 */
	public function update( $year){
		$sql = 'UPDATE year SET Year = ? WHERE YId = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($year->getYear());

		$sqlQuery->setNumber($year->getYId());
		return $this->executeUpdate($sqlQuery);
	}

	/**
	 * Delete all rows
	 *
	 * @return int
	 */
	public function clean() {
		$sql = 'DELETE FROM year';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

  public function queryByYear($value){
    $sql = 'SELECT * FROM year WHERE Year = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->setNumber($value);
    return $this->getList($sqlQuery);
  }


  public function deleteByYear($value){
    $sql = 'DELETE FROM year WHERE Year = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->setNumber($value);
    return $this->executeUpdate($sqlQuery);
  }



	/**
	 * Read row
	 *
	 * @return Year
	 */
	protected function readRow($row) {
		$year = new Year();
		
		$year->setYId($row['YId']);
		$year->setYear($row['Year']);

		return $year;
	}

	/**
	 * @param $sqlQuery
	 *
	 * @return Year[]
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
	 * @return Year
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
