<?php
class Peplan
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * @return all languages with the related data of the user.
     */
    public function get_all_data()
    {

        $this->db->query("SELECT PL.*, PP.first_name, PP.last_name, PP.sex, L.title, L.description, L.extra
        FROM people_languages AS PL
        LEFT JOIN people AS PP ON PP.id = PL.p_id
        LEFT JOIN languages AS L ON L.id = PL.lan_id
        ORDER BY PL.comment");
        $languages = $this->db->resultSet();

        $this->db->query("SELECT * FROM languages");
        $lans = $this->db->resultSet();
        $res = [
            'languages' => $lans,
            'list' => $languages
        ];

        return $res;
    }

    /**
     * add_phone()
     * @param $data POST
     * @return bool
     */

    public function add_lan_to_person($data)
    {
        $this->db->query("INSERT INTO people_languages (id, p_id, lan_id, levle, comment) VALUES (NULL, :p_id, :lan_id, :levle, :comment)");
        $this->db->bind(':p_id', $data['p_id']);
        $this->db->bind(':lan_id', $data['lan_id']);
        $this->db->bind(':levle', $data['levle']);
        $this->db->bind(':comment', $data['comment']);
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
