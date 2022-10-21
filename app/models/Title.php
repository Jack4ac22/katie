<?php
class Title
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function get_titles($search = null, $order = null)
  {
    $this->db->query("SELECT * FROM job_titles AS JT
    WHERE JT.title LIKE :search_title
    OR JT.description LIKE :search_description ;");
    $this->db->bind(':search_title', '%' . $search . '%');
    $this->db->bind(':search_description', '%' . $search . '%');

    $results = $this->db->resultSet();
    foreach ($results as $t) {
      $this->db->query("SELECT COUNT(*) AS number FROM job_titles AS JT
      INNER JOIN people_titles AS PT ON JT.id = PT.t_id
      INNER JOIN people AS P ON P.id = PT.p_id
      WHERE JT.id = :id");
      $this->db->bind(':id', $t->id);
      $count = $this->db->single();
      $t->count = $count->number;
    }
    return $results;
  }

  public function add_title($data)
  {
    $this->db->query('INSERT INTO job_titles (title, description) VALUES(:title, :description)');
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

  public function update_title($data)
  {
    $this->db->query('UPDATE job_titles SET title = :title, description = :description WHERE id = :id');

    $this->db->bind(':id', $data['id']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':description', $data['description']);


    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function get_title_by_id($id = 0)
  {
    $this->db->query('SELECT * FROM job_titles WHERE id = :id');
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    $this->db->query("SELECT PT.*, P.first_name, P.last_name, P.sex, JT.title FROM people_titles AS PT 
    INNER JOIN people AS P ON P.id = PT.p_id
    INNER JOIN job_titles AS JT ON JT.id = PT.t_id
    WHERE PT.t_id = :t_id");
    $this->db->bind(':t_id', $id);
    $people = $this->db->resultSet();
    $row = ['title' => $row, 'people' => $people];
    return $row;
  }

  public function delete_title($id)
  {
    $this->db->query('DELETE FROM job_titles WHERE id = :id');
    // Bind values
    $this->db->bind(':id', $id);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function get_last_title()
  {
    $this->db->query("SELECT * FROM job_titles  
    ORDER BY job_titles.id  DESC
    LIMIT 1");
    $title = $this->db->single();
    return $title;
  }
}
