<?php
class Image
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function add_current_img($data)
    {
        $this->db->query("INSERT INTO imgs (p_id, img_path, comment) VALUES (:p_id, :img_path, :comment)");
        $this->db->bind(':p_id', $data['p_id']);
        $this->db->bind(':img_path', $data['img_name']);
        $this->db->bind(':comment', $data['comment']);
        if ($this->db->execute()) {
            $this->db->query("UPDATE people SET img=:img WHERE people.id = :p_id");
            $this->db->bind(':img', $data['img_name']);
            $this->db->bind(':p_id', $data['p_id']);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }


    public function get_all()
    {
        $this->db->query('SELECT I.*, P.first_name, P.last_name, P.sex, P.img
        FROM imgs AS I 
        INNER JOIN people AS P ON I.p_id = P.id
        ORDER BY I.uploaded_at DESC');
        if ($this->db->execute()) {
            $images = $this->db->resultSet();
            return $images;
        } else {
            return false;
        }
    }

    public function get_image_by_id($id)
    {
        $this->db->query("SELECT imgs.*, people.first_name, people.last_name FROM imgs
        INNER JOIN people ON imgs.p_id = people.id
        WHERE imgs.id= :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function update_image($data)
    {
        $this->db->query("UPDATE imgs SET p_id = :p_id, comment = :comment WHERE id= :id");
        $this->db->bind(':p_id', $data['p_id']);
        $this->db->bind(':comment', $data['comment']);
        $this->db->bind(':id', $data['id']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_image($id)
    {
        $img = $this->get_image_by_id($id);
        $file = PUBLICROOT .  '/imgs/' . $img->img_path;
        $this->db->query('DELETE FROM imgs WHERE id=:id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            if (unlink($file)) {
                $this->db->query("SELECT * FROM people WHERE people.id = :id");
                $this->db->bind(':id', $img->p_id);
                $person = $this->db->single();
                if ($person->img == $img->img_path) {
                    $this->db->query("UPDATE people SET img = null WHERE people.id = :id;");
                    $this->db->bind(':id', $img->p_id);
                    if ($this->db->execute()) {
                        return true;
                    }
                }
                return true;
            }
        } else {
            return false;
        }
    }

    public function set_profile($p_id, $img_path)
    {
        $this->db->query("UPDATE people SET img = :img_path WHERE people.id= :p_id");
        $this->db->bind('img_path', $img_path);
        $this->db->bind('p_id', $p_id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


}
