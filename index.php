<?php
include ('libs/SQL.php');
include('libs/DB.php');

include('libs/Mysql.php');
include('libs/PostgreSql.php');
include ('config.php');

$sql = new SQL();

$postgre = new PostgreSql();
$connPostgreSql = $postgre->getPostgreSqlConnect();
if($connPostgreSql)
{
    $goodConnectToPostgreSql = GOOD_CONNECT_POSTGRESQL;
}

switch(true)
{
    case isset($_GET['InsertPosetges']):
    {
        $value = array('user2','postgreSQL');
        $pgInsert = $postgre->insert('pg_test')->values($value)->exec();
        if($pgInsert)
        {
            $errorPgInsert = ERROR_PG_INSERT;
        }else
        {
            $goodPgInsert = GOOD_PG_INSERT;
        }
        break;
    }
    case isset($_GET['SelectPosetges']):
    {
        $valuesPoStgre = array('key','data');
        $postGres = $postgre->select($valuesPoStgre)->from('pg_test')->where('key','user2')->exec();
        if(!$postGres)
        {
            $errorPgSelect = ERROR_PG_SELECT;
        }else
        {
            $goodPgSelect = GOOD_PG_SELECT;
        }
        break;
    }
    case isset($_GET['UpdatePosetges']):
    {
        $updatePostgre = array('user22','postgreSQL2');
        $updatePg = $postgre->update('pg_test')->set($updatePostgre)->where('key','user2')->exec();
        if($updatePg)
        {
            $errorPgUpdate = ERROR_PG_UPDATE;
        }else
        {
            $goodPgUpdate = GOOD_PG_UPDATE;
        }
        break;
    }
    case isset($_GET['DeletePosetges']): {
        $deletePg = $postgre->delete()->from('pg_test')->where('key', 'user2')->exec();
        if ($deletePg) {
            $errorPgDelete = ERROR_PG_DELETE;
        } else {
            $goodPgDelete = GOOD_PG_DELETE;
        }
        break;
    }
}
$conn = new Mysql();
$connect = $conn->getMysqlConnect();
if($connect)
{
    $goodConnectToMySql = GOOD_CONNECT_MYSQL;
}
switch (true)
{
    case isset($_GET['InsertMySql']):
        $value = array('user2','mysql');
        $mysqlInsert = $conn->insert('MY_TEST')->values($value)->exec();
        if($mysqlInsert)
        {
            $errorMySqlInsert = ERROR_MYSQL_INSERT;
        }else{
            $goodMySqlInsert = GOOD_MYSQL_INSERT;
        }
        break;
    case isset($_GET['SelectMySql']):
        $valuesMysql = array('key','data');
        $mysql = $conn->select($valuesMysql)->from('MY_TEST')->where('key','user2')->exec();
        if(!$mysql)
        {
            $errorMySqlSelect = ERROR_MYSQL_SELECT;
        }else
        {
            $goodMySqlSelect = GOOD_MYSQL_SELECT;
        }
        break;
    case isset($_GET['UpdateMySql']):
        $updateData = array('user22','mysql');
        $update = $conn->update('MY_TEST')->set($updateData)->where('key','user2')->exec();
        if($update)
        {
            $errorMySqlUpdate = ERROR_MYSQL_UPDATE;
        }else
        {
            $goodMySqlUpdate = GOOD_MYSQL_UPDATE;
        }
        break;
    case isset($_GET['DeleteMySql']):
        $delete = $conn->delete()->from('MY_TEST')->where('key','user2')->exec();
        if($delete)
        {
            $errorMySqlDelete = ERROR_MYSQL_DELETE;
        }else
        {
            $goodMySqlDelete = GOOD_MYSQL_DELETE;
        }
        break;
}
include ('template/index.php');
?>
