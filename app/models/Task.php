<?php
class Task

{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * @return all the tasks, no matter who is the person
     */

    public function get_all_tasks($search)
    {
        $this->db->query("SELECT C.*, P.first_name, P.last_name, P.sex, P.img FROM tasks AS C 
        INNER JOIN people AS P on P.id = C.p_id
        WHERE C.status = 'show'
        ORDER BY C.created_at, C.edited_at");
        $tasks = $this->db->resultSet();
        return $tasks;
    }

    public function add_task($data)
    {
        $this->db->query("INSERT INTO tasks (p_id, status, title, text, d_date) VALUES (:p_id , :status , :title , :text, :d_date );");
        $this->db->bind(':p_id', $data['p_id']);
        $this->db->bind(':status', 'show');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':text', $data['text']);
        $this->db->bind(':d_date', $data['d_date']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * get_task_by_id()
     * @param $id
     * @return array or false
     */
    public function get_task_by_id($id)
    {
        $this->db->query("SELECT C.*, P.first_name, P.last_name, P.email, P.sex
        FROM tasks AS C
        INNER JOIN people AS P
        ON C.p_id = P.id
        WHERE C.id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    /**
     * update_task($$data)
     * @param $id
     * @return bool
     */
    public function update_task($data)
    {
        $this->db->query('UPDATE tasks SET title = :title, text = :text, p_id = :p_id, d_date = :d_date WHERE id = :id');
        // Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':text', $data['text']);
        $this->db->bind(':p_id', $data['p_id']);
        $this->db->bind(':d_date', $data['d_date']);
        $this->db->bind(':id', $data['id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_task($id)
    {
        $this->db->query('DELETE FROM tasks WHERE id=:id');

        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function hide_task($id)
    {
        $this->db->query("UPDATE tasks SET status = 'completed' WHERE id = :id");

        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // TODO: show all tasks including the finished
}
