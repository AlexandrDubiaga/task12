<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>task4</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body>
    <?php
    echo $goodConnectToPostgreSql."<br>";
    echo $goodConnectToMySql."<br>";
    echo $errorPgInsert;
    echo $goodPgInsert;
    echo $errorPgSelect;
    echo $goodPgSelect;
    echo $errorPgUpdate;
    echo $goodPgUpdate;
    echo $errorPgDelete;
    echo $goodPgDelete;
    echo $errorMySqlInsert;
    echo $goodMySqlInsert;
    echo $errorMySqlSelect;
    echo $goodMySqlSelect;
    echo $errorMySqlUpdate;
    echo $goodMySqlUpdate;
    echo $errorMySqlDelete;
    echo $goodMySqlDelete;
    ?>
    <table class="table table-bordered">
        <tr>
            <td class="active"><a href="?InsertPosetges=insPostgres">Insert PostresSQL</a></td>
            <td class="active"><a href="?SelectPosetges=selPostgres">Select PostresSQL</a></td>
            <td class="active"><a href="?UpdatePosetges=updPostgres">Update PostresSQL</a></td>
            <td class="active"><a href="?DeletePosetges=delPostgres">Delete PostresSQL</a></td>
            <td class="success"><a href="?InsertMySql=insMySql">Insert MySql</a></td>
            <td class="success"><a href="?SelectMySql=selMySql">Select MySql</a></td>
            <td class="success"><a href="?UpdateMySql=uptMySql">Update MySql</a></td>
            <td class="success"><a href="?DeleteMySql=delMySql">Delete MySql</a></td>
        </tr>
        <tr>
            <td colspan="4" class="active">Postgres</td>
            <td colspan="4" class="success">MySql</td>
        </tr>
        <tr>
            <td colspan="4" class="active">
                <?php
                if(isset($_GET['SelectPosetges']))
                {
                    foreach ($postGres as $item)
                    {
                        echo $item['key']." ".$item['data']."<br>";
                    }
                }
                ?>
            </td>
            <td colspan="4"  class="success">
                <?php
                if(isset($_GET['SelectMySql']))
                {
                    foreach ($mysql as $item)
                    {
                        echo $item['key'] . " " . $item['data'] . "<br>";
                    }
                }
                ?>
            </td>
        </tr>
    </table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>