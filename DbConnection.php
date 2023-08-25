
<?php
class DbConnection {
    private $conn;

    public function __construct() {
        require_once('config.php');
        $this->connect();
    }

    public function __destruct() {
        $this->close();
    }

    public function connect() {
        $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
        if ($this->conn) {
            return $this->conn;
        }else {
            die("Could not connect to database.\n" .mysqli_error($this->connect()));
        }
        //return $this->conn;
    }

    public function close(): void {
        mysqli_close($this->connect());
    }
}
?>
