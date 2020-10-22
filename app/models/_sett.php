<?php
class _sett extends Model
{
    public function getSetting()
    {
        return $this->db->selectSingle('SELECT * FROM setting WHERE id = :id', array(':id' => 1));
    }
    public function updateSetting($sett)
    {
        return $this->db->update('setting', $sett, 'id = ' . $this->db->quote(1));
    }
}
