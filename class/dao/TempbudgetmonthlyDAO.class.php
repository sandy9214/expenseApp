<?php

/**
 * Interface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-09-06 12:51
 */
interface TempbudgetmonthlyDAO {

	/**
	 * Get Domain object by primary key
	 *
	 * @param String $id primary key
	 * @return Tempbudgetmonthly
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
	 * @param tempbudgetmonthly - primary key
	 */
	public function delete($id);
	
	/**
	 * Insert record to table
	 *
	 * @param Tempbudgetmonthly tempbudgetmonthly
	 */
	public function insert($tempbudgetmonthly);
	
	/**
	 * Update record in table
	 *
	 * @param Tempbudgetmonthly tempbudgetmonthly
	 */
	public function update($tempbudgetmonthly);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTUserId($value);

	public function queryByTotalExp($value);

	public function queryByRecieveAmt($value);


	public function deleteByTUserId($value);

	public function deleteByTotalExp($value);

	public function deleteByRecieveAmt($value);


}
?>