<?php

/**
 * Interface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-09-23 13:23
 */
interface MonthDAO {

	/**
	 * Get Domain object by primary key
	 *
	 * @param String $id primary key
	 * @return Month
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
	 * @param month - primary key
	 */
	public function delete($MId);
	
	/**
	 * Insert record to table
	 *
	 * @param Month month
	 */
	public function insert($month);
	
	/**
	 * Update record in table
	 *
	 * @param Month month
	 */
	public function update($month);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByMonth($value);


	public function deleteByMonth($value);


}
?>