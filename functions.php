<?php
class Functions {
    // Data members or member variables
    private $db;
    private $sql;
    private $result;
    private $fnum;

    // Constructor
    function __construct() {
        require_once('DbConnection.php');
        // Create an object of class DbConnection
        $this->db = new DbConnection();
        // Call the method connect() of class DbConnection
        $this->db->connect();
    }

    // Destructor
    function __destruct() {
        // Call the method close() of class DbConnection
        $this->db->close();
    }

    // Member methods
    public function insert_data($tablename, $fields, $values) {
        // Count fields in Array
        $this->fnum = count($fields);

        // Generate insert statement
        // INSERT INTO tablename(col1, col2, ...) VALUES(val1, val2, ...);
        $this->sql = "INSERT INTO $tablename(";
        for ($i = 0; $i < $this->fnum; $i++) {
            $this->sql .= $fields[$i];
            if ($i < $this->fnum - 1) {
                $this->sql .= ",";
            } else {
                $this->sql .= ") VALUES(";
            }
        }
        for ($i = 0; $i < $this->fnum; $i++) {
            $this->sql .= "'" . $values[$i] . "'";
            if ($i < $this->fnum - 1) {
                $this->sql .= ",";
            } else {
                $this->sql .= ");";
            }
        }

        // Execute insert statement
        $this->result = mysqli_query($this->db->connect(), $this->sql);
        // $this->result = $this->db->connect()->query($this->sql);

        if ($this->result) {
            return true;
        } else {
            return false;
        }
    }
    // public function getAllUsers() {
    //     $row = array();
    //     $this->sql = "SELECT * FROM user";
    //     $result = mysqli_query($this->db->connect(), $this->sql);
    //     while($data = mysqli_fetch_assoc($result)){
    //         $row[ "users"] [] = $data;

    //     }
    //     echo json_encode($row);
    // }


    public function login_user($tablename, $username, $password) {
        $user = mysqli_real_escape_string($this->db->connect(), $username);
        $pwd = mysqli_real_escape_string($this->db->connect(), $password);
        
      
        $stmt = $this->db->connect()->prepare("SELECT * FROM $tablename WHERE UserName = ? AND UserPassword = ?");
        $stmt->bind_param("ss", $user, $pwd);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            return $result->fetch_assoc(); 
        } else {
            return false;
        }
    }
    // public function login_user($tablename, $username, $password) {
    //     $user = mysqli_real_escape_string($this->db->connect(), $username);
    //     $pwd = mysqli_real_escape_string($this->db->connect(), $password);
            
    //     $stmt = $this->db->connect()->prepare("SELECT * FROM $tablename WHERE UserName = ? AND UserPassword = ?");
    //     $stmt->bind_param("ss", $user, $pwd);
    //     $stmt->execute();
    //     $this->result = $stmt->get_result(); // Store the result in the class property
        
    //     if (mysqli_num_rows($this->result) == 1) {
    //         return mysqli_fetch_array($this->result); 
    //     } else {
    //         return false;
    //     }
    // }
    
}
