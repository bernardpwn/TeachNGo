<?php
require "DataBaseConfig.php";

class DataBase
{
    public $connect;
    public $data;
    private $sql;
    protected $servername;
    protected $username;
    protected $password;
    protected $databasename;

    public function __construct()
    {
        $this->connect = null;
        $this->data = null;
        $this->sql = null;
        $dbc = new DataBaseConfig();
        $this->servername = $dbc->servername;
        $this->username = $dbc->username;
        $this->password = $dbc->password;
        $this->databasename = $dbc->databasename;
    }

    function dbConnect()
    {
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename);
        return $this->connect;
    }

    function prepareData($data)
    {
        return mysqli_real_escape_string($this->connect, stripslashes(htmlspecialchars($data)));
    }
    #Function untuk Log In
    function logIn($table, $email, $password)
    {
        $email = $this->prepareData($email);
        $password = $this->prepareData($password);
        $this->sql = "select * from " . $table . " where User_Email = '" . $email . "'";
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) != 0) {
            $dbemail = $row['User_Email'];
            $dbpassword = $row['User_Pass'];
            if ($dbemail == $email && password_verify($password, $dbpassword)) {
                $login = true;
            } else $login = false;
        } else $login = false;
        return $login;
    }
    #Function Untuk Sign Up
    function signUp($table, $name, $email, $phone, $password, $dob, $gender)
    {
        $name = $this->prepareData($name);
        $email = $this->prepareData($email);
        $phone = $this->prepareData($phone);
        $dob = $this->prepareData($dob);
        $gender = $this->prepareData($gender);
        $passw = $this->prepareData($password);
        $password = password_hash($passw, PASSWORD_BCRYPT);
        $this->sql =
        "INSERT INTO $table (User_Name, User_Email, User_Phone, User_Pass, User_DOB, User_Gender) VALUES 
        ('$name','$email','$phone','$password','$dob','$gender')";
        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }

    #Function untuk Delete
    function delete($table, $email, $password)
    {
        $email = $this->prepareData($email);
        $password = $this->prepareData($password);
        $this->sql = "delete from " . $table . " where User_Email = '" . $email . "'";
        $result = mysqli_query($this->connect, $this->sql);
        if($result = 1){
            return true;
        }
        return false;
    }

}

?>
