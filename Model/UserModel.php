<?php
class User
{
    private $id;
    private $name;
    private $email;
    private $username;
    private $password;
    private $token;

    public function __construct($name, $email, $username, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }

    public function save($conn)
    {
        $stmt = $conn->prepare("INSERT INTO users (name, email, username, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $this->name, $this->email, $this->username, $this->password);
        $stmt->execute();
        $this->id = $stmt->insert_id;
        $stmt->close();
    }

    public static function authenticate($email, $password, $conn)
    {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 0) {
            return null;
        }
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            return new User($user['name'], $user['email'], $user['username'], $user['password']);
        } else {
            return null;
        }
    }

    public function setToken($token, $conn)
    {
        $this->token = $token;
        $stmt = $conn->prepare("UPDATE users SET token=? WHERE id=?");
        $stmt->bind_param("si", $this->token, $this->id);
        $stmt->execute();
        $stmt->close();
    }

    public static function getUserFromToken($token, $conn)
    {
        $stmt = $conn->prepare("SELECT * FROM users WHERE token=?");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 0) {
            return null;
        }
        $user = $result->fetch_assoc();
        return new User($user['name'], $user['email'], $user['username'], $user['password'], $user['token'], $user['id']);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getToken()
    {
        return $this->token;
    }
}