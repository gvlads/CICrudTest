<?php

/**
 * Created by PhpStorm.
 * User: geymur-vs
 * Date: 21.11.18
 * Time: 8:58
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category_model extends CI_Model {

    private $_categoryID;
    private $_categoryName;
    private $_createdAt;
    private $_updatedAt;

    public function setCategoryID($categoryID) {
        $this->_categoryID = $categoryID;
    }
    public function setCategoryName($categoryName) {
        $this->_categoryName = $categoryName;
    }
    public function setCreatedAt($createdAt) {
        $this->_createdAt = $createdAt;
    }
    public function setUpdatedAt($updatedAt) {
        $this->_updatedAt = $updatedAt;
    }

    // get Categories
    public function getCategoryList() {
        $this->db->select(array('c.id as category_id', 'c.name as category_name', 'c.created_at', 'c.updated_at'));
        $this->db->from('categories c');
        $query = $this->db->get();
        return $query->result_array();
    }

    // create new Category
    public function insertCategory() {
        $data = array(
            'name' => $this->_categoryName,
            'created_at' => $this->_createdAt
        );
        $this->db->insert('categories', $data);
        return $this->db->insert_id();
    }

    // update Category
    public function updateCategory() {
        $data = array(
            'name' => $this->_categoryName,
            'updated_at' => $this->_updatedAt
        );
        $this->db->where('id', $this->_categoryID);
        $this->db->update('categories', $data);
    }

    // for display Category
    public function getCategoryById($id) {
        $this->db->select(array('c.id as category_id', 'c.name as category_name', 'c.created_at', 'c.updated_at'));
        $this->db->from('categories c');
        $this->db->where('c.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    // delete Category
    public function deleteCategory() {
        $this->db->where('id', $this->_categoryID);
        $this->db->delete('categories');
    }

}
?>