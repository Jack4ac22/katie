<?php
class Prayer
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * @return all the prayers, no matter who is the person
     */

    public function get_all_prayers($search)
    {
        $this->db->query("SELECT C.*, P.first_name, P.last_name, P.sex, P.img FROM prayers AS C 
        INNER JOIN people AS P on P.id = C.p_id
        ORDER BY C.created_at, C.edited_at");
        $prayers = $this->db->resultSet();
        return $prayers;
    }


    /**
     * @return all the prayers for a certain person, no matter what is the status
     */

    public function get_all_prayers_for_id($id)
    {
        $this->db->query("SELECT C.*, P.first_name, P.last_name, P.sex, P.img FROM prayers AS C 
        INNER JOIN people AS P on P.id = C.p_id
        WHERE C.p_id = :id
        ORDER BY C.created_at, C.edited_at");
        $this->db->bind(':id', $id);
        $prayers = $this->db->resultSet();
        return $prayers;
    }

    public function add_prayer($data)
    {
        $this->db->query("INSERT INTO prayers (p_id, status, title, text) VALUES (:p_id , :status , :title , :text );");
        $this->db->bind(':p_id', $data['p_id']);
        $this->db->bind(':status', 'show');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':text', $data['text']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * get_prayer_by_id()
     * @param $id
     * @return array or false
     */
    public function get_prayer_by_id($id)
    {
        $this->db->query("SELECT C.*, P.first_name, P.last_name, P.email, P.sex
        FROM prayers AS C
        INNER JOIN people AS P
        ON C.p_id = P.id
        WHERE C.id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    /**
     * update_prayer($$data)
     * @param $id
     * @return bool
     */
    public function update_prayer($data)
    {
        $this->db->query('UPDATE prayers SET title = :title, text = :text, p_id = :p_id WHERE id = :id');
        // Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':text', $data['text']);
        $this->db->bind(':p_id', $data['p_id']);
        $this->db->bind(':id', $data['id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_prayer($id)
    {
        $this->db->query('DELETE FROM prayers WHERE id=:id');

        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function hide_prayer($id)
    {
        $this->db->query("UPDATE prayers SET status = 'nothing' WHERE id = :id");

        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
