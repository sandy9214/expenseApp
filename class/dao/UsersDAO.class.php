<?php

/**
 * Interface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-09-14 07:24
 */
interface UsersDAO {

	/**
	 * Get Domain object by primary key
	 *
	 * @param String $id primary key
	 * @return User
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
	 * @param user - primary key
	 */
	public function delete($userId);
	
	/**
	 * Insert record to table
	 *
	 * @param Users user
	 */
	public function insert($user);
	
	/**
	 * Update record in table
	 *
	 * @param Users user
	 */
	public function update($user);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUserName($value);

	public function queryByFirstName($value);

	public function queryByLastName($value);

	public function queryByEmailid($value);

	public function queryByMobile($value);

	public function queryByPassword($value);

	public function queryByDate($value);

	public function queryByIsAdmin($value);


	public function deleteByUserName($value);

	public function deleteByFirstName($value);

	public function deleteByLastName($value);

	public function deleteByEmailid($value);

	public function deleteByMobile($value);

	public function deleteByPassword($value);

	public function deleteByDate($value);

	public function deleteByIsAdmin($value);


}
?>