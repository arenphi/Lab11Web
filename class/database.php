<?php
class Database
{
    protected $host;
    protected $user;
    protected $password;
    protected $db_name;
    protected $conn;

    public function __construct()
    {
        $this->getConfig();
        $this->conn = new mysqli($this->host, $this->user, $this->password,
        $this->db_name);
        if ($this->conn->connect_error)
            die("Connection failed: " . $this->conn->connect_error);
    }

    private function getConfig()
    {
        include("config.php");
        $this->host = $config['host'];
        $this->user = $config['username'];
        $this->password = $config['password'];
        $this->db_name = $config['db_name'];
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function get($table, $where = null)
    {
        $where_clause = "";
        if ($where) {
            $where_clause = " WHERE " . $where;
        }
        $sql = "SELECT * FROM " . $table . $where_clause;
        $result = $this->conn->query($sql);
        if ($result && $result->num_rows > 0) {
             return $result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }

    public function insert($table, $data)
    {
        if (is_array($data)) {
            $column = [];
            $value = [];
            foreach ($data as $key => $val) {
                $column[] = $key;
                $value[] = "'".$this->conn->real_escape_string($val)."'";
            }
            $columns = implode(",", $column);
            $values = implode(",", $value);
        }

        $sql = "INSERT INTO " . $table." (".$columns. ") VALUES (". $values
        .")";
        $query_result = $this->conn->query($sql);

        if ($query_result == true) {
            return $query_result;
        } else {
            return false;
        }
    }

    public function update($table, $data, $where)
    {
        $update_value = [];
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                $update_value[] = $key."='".$this->conn->real_escape_string($val)."'";
            }
            $update_value = implode(",", $update_value);
        }
        
        $sql = "UPDATE ".$table. " SET ". $update_value. " WHERE ". $where;
        $query_result = $this->conn->query($sql);
        
        if ($query_result == true) {
            return true;
        } else {
            return false;
        }
    }
}
?>