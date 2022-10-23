<?php
class Pepgroup
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
        $this->db->query("SELECT PG.*, PP.first_name, PP.last_name, PP.sex, G.title, G.description AS g_description
        FROM people_groups AS PG
        LEFT JOIN people AS PP ON PP.id = PG.p_id
        LEFT JOIN groups AS G ON G.id = PG.group_id ");
        $pep_groups = $this->db->resultSet();

        $this->db->query("SELECT * FROM groups");
        $groups = $this->db->resultSet();
        $res = [
            'groups' => $groups,
            'list' => $pep_groups
        ];

        return $res;
    }

    /**
     * get_peplan_by_id()
     * @param $id
     * @return array or false
     */
    public function get_pepgroup_by_id($id)
    {
        $this->db->query("SELECT PG.*, P.first_name, P.last_name, P.sex, P.email, P.img, P.birthday, G.title, G.description AS g_description
        FROM people_groups AS PG
        INNER JOIN people AS P ON P.id = PG.p_id
        INNER JOIN groups AS G ON G.id = PG.group_id
        WHERE PG.id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        $this->db->query("SELECT PG2.*, G.title AS g_title, G.description AS t_description FROM people_groups AS PG
        INNER JOIN people_groups AS PG2 ON PG.p_id = PG2.p_id
        INNER JOIN groups AS G ON G.id = PG2.group_id
        WHERE PG.id = :id");
        $this->db->bind(':id', $id);
        $groups = $this->db->resultSet();
        if ($groups) {
            $row->groups = $groups;
        }
        return $row;
    }

    /**
     * @param $data POST
     * @return bool
     */

    public function add_group_to_person($data)
    {
        $this->db->query("INSERT INTO people_groups (id, p_id, group_id, comment) VALUES (NULL, :p_id, :group_id,  :comment)");
        $this->db->bind(':p_id', $data['p_id']);
        $this->db->bind(':group_id', $data['group_id']);
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
        $this->db->query("SELECT PG.*, P.first_name, P.last_name, G.title FROM people_groups AS PG
        INNER JOIN people AS P ON P.id = PG.p_id
        INNER JOIN groups AS G ON G.id = PG.group_id
        ORDER BY PG.id DESC
        LIMIT 1");
        $row = $this->db->single();
        return $row;
    }

    /**
     * update_peplan($data)
     * @param $id
     * @return bool
     */
    public function update_pepgroup($data)
    {
        $this->db->query("UPDATE people_groups SET p_id = :p_id, group_id = :group_id,  comment = :comment WHERE id = :id");
        $this->db->bind('p_id', $data['p_id']);
        $this->db->bind('group_id', $data['group_id']);
        $this->db->bind('comment', $data['comment']);
        $this->db->bind('id', $data['id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_pepgroup($id)
    {
        $this->db->query('DELETE FROM people_groups WHERE id=:id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
