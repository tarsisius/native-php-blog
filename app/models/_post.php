<?php
class _post extends Model
{
    public function numberPost()
    {
        return  $this->db->query('SELECT COUNT(*) as num_rows FROM post')->fetchColumn();
    }
    public function getAllPost()
    {
        return $this->db->select("SELECT * FROM post ORDER BY created_at DESC");
    }
    public function getAllPostHome($limit_start, $limit)
    {
        return $this->db->select("SELECT * FROM post WHERE active = 1 ORDER BY created_at DESC LIMIT $limit_start,$limit");
    }
    public function getPostbyId($id)
    {
        return $this->db->selectSingle('SELECT * FROM post WHERE id = :id', array(':id' => $id));
    }
    public function getPostbySlug($id)
    {
        return $this->db->selectSingle('SELECT * FROM post WHERE slug = :slug', array(':slug' => $id));
    }
    public function createPost($post)
    {
        return $this->db->insert('post', $post);
    }
    public function updateDataPost($post, $id)
    {
        return $this->db->update('post', $post, 'id = ' . $this->db->quote($id));
    }
    public function deleteDataPost($id)
    {
        return $this->db->delete('post', 'id = ' . $this->db->quote($id));
    }
}
