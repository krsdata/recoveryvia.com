<?php
function getDataByJson()
{
   $data = array();
    if(isset($_REQUEST['data']))
        {
    $data = json_decode($_REQUEST['data']);
    return $data;
}
}
/* used to insert records in DB */
function insertQuery($table, $arr) {

    $sql = "insert into $table SET ";
    $c = 0;
    foreach ($arr as $key => $val) {
        if ($c == 0) {

            $sql .= "$key='" . htmlentities($val, ENT_QUOTES) . "'";
        } else {
            $sql .= ", $key='" . htmlentities($val, ENT_QUOTES) . "'";
        }
        $c++;
    }

    @mysql_query($sql) or die(mysql_error());
    ;
    return mysql_insert_id();
}
/* used to update records in DB */
function updateQuery($table, $arr, $condition) {
    
    $sql = "update $table SET ";
   
    
    $c = 0;
    foreach ($arr as $key => $val) {
        if ($c == 0) {
            $sql .= "$key='" . htmlentities($val, ENT_QUOTES) . "'";
        } else {
            $sql .= ", $key='" . htmlentities($val, ENT_QUOTES) . "'";
        }
        $c++;
    }
    $sql.=$condition;
    $result = mysql_query($sql) or die(mysql_error());
    return $result;
}

function getdataTable($sql) {

// Array ( [email] => krishna [password] => krishna ) 

    $result = mysql_query($sql) or die(mysql_error());
    return $result;
}






function getDataRowById($table, $id) {
//	Array ( [email] => krishna [password] => krishna ) 

    $sql = "select * from $table where id='$id'";

    $result = mysql_query($sql) or die(mysql_error());
   // $rs = mysql_num_rows($result);
    $rs= mysql_fetch_assoc($result);
    return $rs;
}

function getDataRowByUserId($table, $id) {
//	Array ( [email] => krishna [password] => krishna ) 

    $sql = "select * from $table where user_id='$id'";

    $result = mysql_query($sql) or die(mysql_error());
    $rs = mysql_num_rows($result);
    return $rs;
}

function getDataRowById2($table, $id, $field_name) {
//	Array ( [email] => krishna [password] => krishna ) 

    $sql = "select * from $table where $field_name='$id'";

    $result = mysql_query($sql) or die(mysql_error());
    $rs = mysql_fetch_object($result);
    return $rs;
}

function getDataRowById3($table, $id, $fid, $field1_name, $field2_name) {
//	Array ( [email] => krishna [password] => krishna ) 

    $sql = "select * from $table where $field1_name='$id'and $field2_name='$fid'";

    $result = mysql_query($sql) or die(mysql_error());
    $rs = mysql_fetch_object($result);
    return $sql;
}

/* user deletion  code */

function deleteDataRowByUserId($table, $field_name, $id) {
    $sql = "delete from $table where $field_name='$id'";

    $result = mysql_query($sql) or die(mysql_error());
    echo $result;
}

/* user status change code */

function userStatus($uid, $status, $table) {

    if ($status == 1) {
        $sql = "update $table set status='2' where id='$uid'";
    } else {
        $sql = "update $table set status='1' where id='$uid'";
    }
    $result = mysql_query($sql) or die(mysql_error());
    echo $result;
}
function adminLogin($data)
{
   $username= mysql_real_escape_string($data['username']);
   
   $sql=  mysql_query("select count(*) as result from admin where username='".$username."' and  password='".$data['password']."'");
   $row =  mysql_fetch_array($sql);
   return $row['result'];
 }
 
 function  searchByAll($search)
 {
    $sql=mysql_query("select * from sign_up where  first_name like %$search%");
	
 }
?>