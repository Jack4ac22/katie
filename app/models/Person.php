<?php
class Person
{
    private $db;

    public function __construct()
    {
        //redirect to home if not logged in
        if (!islogged()) {
            redirect_to('');
        }
        $this->db = new Database;
    }


    /**
     * getPersons()
     * @return ALL people in DB
     */
    public function getPersons($search, $order)
    {
        $this->db->query("SELECT P.*  FROM people AS P
        WHERE P.first_name LIKE :search_f 
        OR P.last_name LIKE :search_l
        OR P.email LIKE :search_e
        ;");

        $this->db->bind(':search_f', '%' . $search . '%');
        $this->db->bind(':search_l', '%' . $search . '%');
        $this->db->bind(':search_e', '%' . $search . '%');
        //$this->db->bind(':order',  "P.$order ASC");

        $results = $this->db->resultSet();

        return $results;
    }

    /**
     * getPersonByEmail()
     * @return bool
     * @param $email
     */
    public function getPersonByEmail($email)
    {
        $this->db->query('SELECT *  FROM people WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * getPersonByEmail_edit()
     * @return bool
     * @param $email
     */
    public function email_update($email)
    {
        $this->db->query('SELECT *  FROM people WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        if ($this->db->rowCount() > 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * add_person()
     * @param array
     * @return bool
     */

    public function add_person($data)
    {
        $this->db->query("INSERT INTO people (first_name, last_name, sex, email, added_by) VALUES (:first_name, :last_name, :sex, :email, :added_by)");
        $this->db->bind('first_name', $data['first_name']);
        $this->db->bind('last_name', $data['last_name']);
        $this->db->bind('sex', $data['sex']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('added_by', $data['added_by']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * get_the_last()
     * @return id
     */

    public function get_the_last($email)
    {
        $this->db->query('SELECT id  FROM people WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        return $row;
    }

    /**
     * get_person_by_id($id)
     * @param $id
     * @return array with two objects - person - 
     */

    public function get_person_by_id($id)
    {
        // personal info
        $this->db->query('SELECT * FROM people WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        //phones
        $this->db->query("SELECT * FROM phone_numbers WHERE p_id = :id");
        $this->db->bind(':id', $id);
        $phones = $this->db->resultSet();

        //languages
        $this->db->query("SELECT Count(PL.p_id) as l_count FROM people_languages AS PL
        WHERE PL.p_id = :id");
        $this->db->bind(':id', $id);
        $l_count = $this->db->resultSet();
        if (isset($l_count[0])) {
            $lan_count = $l_count[0]->l_count;
        } else {
            $lan_count = 0;
        }

        $this->db->query("SELECT L.title, L.description, L.extra, PL.levle, PL.comment, PL.lan_id, PL.id, PL.lan_id FROM people_languages AS PL 
        INNER JOIN languages AS L ON L.id = PL.lan_id
        WHERE PL.p_id = :id");
        $this->db->bind(':id', $id);
        $languages = $this->db->resultSet();

        //images
        $this->db->query("SELECT Count(I.id) as pic_count FROM imgs AS I
        WHERE I.p_id = :id");
        $this->db->bind(':id', $id);
        $pic_count = $this->db->resultSet();
        if (isset($pic_count[0])) {
            $pictures_count = $pic_count[0]->pic_count;
        } else {
            $pictures_count = 0;
        }

        $this->db->query("SELECT I.img_path, I.comment, I.uploaded_at, I.id FROM people AS P 
        INNER JOIN imgs AS I ON P.id = I.p_id
        WHERE P.id = :id ");
        $this->db->bind(':id', $id);
        $images = $this->db->resultSet();

        //comments
        $this->db->query("SELECT Count(C.p_id) as c_count FROM people AS P
        INNER JOIN comments AS C ON P.id = C.p_id
        WHERE P.id = :id
        GROUP BY C.p_id");
        $this->db->bind(':id', $id);
        $c_count = $this->db->resultSet();

        $this->db->query("SELECT C.id, C.value, C.title, C.text, C.created_at, C.edited_at FROM people AS P
        INNER JOIN comments AS C ON P.id = C.p_id
        WHERE P.id = :id
        ORDER BY C.edited_at DESC, C.created_at DESC");
        $this->db->bind(':id', $id);
        $comments = $this->db->resultSet();
        if (isset($c_count[0])) {
            $comments_count = $c_count[0]->c_count;
        } else {
            $comments_count = 0;
        }

        //titles
        $this->db->query("SELECT COUNT(*) AS t_count from people_titles
        WHERE p_id = :id");
        $this->db->bind(':id', $id);
        $t_count = $this->db->resultSet();

        $this->db->query("SELECT PT.*, T.title, T.description AS t_description FROM people_titles AS PT
        INNER JOIN people AS P ON P.id = PT.p_id
        INNER JOIN job_titles AS T ON T.id = PT.t_id
        WHERE PT.p_id = :id");
        $this->db->bind(':id', $id);
        $titles = $this->db->resultSet();
        if (isset($t_count[0])) {
            $titles_count = $t_count[0]->t_count;
        } else {
            $titles_count = 0;
        }

        //groups
        $this->db->query("SELECT COUNT(*) AS g_count from people_groups
        WHERE p_id = :id");
        $this->db->bind(':id', $id);
        $g_count = $this->db->resultSet();

        $this->db->query("SELECT PG.*, G.title, G.description AS g_description FROM people_groups AS PG
        INNER JOIN people AS P ON P.id = PG.p_id
        INNER JOIN groups AS G ON G.id = PG.group_id
        WHERE PG.p_id = :id");
        $this->db->bind(':id', $id);
        $groups = $this->db->resultSet();
        if (isset($g_count[0])) {
            $groups_count = $g_count[0]->g_count;
        } else {
            $groups_count = 0;
        }

        $person = [
            'person' => $row,
            'phones' => $phones,
            'languages' => $languages,
            'l_count' => $lan_count,
            'comments' => $comments,
            'c_count' => $comments_count,
            'images' => $images,
            'p_count' => $pictures_count,
            'titles' => $titles,
            't_count' =>$titles_count,
            'groups' => $groups,
            'g_count' =>$groups_count

        ];
        return $person;
    }
    /**
     * get_person_by_id($id)
     * @param $id
     * @return array with two objects - person - 
     */

    public function get_person_by_id_edit($id)
    {
        $this->db->query('SELECT * FROM people WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        return $row;
    }

    /**
     * edit_person($data)
     * @param $id
     * $return bool
     */

    public function edit_person($data)
    {
        $this->db->query("UPDATE people SET first_name = :first_name, last_name = :last_name, email= :email, sex= :sex WHERE people.id = :id");
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':sex', $data['sex']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':id', $data['id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }




    public function add_current_img($data)
    {
        $this->db->query("INSERT INTO imgs (p_id, img_path, comment) VALUES (:p_id, :img_path, :comment)");
        $this->db->bind(':p_id', $data['p_id']);
        $this->db->bind(':img_path', $data['img_path']);
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


    /**
     * delete_person($id)
     */
    public function delete_person($id)
    {
        $this->db->query('DELETE FROM people WHERE id = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * with_img()
     * return how many img they have
     */
}
