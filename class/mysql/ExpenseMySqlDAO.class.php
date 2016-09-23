<?php

/**
 * Class that operate on table 'expense'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-08-27 19:39
 */
class ExpenseMySqlDAO implements ExpenseDAO
{

    /**
     * Get Domain object by primary key
     *
     * @param String $id - primary key
     * @return Expense
     */
    public function load($id)
    {
        $sql = 'SELECT * FROM expense WHERE ExpenseId = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($id);
        return $this->getRow($sqlQuery);
    }

    /**
     * Get row
     *
     * @param $sqlQuery
     * @return Expense
     */
    protected function getRow($sqlQuery)
    {
        $tab = QueryExecutor::execute($sqlQuery);
        if (count($tab) == 0) {
            return null;
        }
        return $this->readRow($tab[0]);
    }

    /**
     * Read row
     *
     * @return Expense
     */
    protected function readRow($row)
    {
        $expense = new Expense();
        if (isset($row['ExpenseId']))
            $expense->setExpenseId($row['ExpenseId']);
        if (isset($row['amount']))
            $expense->setAmount($row['amount']);
        if (isset($row['Expense']))
            $expense->setExpense($row['Expense']);
        if (isset($row['UserId']))
            $expense->setUserId($row['UserId']);
        if (isset($row['Date']))
            $expense->setDate($row['Date']);
        if (isset($row['Total']))
            $expense->setTotal($row['Total']);

        return $expense;
    }

    /**
     * Get all records from table
     *
     * @return Expense[]
     */
    public function queryAll()
    {
        $sql = 'SELECT * FROM expense ORDER BY Date DESC';
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }

    /**
     * @param $sqlQuery
     *
     * @return Expense[]
     */
    protected function getList($sqlQuery)
    {
        $tab = QueryExecutor::execute($sqlQuery);
        $ret = array();
        $i =0;
        foreach ($tab as $temp){
            $ret[$i]  = $this->readRow($temp);
            $i++;
        }
        return $ret;
    }

    /**
     * Get all records from table ordered by field
     *
     * @param $orderColumn - column name
     *
     * @return Expense[]
     */
    public function queryAllOrderBy($orderColumn)
    {
        $sql = 'SELECT * FROM expense ORDER BY ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($orderColumn);
        return $this->getList($sqlQuery);
    }

    /**
     * Delete record from table
     *
     * @param expense - primary key
     *
     * @return int
     */
    public function delete($ExpenseId)
    {
        $sql = 'DELETE FROM expense WHERE ExpenseId = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($ExpenseId);
        return $this->executeUpdate($sqlQuery);
    }

    /**
     * @param $sqlQuery
     * @return int
     */
    protected function executeUpdate($sqlQuery)
    {
        return QueryExecutor::executeUpdate($sqlQuery);
    }

    /**
     * Insert record to table, id is auto-incremented
     *
     * @param Expense expense
     *
     * @return String
     */
    public function insert($expense)
    {
        $sql = 'INSERT INTO expense (amount, Expense, UserId, Date) VALUES (?, ?, ?, ?)';
        $sqlQuery = new SqlQuery($sql);

        $sqlQuery->setNumber($expense->getAmount());
        $sqlQuery->set($expense->getExpense());
        $sqlQuery->setNumber($expense->getUserId());
        $sqlQuery->set($expense->getDate());
        $id = $this->executeInsert($sqlQuery);
        $expense->setExpenseId($id);
        return $id;
    }

    /**
     * @param $sqlQuery
     * @return int
     */
    protected function executeInsert($sqlQuery)
    {
        return QueryExecutor::executeInsert($sqlQuery);
    }

    /**
     * Insert record to table with specified id
     *
     * @param Expense expense
     *
     * @return string
     */
    public function insertWithId(Expense $expense)
    {
        $sql = 'INSERT INTO expense (ExpenseId, amount, Expense, UserId, Date) VALUES (?, ?, ?, ?, ?)';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($expense->getExpenseId());

        $sqlQuery->setNumber($expense->getAmount());
        $sqlQuery->set($expense->getExpense());
        $sqlQuery->setNumber($expense->getUserId());
        $sqlQuery->set($expense->getDate());
        $id = $this->executeInsert($sqlQuery);
        return $id;
    }

    /**
     * Update record in table
     *
     * @param Expense expense
     *
     * @return int
     */
    public function update($expense)
    {
        $sql = 'UPDATE expense SET amount = ?, Expense = ?, UserId = ?, Date = ? WHERE ExpenseId = ?';
        $sqlQuery = new SqlQuery($sql);

        $sqlQuery->setNumber($expense->getAmount());
        $sqlQuery->set($expense->getExpense());
        $sqlQuery->setNumber($expense->getUserId());
        $sqlQuery->set($expense->getDate());
        $sqlQuery->setNumber($expense->getExpenseId());
        return $this->executeUpdate($sqlQuery);
    }

    /**
     * Delete all rows
     *
     * @return int
     */
    public function clean()
    {
        $sql = 'DELETE FROM expense';
        $sqlQuery = new SqlQuery($sql);
        return $this->executeUpdate($sqlQuery);
    }

    public function queryByAmount($value)
    {
        $sql = 'SELECT * FROM expense WHERE amount = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->getList($sqlQuery);
    }

    public function queryByExpense($value)
    {
        $sql = 'SELECT * FROM expense WHERE Expense = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->getList($sqlQuery);
    }

    public function queryByUserId($value)
    {
        $sql = 'SELECT * FROM expense WHERE UserId = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->getList($sqlQuery);
    }

    public function queryByDate($value)
    {
        $sql = 'SELECT * FROM expense WHERE Date = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->getList($sqlQuery);
    }

    public function deleteByAmount($value)
    {
        $sql = 'DELETE FROM expense WHERE amount = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByExpense($value)
    {
        $sql = 'DELETE FROM expense WHERE Expense = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByUserId($value)
    {
        $sql = 'DELETE FROM expense WHERE UserId = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByDate($value)
    {
        $sql = 'DELETE FROM expense WHERE Date = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function pagination($offset)
    {
        // TODO: Implement pagination() method.
        $sql = ' SELECT * FROM  expense  LIMIT 10 OFFSET ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($offset);
        return $this->getList($sqlQuery);
    }
    
    public function expenseByMonth(){
    	$d=strtotime("tomorrow");
    	$sql = 'SELECT * FROM expense WHERE Date  BETWEEN ? AND ? ORDER BY Date DESC';
    	$sqlQuery = new SqlQuery($sql);
    	$sqlQuery->set(date('Y-m-00'));
    	$sqlQuery->set(date("Y-m-d", $d));
    	return $this->getList($sqlQuery);
    }

    public function queryByUserIdMonth($userid){
    	$d=strtotime("tomorrow");
    	$sql = 'SELECT * FROM expense WHERE UserId = ? AND Date  BETWEEN ? AND ? ORDER BY Date DESC;';
    	$sqlQuery = new SqlQuery($sql);
    	$sqlQuery->set($userid);
    	$sqlQuery->set(date('Y-m-00'));
    	$sqlQuery->set(date("Y-m-d", $d));
    	return $this->getList($sqlQuery);
    }
    
    
    
    /**
     * Get Total Expense Amount
     *
     * @return Total
     */
    public function TotalExpense()
    {
    	$d=strtotime("tomorrow");
    	$sql = 'SELECT sum(amount) as Total FROM expense WHERE Date  BETWEEN ? AND ?';
    	$sqlQuery = new SqlQuery($sql);
    	$sqlQuery->set(date('Y-m-00'));
    	$sqlQuery->set(date("Y-m-d", $d));
    	return $this->getRow($sqlQuery);
    }
    
    /**
     * Get Total Contribution Amount by Expense ID
     *
     * @return Total
     */
    public function TotalExpenseById($value)
    {
    	$d=strtotime("tomorrow");
    	$sql = 'SELECT sum(amount) as Total FROM expense WHERE UserId = ? AND Date  BETWEEN ? AND ?';
    	$sqlQuery = new SqlQuery($sql);
    	$sqlQuery->setNumber($value);
    	$sqlQuery->set(date('Y-m-00'));
    	$sqlQuery->set(date("Y-m-d", $d));
    	return $this->getRow($sqlQuery);
    }

    
    /**
     * @param $sqlQuery
     * @return int
     */
    protected function execute($sqlQuery)
    {
        return QueryExecutor::execute($sqlQuery);
    }

    /**
     * @param $sqlQuery
     * @return int
     */
    protected function querySingleResult($sqlQuery)
    {
        return QueryExecutor::queryForString($sqlQuery);
    }
}

?>
