<?php
class Peptit
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
        $this->db->query("SELECT PT.*, PP.first_name, PP.last_name, PP.sex, JT.title, JT.description AS t_description
        FROM people_titles AS PT
        LEFT JOIN people AS PP ON PP.id = PT.p_id
        LEFT JOIN job_titles AS JT ON JT.id = PT.t_id ");
        $pep_tit = $this->db->resultSet();

        $this->db->query("SELECT * FROM job_titles");
        $titles = $this->db->resultSet();
        $res = [
            'titles' => $titles,
            'list' => $pep_tit
        ];

        return $res;
    }

    /**
     * get_peplan_by_id()
     * @param $id
     * @return array or false
     */
    public function get_peptit_by_id($id)
    {
        $this->db->query("SELECT PT.*, P.first_name, P.last_name, P.sex, P.email, P.img, JT.title, JT.description AS t_description
        FROM people_titles AS PT
        INNER JOIN people AS P ON P.id = PT.p_id
        INNER JOIN job_titles AS JT ON JT.id = PT.t_id
        WHERE PT.id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        
        $this->db->query("");
        $this->db->bind(':id', $id);
        $positions = $this->db->resultSet();

        return $row;
    }

    /**
     * @param $data POST
     * @return bool
     */

    public function add_title_to_person($data)
    {
        $this->db->query("INSERT INTO people_titles (id, p_id, t_id, description) VALUES (NULL, :p_id, :t_id,  :description)");
        $this->db->bind(':p_id', $data['p_id']);
        $this->db->bind(':t_id', $data['t_id']);
        $this->db->bind(':description', $data['description']);
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
        $this->db->query("SELECT PT.*, P.first_name, P.last_name, T.title FROM people_titles AS PT
        INNER JOIN people AS P ON P.id = PT.p_id
        INNER JOIN job_titles AS T ON T.id = PT.t_id
        ORDER BY PT.id DESC
        LIMIT 1");
        $row = $this->db->single();
        return $row;
    }

    /**
     * update_peplan($data)
     * @param $id
     * @return bool
     */
    public function update_peptit($data)
    {
        $this->db->query("UPDATE people_titles SET p_id = :p_id, t_id = :t_id,  description = :description WHERE id = :id");
        $this->db->bind('p_id', $data['p_id']);
        $this->db->bind('t_id', $data['t_id']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('id', $data['id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_peptit($id)
    {
        $this->db->query('DELETE FROM people_titles WHERE id=:id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
