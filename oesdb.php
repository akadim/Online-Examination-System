

<?php

/*
***************************************************
*** Online Examination System                   ***
***---------------------------------------------***
*** License: GNU General Public License V.3     ***
*** Author: Manjunath Baddi                     ***
*** Title: Database Library Functions           ***
***************************************************
*/

include_once 'dbsettings.php';

$conn=false;

function executeQuery($query)
{
    global $conn,$dbserver,$dbname,$dbpassword,$dbusername;
    global $message;
    if (!($conn = @mysql_connect ($dbserver,$dbusername,$dbpassword)))
         $message="Cannot connect to server";
    if (!@mysql_select_db ($dbname, $conn))
         $message="Cannot select database";

    $result=mysql_query($query,$conn);
    if(!$result)
        $message="Error while executing query.<br/>Mysql Error: ".mysql_error();
    else
        return $result;

}
function closedb()
{
    global $conn;
    if(!$conn)
    mysql_close($conn);
}
?>
