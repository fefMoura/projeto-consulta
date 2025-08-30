<?php
class Login {
    private $conn;

    public function __construct($dbConn) {
        $this->conn = $dbConn;
    }

    public function login($email, $senha) {
        $sql = "SELECT id, email FROM usuarios WHERE email = ? AND senha = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $email, $senha);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows === 1) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
}
?>