<?php

/*
 * Class return connection to database
 *
 * @author: http://phpdao.com
 * @date: 27.11.2007
 */

class ConnectionFactory
{

    /**
     * @return resource
     * @throws Exception
     */
    static public function getConnection()
    {
        $conn = mysql_connect(ConnectionProperty::getHost(), ConnectionProperty::getUser(), ConnectionProperty::getPassword());
        mysql_select_db(ConnectionProperty::getDatabase());
        if (!$conn) {
            throw new Exception('could not connect to database');
        }
        return $conn;
    }

    /**
     * @param $connection
     */
    static public function close($connection)
    {
        mysql_close($connection);
    }
}

?>