<?php
/**
 * Created by PhpStorm.
 * User: geymur-vs
 * Date: 21.11.18
 * Time: 8:47
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Dependencies extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('CategoryItems_model', 'category_items');
        $this->load->model('Category_model', 'category');
        $this->load->model('Item_model', 'item');
    }

    // Category list method
    public function index() {

        $this->add_css([
            'plugins/jstree/dist/themes/default/style.min.css',
            'plugins/lou-multi-select/css/multi-select.css',
        ]);

        $this->add_js([
            'application/js/items.js',
            'plugins/jstree/dist/jstree.min.js',
            'plugins/lou-multi-select/js/jquery.multi-select.js',
        ]);

        $this->init_js(["items.init('" . site_url() . "');"]);

        $data['page'] = 'item-list';
        $data['title'] = 'Item List';
        $data['active_tab'] = 'dependencies';

        $this->load->view('dependencies/index', $data);
    }

    // Item Add method
    public function addItem() {

        $data['page'] = 'item-add';
        $data['title'] = 'Item Add';

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

    // Delete item
    public function delete($id='') {
        $this->item->setItemID($id);
        $this->item->deleteItem();
        redirect('item/index');
    }

    function populateCategoriesTree()
    {
        $tree = array();
        $categories = $this->category->getCategoryList();
        foreach ($categories as $category) {
            $tree[] = array('id' => $category['category_id'],
                'text' => $category['category_name'],
                'attr' => array('id' => $category['category_id']),
                'data' => array('id' => $category['category_id'], 'name' => 'category', 'attr' => array('id' => $category['category_id'])),
                'metadata' => array('id' => $category['category_id']),
                'type' => 'root',
                'children' => '');

            $items = $this->category_items->getCategoryItemsList($category['category_id']);
            foreach ($items as $item) {
                $tree[count($tree)-1]['children'][] = array('text' => $item['item_name'],
                    'data' => array('id' => $item['item_id'], 'name' => 'item'),
                    'type' => 'child');
            }
        }
        echo json_encode($tree);
    }

    function manageCategoryItems() {

        $result = ['data' => '', 'error' => false];

        if ($this->input->is_ajax_request()) {

            $category_id = $this->input->post('category_id', true);

            $items = $this->item->getItemList();

            $category_items_id = [];
            $category_items = $this->category_items->getCategoryItemsList($category_id);
            foreach($category_items as $item) {
                $category_items_id[] = $item['item_id'];
            }

            $data['all_items'] = $items;

            $result = [
                'data' => [
                    'html' => $this->load->view('dependencies/category_items', $data, TRUE),
                    'category_items' => $category_items_id
                ],

                'error' => false];
        }

        echo response($result['data'], $result['error']);
    }

    function updateCategoryItems() {

        $result = ['data' => '', 'error' => false];

        if ($this->input->is_ajax_request()) {

            $category_id = $this->input->post('category_id', true);
            $category_items = $this->input->post('category_items', true);

            $update = $this->category_items->updateCategoryItems($category_id, $category_items);

            if ($update) {

                $result = [
                    'data' => [
                        'message' => 'Successfully updated'
                    ],

                    'error' => false];
            }
            else {

                $result = [
                    'data' => [
                        'message' => 'Error'
                    ],

                    'error' => true];
            }
        }

        echo response($result['data'], $result['error']);
    }

    function deleteItemFromCategory()
    {
        if ($this->input->is_ajax_request()) {

            $category_id = $this->input->post('category_id', true);
            $item_id = $this->input->post('item_id', true);

            $this->category_items->deleteItemFromCategory($category_id, $item_id);

            echo response([
                'error' => false,
                'message' => 'Successfully deleted'
            ]);
        }
    }
}
?>