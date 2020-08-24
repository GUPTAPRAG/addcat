<?php 
 include_once '../lib/database.php';
include_once '../helpers/format.php';

?>

<?php

class Category{
	private $db;
	private $fm;
public function __construct(){
	$this->db = new Database();
	$this->fm = new Format();
	
}
	 public function catInsert($catName){                
    $catName = $this->fm->validation($catName); // Validation for special Characters             
    $catName =  mysqli_real_escape_string($this->db->link, $catName ); // Validation for mysqli   
    if (empty($catName)) {
    	 $msg = "Category Field must not be empty"; // validation for empty 
    	 return $msg;
    	}else {
			$query = "INSERT INTO tbl_category(catName) VALUES ('$catName')";  
    		$catinsert = $this->db->insert($query);
    		if ($catinsert) {
     $msg = "<span class='success'>Category Inserted Successfully.</span> "; // I create one span class
         return $msg; // Here i return this Message 
    		}else {
     $msg = "<span class='error'>Category Not Inserted .</span> "; // I create one span class as error
    	 return $msg; // Here i return this Message 
    		}

			}
			
		}

	}
	


?>