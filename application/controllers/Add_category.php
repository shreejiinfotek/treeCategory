<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Add_category extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->model('categorymodel', 'cat');
		 $this->load->library('form_validation');
		 $this->load->library('session');
    }
 
    function index() {
		
		$formSubmit = $this->input->post('Submit');
			if($formSubmit=="Add New")
			{
				
				$tblName = "category";
				$data = array(
				'category_name'=>$this->input->post('title'),
				'parent_id' => $this->input->post('parent_id')
				);
				 $this->db->insert('category',$data);
				$this->session->set_flashdata('msg', 'Category has been added successfully.');
				redirect('category','refresh');
				
				
			}
		$data['categories']=$this->cat->get_category_list();
        $this->load->view('vwCategoryAdd', $data);
    }
 
}