<?php
class Comment
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * @return all the comments, no matter who is the person
     */

    public function get_all_comments($search)
    {
        $this->db->query("SELECT C.*, P.first_name, P.last_name, P.sex, P.img FROM comments AS C 
    INNER JOIN people AS P on P.id = C.p_id
    WHERE C.title LIKE '%$search%'
    OR C.text LIKE '%$search%'
    ORDER BY C.created_at, C.edited_at");
        $comments = $this->db->resultSet();
        return $comments;
    }

    public function add_comment($data)
    {
        $this->db->query("INSERT INTO comments (p_id, value, title, text) VALUES (:p_id , :value , :title , :text );");
        $this->db->bind(':p_id', $data['p_id']);
        $this->db->bind(':value', $data['value']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':text', $data['text']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * get_comment_by_id()
     * @param $id
     * @return array or false
     */
    public function get_comment_by_id($id)
    {
        $this->db->query("SELECT C.*, P.first_name, P.last_name, P.email, P.sex
        FROM comments AS C
        INNER JOIN people AS P
        ON C.p_id = P.id
        WHERE C.id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    /**
     * update_comment($$data)
     * @param $id
     * @return bool
     */
    public function update_comment($data)
    {
        $this->db->query('UPDATE comments SET title = :title, text = :text, p_id = :p_id, value = :value WHERE id = :id');
        // Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':text', $data['text']);
        $this->db->bind(':p_id', $data['p_id']);
        $this->db->bind(':value', $data['value']);
        $this->db->bind(':id', $data['id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_comment($id)
    {
        $this->db->query('DELETE FROM comments WHERE id=:id');

        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
