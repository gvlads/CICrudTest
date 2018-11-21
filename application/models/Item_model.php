<?php

/**
 * Created by PhpStorm.
 * User: geymur-vs
 * Date: 21.11.18
 * Time: 8:58
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Item_model extends CI_Model {

    private $_itemID;
    private $_itemName;
    private $_createdAt;
    private $_updatedAt;

    public function setItemID($itemID) {
        $this->_itemID = $itemID;
    }
    public function setItemName($itemName) {
        $this->_itemName = $itemName;
    }
    public function setCreatedAt($createdAt) {
        $this->_createdAt = $createdAt;
    }
    public function setUpdatedAt($updatedAt) {
        $this->_updatedAt = $updatedAt;
    }

    // get Items
    public function getItemList() {
        $this->db->select(array('i.id as item_id', 'i.name as item_name', 'i.created_at', 'i.updated_at'));
        $this->db->from('items i');
        $query = $this->db->get();
        return $query->result_array();
    }

    // create new Item
    public function insertItem() {
        $data = array(
            'name' => $this->_itemName,
            'created_at' => $this->_createdAt
        );
        $this->db->insert('items', $data);
        return $this->db->insert_id();
    }

    // update Item
    public function updateItem() {
        $data = array(
            'name' => $this->_itemName,
            'updated_at' => $this->_updatedAt
        );
        $this->db->where('id', $this->_itemID);
        $this->db->update('items', $data);
    }

    // for display Item
    public function getItemByID($id) {
        $this->db->select(array('i.id as item_id', 'i.name as item_name', 'i.created_at', 'i.updated_at'));
        $this->db->from('items i');
        $this->db->where('i.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    // delete Item
    public function deleteItem() {
        $this->db->where('id', $this->_itemID);
        $this->db->delete('items');
    }

}
?>