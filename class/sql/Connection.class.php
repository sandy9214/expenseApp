<?php

/**
 * Object represents connection to database
 *
 * @author: http://phpdao.com
 * @date: 27.11.2007
 */
class Connection
{
    private $connection;

    /**
     * Connection constructor.
     */
    public function Connection()
    {
        $this->connection = ConnectionFactory::getConnection();
    }

    public function close()
    {
        ConnectionFactory::close($this->connection);
    }

    /**
     * @param $sql
     * @return resource
     */
    public function executeQuery($sql)
    {
        return mysql_query($sql, $this->connection);
    }
}

?>