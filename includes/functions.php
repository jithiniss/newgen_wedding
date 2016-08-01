<?php

class Users {

        public $table_name = 'user_details';

        function __construct() {
                //database configuration
                $dbServer = 'localhost'; //Define database server host
                $dbUsername = 'isshosti_newgen'; //Define database username
                $dbPassword = 'z&KxNJy%-rxq'; //Define database password
                $dbName = 'isshosti_newgen'; //Define database name
                //connect databse
                $con = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);
                if(mysqli_connect_errno()) {
                        die("Failed to connect with MySQL: " . mysqli_connect_error());
                } else {
                        $this->connect = $con;
                }
        }

        function checkUser($oauth_provider, $oauth_uid, $fname, $lname, $email, $gender) {
if($gender=='female'){
$gender=2;
}else{
$gender=1;
}
                $prev_query = mysqli_query($this->connect, "SELECT * FROM " . $this->table_name . " WHERE oauth_provider = '" . $oauth_provider . "' AND oauth_uid = '" . $oauth_uid . "'") or die(mysql_error($this->connect));
                if(mysqli_num_rows($prev_query) > 0) {
                        $update = mysqli_query($this->connect, "UPDATE $this->table_name SET oauth_provider = '" . $oauth_provider . "', oauth_uid = '" . $oauth_uid . "', first_name = '" . $fname . "', last_name= '" . $lname . "', email = '" . $email . "', gender = '" . $gender . "',  dou= '" . date("Y-m-d H:i:s") . "' WHERE oauth_provider = '" . $oauth_provider . "' AND oauth_uid = '" . $oauth_uid . "'");
                } else {
                        $insert = mysqli_query($this->connect, "INSERT INTO $this->table_name SET oauth_provider = '" . $oauth_provider . "', oauth_uid = '" . $oauth_uid . "', first_name = '" . $fname . "', last_name= '" . $lname . "', email = '" . $email . "', gender = '" . $gender . "',  doc= '" . date("Y-m-d H:i:s") . "', dou= '" . date("Y-m-d H:i:s") . "'");
                }

                $query = mysqli_query($this->connect, "SELECT * FROM $this->table_name WHERE oauth_provider = '" . $oauth_provider . "' AND oauth_uid = '" . $oauth_uid . "'");
                $result = mysqli_fetch_assoc($query);
                return $result;
        }

}

?>