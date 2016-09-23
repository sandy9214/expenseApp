<?php

/**
 * Class that operate on table 'budget'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-09-04 12:47
 */
class BudgetMySqlDAO implements BudgetDAO {

	/**
	 * Get Domain object by primary key
	 *
	 * @param String $id - primary key
	 * @return Budget
	 */
	public function load($id) {
		$sql = 'SELECT * FROM budget WHERE budgetId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 *
	 * @return Budget[]
	 */
	public function queryAll() {
		$sql = 'SELECT * FROM budget';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}

	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn - column name
	 *
	 * @return Budget[]
	 */
	public function queryAllOrderBy($orderColumn) {
		$sql = 'SELECT * FROM budget ORDER BY ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($orderColumn);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get current month's data
	 *
	 * @return Budget[]
	 */
	public function queryCurrentMonth() {
		$sql = 'SELECT * FROM budget WHERE budgetdate like (SELECT CONCAT(YEAR(CURDATE()),'."'-0'".',MONTH(CURDATE()),'."'-%'".') FROM DUAL)';
		$sqlQuery = new SqlQuery($sql);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Delete record from table
	 *
	 * @param budget - primary key
	 *
	 * @return int
	 */
	public function delete($budgetId){
		$sql = 'DELETE FROM budget WHERE budgetId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($budgetId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
	 * Insert record to table, id is auto-incremented
	 *
	 * @param Budget budget
	 *
	 * @return String
	 */
	public function insert($budget) {
		$sql = 'INSERT INTO budget (budgetdate, EstimatedBudget, RealExpense) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($budget->getBudgetdate());
		$sqlQuery->setNumber($budget->getEstimatedBudget());
		$sqlQuery->setNumber($budget->getRealExpense());

		$id = $this->executeInsert($sqlQuery);
		$budget->setBudgetId($id);
		return $id;
	}

	/**
	 * Insert record to table with specified id
	 *
	 * @param Budget budget
	 *
	 * @return string
	 */
	public function insertWithId(Budget $budget) {
		$sql = 'INSERT INTO budget (budgetId, budgetdate, EstimatedBudget, RealExpense) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($budget->getBudgetId());
		
		$sqlQuery->set($budget->getBudgetdate());
		$sqlQuery->setNumber($budget->getEstimatedBudget());
		$sqlQuery->setNumber($budget->getRealExpense());

		$id = $this->executeInsert($sqlQuery);
		return $id;
	}

	/**
	 * Update record in table
	 *
	 * @param Budget budget
	 *
	 * @return int
	 */
	public function update( $budget){
		$sql = 'UPDATE budget SET budgetdate = ?, EstimatedBudget = ?, RealExpense = ? WHERE budgetId = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($budget->getBudgetdate());
		$sqlQuery->setNumber($budget->getEstimatedBudget());
		$sqlQuery->setNumber($budget->getRealExpense());

		$sqlQuery->setNumber($budget->getBudgetId());
		return $this->executeUpdate($sqlQuery);
	}

	/**
	 * Delete all rows
	 *
	 * @return int
	 */
	public function clean() {
		$sql = 'DELETE FROM budget';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

  public function queryByBudgetdate($value){
    $sql = 'SELECT * FROM budget WHERE budgetdate = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->set($value);
    return $this->getList($sqlQuery);
  }

  public function queryByEstimatedBudget($value){
    $sql = 'SELECT * FROM budget WHERE EstimatedBudget = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->setNumber($value);
    return $this->getList($sqlQuery);
  }

  public function queryByRealExpense($value){
    $sql = 'SELECT * FROM budget WHERE RealExpense = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->setNumber($value);
    return $this->getList($sqlQuery);
  }


  public function deleteByBudgetdate($value){
    $sql = 'DELETE FROM budget WHERE budgetdate = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->set($value);
    return $this->executeUpdate($sqlQuery);
  }

  public function deleteByEstimatedBudget($value){
    $sql = 'DELETE FROM budget WHERE EstimatedBudget = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->setNumber($value);
    return $this->executeUpdate($sqlQuery);
  }

  public function deleteByRealExpense($value){
    $sql = 'DELETE FROM budget WHERE RealExpense = ?';
    $sqlQuery = new SqlQuery($sql);
    $sqlQuery->setNumber($value);
    return $this->executeUpdate($sqlQuery);
  }



	/**
	 * Read row
	 *
	 * @return Budget
	 */
	protected function readRow($row) {
		$budget = new Budget();
		
		$budget->setBudgetId($row['budgetId']);
		$budget->setBudgetdate($row['budgetdate']);
		$budget->setEstimatedBudget($row['EstimatedBudget']);
		$budget->setRealExpense($row['RealExpense']);

		return $budget;
	}

	/**
	 * @param $sqlQuery
	 *
	 * @return Budget[]
	 */
	protected function getList($sqlQuery) {
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		$i =0;
		foreach ($tab as $temp){
			$ret[$i]  = $this->readRow($temp);
			$i++;
		}
	}

	/**
	 * Get row
	 *
	 * @param $sqlQuery
	 * @return Budget
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
