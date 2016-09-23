<?php

/**
 * Database transaction
 *
 * @author: http://phpdao.com
 * @date: 27.11.2007
 */
class Transaction
{
    /**
     * @var
     */
    private static $transactions;

    /**
     * @var Connection
     */
    private $connection;

    /**
     * Transaction constructor.
     */
    public function Transaction()
    {
        $this->connection = new Connection();
        if (!Transaction::$transactions) {
            Transaction::$transactions = new ArrayList();
        }
        Transaction::$transactions->add($this);
        $this->connection->executeQuery('BEGIN');
    }

    public static function getCurrentTransaction()
    {
        if (Transaction::$transactions) {
            $tran = Transaction::$transactions->getLast();
            return $tran;
        }
        return;
    }

    public function commit()
    {
        $this->connection->executeQuery('COMMIT');
        $this->connection->close();
        Transaction::$transactions->removeLast();
    }

    public function rollback()
    {
        $this->connection->executeQuery('ROLLBACK');
        $this->connection->close();
        Transaction::$transactions->removeLast();
    }

    /**
     * @return Connection
     */
    public function getConnection()
    {
        return $this->connection;
    }
}

?>