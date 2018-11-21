<?php

/**
 * Created by PhpStorm.
 * User: geymur-vs
 * Date: 21.11.18
 * Time: 8:58
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CategoryItems_model extends CI_Model {

    private $_ID;
    private $_itemID;
    private $_categoryID;

    public function setID($ID) {
        $this->_ID = $ID;
    }
    public function setItemID($itemID) {
        $this->_itemID = $itemID;
    }
    public function setCategoryID($categoryID) {
        $this->_categoryID = $categoryID;
    }

    // get Category Items
    public function getCategoryItemsList($category_id) {
        $this->db->select(array('i.id as item_id', 'i.name as item_name'));
        $this->db->from('items i');
        $this->db->join('category_items ci', 'i.id = ci.item_id');
        $this->db->where('ci.category_id', $category_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    // delete Item
    public function deleteItem() {
        $this->db->where('id', $this->_itemID);
        $this->db->delete('items');
    }

    function updateCategoryItems($category_id, $category_items)
    {
        // delete items
        $this->db->where('category_id', $category_id);
        $this->db->where_not_in('item_id', $category_items);
        $delete = $this->db->delete('category_items');

        if ($delete) {
            // insert items
            foreach ($category_items as $key => $value) {
                $this->db->select('1');
                $this->db->from('category_items');
                $this->db->where('category_id', $category_id);
                $this->db->where('item_id', $value);
                $res = $this->db->get();
                if (isset($res)) {
                    $res = $res->result_array();
                    if (count($res) == 0) {
                        $category_items_row = [
                            'category_id' => $category_id,
                            'item_id' => $value
                        ];
                        $insert = $this->db->insert('category_items', $category_items_row);
                        if (!$insert) {
                            return $insert;
                        }
                    }
                }
            }
        }
        else {
            return $delete;
        }

        return true;
    }

    function deleteItemFromCategory($category_id, $item_id)
    {
        $this->db->where(array('category_id' => $category_id, 'item_id' => $item_id));
        $this->db->delete('category_items');
    }

}
?>