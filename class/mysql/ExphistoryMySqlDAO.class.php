<?php

/**
 * Class that operate on table 'exphistory'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-09-23 13:41
 */
class ExphistoryMySqlDAO implements ExphistoryDAO {

	/**
	 * Get Domain object by primary key
	 *
	 * @param String $id - primary key
	 * @return Exphistory
	 */
	public function load($id) {
		$sql = 'SELECT * FROM exphistory WHERE Id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 *
	 * @return Exphistory[]
	 */
	public function queryAll() {
		$sql = 'SELECT * FROM exphistory';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn - column name
	 *
	 * @return Exphistory[]
	 */
	public function queryAllOrderBy($orderColumn) {
		$sql = 'SELECT * FROM exphistory ORDER BY ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($orderColumn);
		return $this->getList($sqlQuery);
	}

	/**
	 * Delete record from table
	 *
	 * @param exphistory - primary key
	 *
	 * @return int
	 */
	public function delete($Id){
		$sql = 'DELETE FROM exphistory WHERE Id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($Id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
	 * Insert record to table, id is auto-incremented
	 *
	 * @param Exphistory exphistory
	 *
	 * @return String
	 */
	public function insert( $exphistory) {
		$sql = 'INSERT INTO exphistory (Year, Month, Exp) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($exphistory->getYear());
		$sqlQuery->setNumber($exphistory->getMonth());
		$sqlQuery->setNumber($exphistory->getExp());

		$id = $this->executeInsert($sqlQuery);
		$exphistory->setId($id);
		return $id;
	}

	/**
	 * Insert record to table with specified id
	 *
	 * @param Exphistory exphistory
	 *
	 * @return string
	 */
	public function insertWithId( $exphistory) {
		$sql = 'INSERT INTO exphistory (Id, Year, Month, Exp) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($exphistory->getId());
		
		$sqlQuery->setNumber($exphistory->getYear());
		$sqlQuery->setNumber($exphistory->getMonth());
		$sqlQuery->setNumber($exphistory->getExp());

		$id = $this->executeInsert($sqlQuery);
		return $id;
	}

	/**
	 * Update record in table
	 *
	 * @param Exphistory exphistory
	 *
	 * @return int
	 */
	public function update( $exphistory){
		$sql = 'UPDATE exphistory SET Year = ?, Month = ?, Exp = ? WHERE Id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($exphistory->getYear());
		$sqlQuery->setNumber($exphistory->getMonth());
		$sqlQuery->setNumber($exphistory->getExp());

		$sqlQuery->setNumber($exphistory->getId());
		return $this->executeUpdate($sqlQuery);
	}

	/**
	 * Delete all rows
	 *
	 * @return int
	 */
	public function clean() {
		$sql = 'DELETE FROM exphistory';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

  public function queryByYear($value){
    $sql = 'SELECT * FROM exphistory WHERE Year = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->setNumber($value);
    return $this->getList($sqlQuery);
  }

  public function queryByMonth($value){
    $sql = 'SELECT * FROM exphistory WHERE Month = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->setNumber($value);
    return $this->getList($sqlQuery);
  }

  public function queryByExp($value){
    $sql = 'SELECT * FROM exphistory WHERE Exp = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->setNumber($value);
    return $this->getList($sqlQuery);
  }


  public function deleteByYear($value){
    $sql = 'DELETE FROM exphistory WHERE Year = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->setNumber($value);
    return $this->executeUpdate($sqlQuery);
  }

  public function deleteByMonth($value){
    $sql = 'DELETE FROM exphistory WHERE Month = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->setNumber($value);
    return $this->executeUpdate($sqlQuery);
  }

  public function deleteByExp($value){
    $sql = 'DELETE FROM exphistory WHERE Exp = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->setNumber($value);
    return $this->executeUpdate($sqlQuery);
  }



	/**
	 * Read row
	 *
	 * @return Exphistory
	 */
	protected function readRow($row) {
		$exphistory = new Exphistory();
		
		$exphistory->setId($row['Id']);
		$exphistory->setYear($row['Year']);
		$exphistory->setMonth($row['Month']);
		$exphistory->setExp($row['Exp']);

		return $exphistory;
	}

	/**
	 * @param $sqlQuery
	 *
	 * @return Exphistory[]
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
	 * @return Exphistory
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
