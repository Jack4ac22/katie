<?php
class Group
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function get_groups($search = null, $order = null)
  {
    $this->db->query("SELECT * FROM groups AS G
    WHERE G.title LIKE :search_title
    OR G.description LIKE :search_description ;");
    $this->db->bind(':search_title', '%' . $search . '%');
    $this->db->bind(':search_description', '%' . $search . '%');

    $results = $this->db->resultSet();
    foreach ($results as $g) {
      $this->db->query("SELECT COUNT(*) AS number FROM groups AS G
      INNER JOIN people_groups AS PG ON G.id = PG.group_id
      INNER JOIN people AS P ON P.id = PG.p_id
      WHERE G.id = :id");
      $this->db->bind(':id', $g->id);
      $count = $this->db->single();
      $g->count = $count->number;
    }
    return $results;
  }

  public function add_group($data)
  {
    $this->db->query('INSERT INTO groups (title, description) VALUES(:title, :description)');
    // Bind values
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':description', $data['description']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function update_group($data)
  {
    $this->db->query('UPDATE groups SET title = :title, description = :description WHERE id = :id');

    $this->db->bind(':id', $data['id']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':description', $data['description']);


    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function get_group_by_id($id = 0)
  {
    $this->db->query('SELECT * FROM groups WHERE id = :id');
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    $this->db->query("SELECT PG.*, P.first_name, P.last_name, P.sex, G.title FROM people_groups AS PG
    INNER JOIN people AS P ON P.id = PG.p_id
    INNER JOIN groups AS G ON PG.group_id = G.id
    WHERE PG.group_id = :t_id
    ORDER BY P.last_name");
    $this->db->bind(':t_id', $id);
    $people = $this->db->resultSet();
    $row = ['title' => $row, 'people' => $people];
    return $row;
  }

  public function delete_group($id)
  {
    $this->db->query('DELETE FROM groups WHERE id = :id');
    // Bind values
    $this->db->bind(':id', $id);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function get_last_group()
  {
    $this->db->query("SELECT * FROM groups  
    ORDER BY groups.id  DESC
    LIMIT 1");
    $title = $this->db->single();
    return $title;
  }
}
