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
}
