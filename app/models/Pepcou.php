<?php
class Pepcou
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
        $this->db->query("SELECT PC.*, PP.first_name, PP.last_name, PP.sex, C.* 
        FROM people_nationalities AS PC
        LEFT JOIN people AS PP ON PP.id = PC.p_id
        LEFT JOIN countries AS C ON C.num_code = PC.c_id ");
        $pep_groups = $this->db->resultSet();

        $this->db->query("SELECT * FROM countries");
        $countries = $this->db->resultSet();
        $res = [
            'countries' => $countries,
            'list' => $pep_groups
        ];

        return $res;
    }

    /**
     * get_peplan_by_id()
     * @param $id
     * @return array or false
     */
    public function get_pepcou_by_id($id)
    {
        $this->db->query("SELECT PN.*, P.first_name, P.last_name, P.sex, P.email, P.img, P.birthday, C.en_short_name, C.nationality, C.alpha_3_code
        FROM people_nationalities AS PN
        INNER JOIN people AS P ON P.id = PN.p_id
        INNER JOIN countries AS C ON C.num_code = PN.c_id
        WHERE Pn.id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        $this->db->query("SELECT PN2.*,  C.*
		FROM people_nationalities AS PN
        INNER JOIN people_nationalities AS PN2 ON PN.p_id = PN2.p_id
        INNER JOIN countries AS C ON C.num_code = PN2.c_id
        WHERE PN.id = :id");
        $this->db->bind(':id', $id);
        $nationalities = $this->db->resultSet();
        if ($nationalities) {
            $row->nationalities = $nationalities;
        }
        return $row;
    }

    /**
     * @param $data POST
     * @return bool
     */

    public function add_nationality_to_person($data)
    {
        $this->db->query("INSERT INTO people_nationalities (id, p_id, c_id, comment) VALUES (NULL, :p_id, :c_id,  :comment)");
        $this->db->bind(':p_id', $data['p_id']);
        $this->db->bind(':c_id', $data['c_id']);
        $this->db->bind(':comment', $data['comment']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        };
    }

    /**
     * get_the_last()
     * @return id
     */

    public function get_the_last()
    {
        $this->db->query("SELECT PN.*, P.first_name, P.last_name, C.en_short_name, C.nationality FROM people_nationalities AS PN
        INNER JOIN people AS P ON P.id = PN.p_id
        INNER JOIN countries AS C ON C.num_code = PN.c_id
        ORDER BY PN.id DESC
        LIMIT 1");
        $row = $this->db->single();
        return $row;
    }

    /**
     * update_peplan($data)
     * @param $id
     * @return bool
     */
    public function update_pepcou($data)
    {
        $this->db->query("UPDATE people_nationalities SET p_id = :p_id, c_id = :c_id,  comment = :comment WHERE id = :id");
        $this->db->bind('p_id', $data['p_id']);
        $this->db->bind('c_id', $data['c_id']);
        $this->db->bind('comment', $data['comment']);
        $this->db->bind('id', $data['id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_pepcou($id)
    {
        $this->db->query('DELETE FROM people_nationalities WHERE id=:id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_countries()
    {
        $this->db->query("SELECT * from countries ");
        $countries = $this->db->resultSet();
        if ($countries) {
            return $countries;
        } else {
            return false;
        }
    }
}
