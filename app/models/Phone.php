<?php
class Phone
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * @return all phone numbers with the related data of the user.
     */
    public function get_phones()
    {
        $this->db->query("SELECT PN.*, P.first_name, P.last_name, P.sex, P.email FROM phone_numbers AS PN
        INNER JOIN people AS P
        ON PN.p_id = P.id
        ORDER BY P.last_name");
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * add_phone()
     * @param $data POST
     * @return bool
     */

    public function add_phone($data)
    {
        $this->db->query("INSERT INTO phone_numbers (number, p_id, description) VALUES (:number, :p_id, :description )");
        $this->db->bind(':number', $data['number']);
        $this->db->bind(':p_id', $data['p_id']);
        $this->db->bind(':description', $data['description']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        };
    }

    /**
     * get_phone_by_id()
     * @param $id
     * @return array or false
     */
    public function get_phone_by_id($id)
    {
        $this->db->query("SELECT PN.*, P.first_name, P.last_name, P.email
        FROM phone_numbers AS PN
        INNER JOIN people AS P
        ON PN.p_id = P.id
        WHERE PN.id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
    /**
     * update_phone($$data)
     * @param $id
     * @return bool
     */
    public function update_phone($data)
    {
        $this->db->query('UPDATE phone_numbers SET number = :number, description = :description, p_id = :p_id WHERE id = :id');
        // Bind values
        $this->db->bind(':number', $data['number']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':p_id', $data['p_id']);
        $this->db->bind(':id', $data['id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_phone($id)
    {
        $this->db->query('DELETE FROM phone_numbers WHERE id=:id');

        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}