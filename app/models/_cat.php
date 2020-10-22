<?php
class _cat extends Model
{
    public function getAllCat()
    {
        return $this->db->select('SELECT * FROM category');
    }
    public function getCatById($id)
    {
        return $this->db->selectSingle('SELECT * FROM category WHERE id = :id', array(':id' => $id));
    }
    public function addDataCat($category)
    {
        return $this->db->insert('category', $category);
    }
    public function deleteDataCat($id)
    {
        return $this->db->delete('category', 'id = ' . $this->db->quote($id));
    }
    public function numberCategory()
    {
        return $this->db->query('SELECT COUNT(*) as num_rows FROM category')->fetchColumn();
    }
}
