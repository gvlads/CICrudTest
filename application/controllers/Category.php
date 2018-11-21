<?php
/**
 * Created by PhpStorm.
 * User: geymur-vs
 * Date: 21.11.18
 * Time: 8:47
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Category_model', 'category');
    }

    // Category list method
    public function index() {

        $this->init_js([""]);

        $data['page'] = 'Category-list';
        $data['title'] = 'Category List';
        $data['active_tab'] = 'categories';
        $data['categories'] = $this->category->getCategoryList();

        $this->load->view('category/index', $data);
    }

    // Category Add method
    public function add() {

        $data['page'] = 'category-add';
        $data['title'] = 'Category Add';
        $data['active_tab'] = 'categories';

        $this->load->view('category/add', $data);
    }

    // Item save method
    public function save() {

        $this->load->library('form_validation');

        $category_id = $this->input->post('category_id');

        // field name, error message, validation rules
        $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            if ($category_id == "") {
                $this->add();
            }
            else {
                $this->edit();
            }
        } else {
            $category_name = $this->input->post('category_name');

            $this->category->setCategoryName($category_name);

            if ($category_id == "") {
                $created_at = now();
                $this->category->setCreatedAt($created_at);

                $this->category->insertCategory();
            }
            else {
                $updated_at = now();
                $this->category->setCategoryID($category_id);
                $this->category->setUpdatedAt($updated_at);

                $this->category->updateCategory();
            }

            redirect('category/index');
        }
    }

    // Category edit method
    public function edit($id='') {

        $data['page'] = 'category-edit';
        $data['title'] = 'Category Edit';
        $data['active_tab'] = 'categories';

        $data['category'] = $this->category->getCategoryById($id);

        $this->load->view('category/edit', $data);
    }

    // Category delete method
    public function delete($id='') {
        $this->category->setCategoryID($id);
        $this->category->deleteCategory();
        redirect('category/index');
    }
}
?>