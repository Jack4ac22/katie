<?php
class Person
{
    private $db;

    public function __construct()
    {
        //redirect to home if not logged in
        if (!islogged()) {
            redirect_to('');
        }
        $this->db = new Database;
    }


    /**
     * getPersons()
     * @return ALL people in DB
     */
    public function getPersons()
    {
        $this->db->query('SELECT *  FROM people ORDER BY people.created_at DESC');

        $results = $this->db->resultSet();

        return $results;
    }

    /**
     * getPersonByEmail()
     * @return bool
     * @param $email
     */
    public function getPersonByEmail($email)
    {
        $this->db->query('SELECT *  FROM people WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * add_person()
     * @param array
     * @return bool
     */

    public function add_person($data)
    {
        $this->db->query("INSERT INTO people (first_name, last_name, sex, email, added_by) VALUES (:first_name, :last_name, :sex, :email, :added_by)");
        $this->db->bind('first_name', $data['first_name']);
        $this->db->bind('last_name', $data['last_name']);
        $this->db->bind('sex', $data['sex']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('added_by', $data['added_by']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * get_the_last()
     * @return id
     */

    public function get_the_last($email)
    {
        $this->db->query('SELECT id  FROM people WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        return $row;
    }

    /**
     * get_person_by_id($id)
     * @param $id
     * @return onject - person - 
     */

    public function get_person_by_id($id)
    {
        $this->db->query('SELECT * FROM people WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        $this->db->query("SELECT * FROM phone_numbers WHERE p_id = :id");
        $this->db->bind(':id', $id);
        $phones = $this->db->resultSet();
        $person = [
            'person' => $row,
            'phones' => $phones
        ];
        return $person;
    }
}
