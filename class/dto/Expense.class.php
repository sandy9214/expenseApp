<?php
/**
 * Object represents table 'expense'
 *
 * @author: http://phpdao.com
 * @date: 2016-08-27 19:39
 */
class Expense
{
    private $expenseId;
    private $amount;
    private $expense;
    private $userId;
    private $date;
    private $total;

    public function getExpenseId()
    {
        return $this->expenseId;
    }

    public function setExpenseId($expenseId)
    {
        $this->expenseId = $expenseId;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function getExpense()
    {
        return $this->expense;
    }

    public function setExpense($expense)
    {
        $this->expense = $expense;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }


}
?>