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
     * get_peplan_by_id()
     * @param $id
     * @return array or false
     */
    public function get_peplan_by_id($id)
    {
        $this->db->query("SELECT PL.id, PL.levle, PL.comment, PL.lan_id, PL.p_id, P.first_name, P.last_name, P.email, L.title, L.description, L.extra
        FROM people_languages AS PL
        INNER JOIN people AS P
        ON PL.p_id = P.id
        INNER JOIN languages AS L
        ON L.id = PL.lan_id
        WHERE PL.id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    /**
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
     * update_peplan($data)
     * @param $id
     * @return bool
     */
    public function update_peplan($data)
    {
        $this->db->query("UPDATE people_languages SET p_id = :p_id, lan_id = :lan_id, levle = :levle, comment = :comment WHERE id = :id");
        $this->db->bind('p_id', $data['p_id']);
        $this->db->bind('lan_id', $data['lan_id']);
        $this->db->bind('levle', $data['levle']);
        $this->db->bind('comment', $data['comment']);
        $this->db->bind('id', $data['id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_peplan($id)
    {
        $this->db->query('DELETE FROM people_languages WHERE id=:id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
