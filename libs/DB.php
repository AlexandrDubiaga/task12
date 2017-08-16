<?php
class DB extends SQL
{
    protected $connect;
    public function getMysqlConnect()
    {
        try
        {
            $mysql = new PDO(MYSQL_CONNECT, USER, PASSWORD);
            if(!$mysql)
            {
                throw new Exception('Error mysql connect');
            }else
            {
                $this->connect = $mysql;
                return  $this->connect;
            }

        }catch (Exception $mysql)
        {
            echo $mysql->getMessage();
        }
    }
    public function getPostgreSqlConnect()
    {
        try
        {
            $postgreSQL = new PDO(POSTGRESQL_CONNECT);
            if(!$postgreSQL)
            {
                throw new Exception('Error postgerSQL connect');
            }else
            {
                $this->connect = $postgreSQL;
                return  $this->connect;
            }

        }catch (Exception $postgreSQL)
        {
            echo $postgreSQL->getMessage();
        }
    }
    public function exec()
    {
        try{
            $tract = parent::exec();
            if(!isset($tract) || empty($tract) || (strpos($tract, MYSQL_DB) == false && strpos($tract, POSTGRESQL_DB) == false))
            {
                throw new Exception('Something wrong with result string in exec()');
            }else
            {
                if (strpos($tract, MYSQL_DB) !== false)
                {
                    try
                    {
                        if (!$this->connect)
                        {
                            throw new Exception('Cant connect to mysql');
                        }else
                        {
                            try
                            {
                                if (!$tract || empty($tract) || !isset($tract))
                                {
                                    throw new Exception('mysql result string error');
                                } else
                                {
                                    if ($this->selectVal)
                                    {
                                        $query = $this->connect->query($tract, PDO::FETCH_ASSOC);
                                        $arr = array();
                                        foreach ($query as $item)
                                        {
                                            $arr[] = $item;
                                        }
                                        return $arr;
                                    }else if ($this->insertVal)
                                    {
                                        $this->connect->exec($tract);
                                    }else if ($this->updateVal)
                                    {
                                        $this->connect->exec($tract);
                                    }else if ($this->deleteVal)
                                    {
                                        $this->connect->exec($tract);
                                    }
                                }
                            }catch (Exception $parentResultStringExeption)
                            {
                                echo $parentResultStringExeption->getMessage(), "\n";
                            }
                        }
                    }catch (Exception $connectExeption)
                    {
                        echo $connectExeption->getMessage(), "\n";
                    }
                } else if(strpos($tract, POSTGRESQL_DB) !== false)
                {
                    try
                    {
                        if (!$this->connect)
                        {
                            throw new Exception('Cant connect to postgreSQL');
                        } else
                        {
                            $postInsertStr = str_replace('`', ' ', $tract);
                            try {
                                if (!$postInsertStr || empty($postInsertStr) || !isset($postInsertStr))
                                {
                                    throw new Exception('pg_query result error');
                                } else {
                                    if ($this->selectVal) {
                                        $query = $this->connect->query($postInsertStr, PDO::FETCH_ASSOC);
                                        $arr = array();
                                        foreach ($query as $item) {
                                            $arr[] = $item;
                                        }
                                        return $arr;
                                    } else if ($this->insertVal) {
                                        $this->connect->exec($postInsertStr);
                                    } else if ($this->updateVal) {
                                        $this->connect->exec($postInsertStr);
                                    } else if ($this->deleteVal) {
                                        $this->connect->exec($postInsertStr);
                                    }
                                }
                            } catch (Exception $parentResultStringExeption)
                            {
                                echo $parentResultStringExeption->getMessage(), "\n";
                            }
                        }
                    }catch(Exception $connectExeption)
                    {
                        echo $connectExeption->getMessage(), "\n";
                    }
                }
            }
        }catch (Exception $resultStringExeption)
        {
            echo $resultStringExeption->getMessage();
        }
    }
}
?>


