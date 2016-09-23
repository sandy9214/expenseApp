<?php

/**
 * Interface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-09-23 13:23
 */
interface YearDAO {

	/**
	 * Get Domain object by primary key
	 *
	 * @param String $id primary key
	 * @return Year
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
	 * @param year - primary key
	 */
	public function delete($YId);
	
	/**
	 * Insert record to table
	 *
	 * @param Year year
	 */
	public function insert($year);
	
	/**
	 * Update record in table
	 *
	 * @param Year year
	 */
	public function update($year);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByYear($value);


	public function deleteByYear($value);


}
?>