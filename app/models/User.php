<?php
class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * register the user into the database
     * @param array
     * @return bool
     */
    public function registerUser($data)
    {
        $this->db->query('INSERT INTO users (user_name, password, other_pass) VALUES (:user_name, :password, :other_pass)');
        $this->db->bind(':user_name', $data['user_name']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':other_pass', $data['other_pass']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * check if the user_name already taken
     * @param user_name
     * @return bool
     */

    public function findUserByUserName($user_name)
    {
        $this->db->query('SELECT * FROM users WHERE user_name = :user_name');
        $this->db->bind(':user_name', $user_name);
        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
