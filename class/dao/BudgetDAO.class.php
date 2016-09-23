<?php

/**
 * Interface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-09-04 12:47
 */
interface BudgetDAO {

	/**
	 * Get Domain object by primary key
	 *
	 * @param String $id primary key
	 * @return Budget
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @param $orderColumn - column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
	 * Delete record from table
	 * @param budget - primary key
	 */
	public function delete($budgetId);
	
	/**
	 * Insert record to table
	 *
	 * @param Budget budget
	 */
	public function insert($budget);
	
	/**
	 * Update record in table
	 *
	 * @param Budget budget
	 */
	public function update($budget);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByBudgetdate($value);

	public function queryByEstimatedBudget($value);

	public function queryByRealExpense($value);


	public function deleteByBudgetdate($value);

	public function deleteByEstimatedBudget($value);

	public function deleteByRealExpense($value);

	public function queryCurrentMonth();

}
?>