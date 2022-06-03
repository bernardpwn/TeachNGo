<?php
# Berisi detail alamat server, username dan password pada database yang digunakan, serta nama database yang digunakan.
class DataBaseConfig
{
    public $servername;
    public $username;
    public $password;
    public $databasename;

    public function __construct()
    {
        $this->servername = '34.101.231.16';
        $this->username = 'root';
        $this->password = 'capstoneproject';
        $this->databasename = 'techngo';

    }
}

?>
