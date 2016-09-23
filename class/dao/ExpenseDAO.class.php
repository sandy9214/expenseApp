<?php

/**
 * Interface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-08-27 19:39
 */
interface ExpenseDAO
{

    public function TotalExpense();
    public function TotalExpenseById($value);
    public function pagination($offset);
    public function expenseByMonth();
    public function queryByUserIdMonth($userid);
    /**
     * Get Domain object by primary key
     *
     * @param String $id primary key
     * @return Expense
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
     * @param expense - primary key
     */
    public function delete($ExpenseId);

    /**
     * Insert record to table
     *
     * @param Expense expense
     */
    public function insert($expense);

    /**
     * Update record in table
     *
     * @param Expense expense
     */
    public function update($expense);

    /**
     * Delete all rows
     */
    public function clean();

    public function queryByAmount($value);

    public function queryByExpense($value);

    public function queryByUserId($value);

    public function queryByDate($value);


    public function deleteByAmount($value);

    public function deleteByExpense($value);

    public function deleteByUserId($value);

    public function deleteByDate($value);


}
?>