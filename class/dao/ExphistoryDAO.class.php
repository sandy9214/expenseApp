<?php

/**
 * Interface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-09-23 13:41
 */
interface ExphistoryDAO {

	/**
	 * Get Domain object by primary key
	 *
	 * @param String $id primary key
	 * @return Exphistory
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
	 * @param exphistory - primary key
	 */
	public function delete($Id);
	
	/**
	 * Insert record to table
	 *
	 * @param Exphistory exphistory
	 */
	public function insert($exphistory);
	
	/**
	 * Update record in table
	 *
	 * @param Exphistory exphistory
	 */
	public function update($exphistory);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByYear($value);

	public function queryByMonth($value);

	public function queryByExp($value);


	public function deleteByYear($value);

	public function deleteByMonth($value);

	public function deleteByExp($value);


}
?>