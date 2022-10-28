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
     * login()
     * @param array
     * @return bool
     */

    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM users WHERE user_name = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
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

    public function get_user_data($id)
    {
        $this->db->query("SELECT U.id, U.current_t from users as U WHERE U.id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    public function change_current_timezone($data)
    {
        // var_dump($data);
        // die('stop');
        $this->db->query("UPDATE users SET current_t = :current_t WHERE users.id = :id");
        $this->db->bind(':current_t', $data['t_id']);
        $this->db->bind(':id', $data['user_id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_time_zone($id)
    {
        $this->db->query("SELECT U.id, U.current_t, T.* from users as U 
        INNER JOIN timezones AS T ON T.id = U.current_t
        WHERE U.id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }
}
