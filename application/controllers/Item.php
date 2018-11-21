<?php
/**
 * Created by PhpStorm.
 * User: geymur-vs
 * Date: 21.11.18
 * Time: 8:47
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Item_model', 'item');
    }

    // Category list method
    public function index() {

        $this->init_js([""]);

        $data['page'] = 'item-list';
        $data['title'] = 'Item List';
        $data['active_tab'] = 'items';
        $data['items'] = $this->item->getItemList();

        $this->load->view('item/index', $data);
    }

    // Item Add method
    public function add() {

        $data['page'] = 'item-add';
        $data['title'] = 'Item Add';
        $data['active_tab'] = 'items';

        $this->load->view('item/add', $data);
    }

    // Item save method
    public function save() {

        $this->load->library('form_validation');

        $item_id = $this->input->post('item_id');

        // field name, error message, validation rules
        $this->form_validation->set_rules('item_name', 'Item Name', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            if ($item_id == "") {
                $this->add();
            }
            else {
                $this->edit();
            }
        } else {
            $item_name = $this->input->post('item_name');

            $this->item->setItemName($item_name);

            if ($item_id == "") {
                $created_at = now();
                $this->item->setCreatedAt($created_at);

                $this->item->insertItem();
            }
            else {
                $updated_at = now();
                $this->item->setItemID($item_id);
                $this->item->setUpdatedAt($updated_at);

                $this->item->updateItem();
            }

            redirect('item/index');
        }
    }

    // Item edit method
    public function edit($id='') {

        $data['page'] = 'item-edit';
        $data['title'] = 'Item Edit';
        $data['active_tab'] = 'items';

        $data['item'] = $this->item->getItemById($id);

        $this->load->view('item/edit', $data);
    }

    // Item delete method
    public function delete($id='') {
        $this->item->setItemID($id);
        $this->item->deleteItem();
        redirect('item/index');
    }
}
?>