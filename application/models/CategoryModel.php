<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');
class CategoryModel extends CI_Model {
 
    private $category = 'category';
 
    function __construct() {
        
    }
 
    public function category_menu() {
        // Select all entries from the menu table
		
        $query = $this->db->query("select category_id, category_name, category_link,
            parent_id from " . $this->category . " order by parent_id, category_link");
 
        // Create a multidimensional array to contain a list of items and parents
        $cat = array(
            'items' => array(),
            'parents' => array()
        );
        // Builds the array lists with data from the menu table
        foreach ($query->result() as $cats) {
            // Creates entry into items array with current menu item id ie. $menu['items'][1]
            $cat['items'][$cats->category_id] = $cats;
            // Creates entry into parents array. Parents array contains a list of all items with children
            $cat['parents'][$cats->parent_id][] = $cats->category_id;
        }
 
        if ($cat) {
            $result = $this->build_category_menu(0, $cat);
            return $result;
        } else {
            return FALSE;
        }
    }
 
    // Menu builder function, parentId 0 is the root
    function build_category_menu($parent, $menu) {
        $html = "";
        if (isset($menu['parents'][$parent])) {
            $html .= "
<ul>
  ";
  foreach ($menu['parents'][$parent] as $itemId) {
  if (!isset($menu['parents'][$itemId])) {
  $html .= "
  <li><span>" . $menu['items'][$itemId]->category_name . "</span></li>
  ";
  }
  if (isset($menu['parents'][$itemId])) {
  $html .= "
  <li><span>" . $menu['items'][$itemId]->category_name . "</span>";
    $html .= $this->build_category_menu($itemId, $menu);
    $html .= "</li>
  ";
  }
  }
  $html .= "
</ul>
";
        }
        return $html;
    }
	
	function get_category_list(){  
		$this->db->select('*');
		$this->db->from('category'); 
		$this->db->order_by("category_id");
		$query=$this->db->get();
		return $query->result_array();
    }
 
}