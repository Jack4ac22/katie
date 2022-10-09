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
}