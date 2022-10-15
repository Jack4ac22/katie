<?php
class Language
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getlanguages()
  {
    $this->db->query('SELECT * FROM languages');

    $results = $this->db->resultSet();
    foreach ($results as $l) {
      $this->db->query('SELECT COUNT(*) AS number FROM languages AS L
      INNER JOIN people_languages AS PL ON L.id = PL.lan_id
      INNER JOIN people AS P ON P.id = PL.p_id
      WHERE l.id = :id');
      $this->db->bind(':id', $l->id);
      $count = $this->db->single();
      $l->count = $count;
    }
    return $results;
  }

  public function add_language($data)
  {
    $this->db->query('INSERT INTO languages (title, description, extra) VALUES(:title, :description, :extra)');
    // Bind values
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':description', $data['description']);
    $this->db->bind(':extra', $data['extra']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function update_language($data)
  {
    $this->db->query('UPDATE languages SET title = :title, description = :description, extra = :extra WHERE id = :id');
    // Bind values
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':description', $data['description']);
    $this->db->bind(':extra', $data['extra']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function get_language_by_id($id)
  {
    $this->db->query('SELECT * FROM languages WHERE id = :id');
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    $this->db->query("SELECT PL.*, P.first_name, P.last_name, L.title FROM people_languages AS PL 
    INNER JOIN people AS P ON P.id = PL.p_id
    INNER JOIN languages AS L ON L.id = PL.lan_id
    WHERE L.id = :id");
    $this->db->bind(':id', $id);
    $people = $this->db->resultSet();
    $row = ['language' => $row, 'people' => $people];
    return $row;
  }

  public function delete_language($id)
  {
    $this->db->query('DELETE FROM languages WHERE id = :id');
    // Bind values
    $this->db->bind(':id', $id);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function get_last_language()
  {
    $this->db->query("SELECT * FROM languages  
    ORDER BY languages.id  DESC
    LIMIT 1");
    $language = $this->db->single();
    return $language;
  }
}
