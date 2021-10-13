<?php
/**
* 
*/
class Admin_model extends CI_Model
{
	public function __construct()
	{
	    
	}
    public function multiple_images($image = array()){

     return $this->db->insert_batch('testing',$image);
    }
    public function pinsert($data = array()){ 
            $insert = $this->db->insert_batch('testing',$data); 
            return $insert?true:false;
        } 
	public function insert($tablename,$data)
	{
	 	$this->db->insert($tablename,$data);
	 	return true;
	}
	public function update($tablename,$data,$field,$value)
	{
		$this->db->where($field,$value);
	 	$this->db->update($tablename,$data);
	 	return true;
	}
	public function delete($tablename,$field,$value)
	{
		$this->db->where($field,$value);
		$this->db->delete($tablename);
	 	return true;
	}
	public function getData($tablename)
	{
		$result= $this->db->get($tablename);
		return $result;
	}
	function slideimg_upload($files,$folder)
	{
		ini_set('upload_max_filesize','30M');
		ini_set('post_max_size','30M');
		if(!$files){
				return false;
		}else
		{				
			$path='./img/'.$folder.'/';
			$config['overwrite']=TRUE;
		 	$config['upload_path']=$path;	
		 	$config['remove_spaces'] = TRUE;	
		   	$config['allowed_types'] = 'jpg|png|jpeg';  
		   	
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload($files))
			{
				$error = array('error' => $this->upload->display_errors());
	            return $error;
			}
			else
			{							
				return true;
			}
		}
	}
	function coverimg_upload($files,$folder)
	{
		ini_set('upload_max_filesize','30M');
		ini_set('post_max_size','30M');
		if(!$files){
				return false;
		}else
		{				
			$path='./img/product/'.$folder.'/';
			$config['overwrite']=TRUE;
		 	$config['upload_path']=$path;	
		 	$config['remove_spaces'] = TRUE;	
		   	$config['allowed_types'] = 'jpg|png|jpeg';  
		   	
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload($files))
			{
				$error = array('error' => $this->upload->display_errors());
	            return $error;
			}
			else
			{							
				return true;
			}
		}
	}
	function img_upload($files,$folder)
	{
		ini_set('upload_max_filesize','30M');
		ini_set('post_max_size','30M');
		if(!$files){
				return false;
		}else
		{				
			$path='./img/product/'.$folder.'/';
			$config['overwrite']=TRUE;
		 	$config['upload_path']=$path;	
		 	$config['remove_spaces'] = TRUE;	
		   	$config['allowed_types'] = 'jpg|png|jpeg';  
		   	
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload($files))
			{
				$error = array('error' => $this->upload->display_errors());
	            return $error;
			}
			else
			{							
				return true;
			}
		}
	}
	function getbrandname()
	{
		$this->db->group_by("brand_name");
		$this->db->order_by("brand_name");
		$query = $this->db->get("brands");
		if($query->num_rows()<=0)
		{
			$tags['']="..Select..";
		}
		$tags['']="..Select..";
		foreach($query->result() as $row):
			$tags[$row->brand_name]=$row->brand_name;
		endforeach;
		return $tags;
	}
	function getpname()
	{
		$this->db->group_by("product_name");
		$this->db->order_by("product_name");
		$query = $this->db->get("products");
		if($query->num_rows()<=0)
		{
			$tags['']="..Select..";
		}
		$tags['']="..Select..";
		foreach($query->result() as $row):
			$tags[$row->id]=$row->product_name;
		endforeach;
		return $tags;
	}
	function getproductsname()
	{
		$query = $this->db->query('SELECT product_name FROM products');
        return $query->result();
	}
	function getproductcolor()
	{
		$query = $this->db->query('SELECT product_color FROM product_color');
        return $query->result();
	}
	function getcategorylist()
	{
		$query = $this->db->query('SELECT category_name FROM category');
        return $query->result();
	}
	function getproductidlist()
	{
		$query = $this->db->query('SELECT * FROM products');
        return $query->result();
	}
	function getbrandnamelist()
	{
		$query = $this->db->query('SELECT brand_name FROM brands');
        return $query->result();
	}
	function getcategory()
	{
		$this->db->group_by("category_name");
		$this->db->order_by("id","asc");
		$query = $this->db->get("category");
		if($query->num_rows()<=0)
		{
			$tags['']="..Select..";
		}
		$tags['']="..Select..";
		foreach($query->result() as $row):
			$tags[$row->category_name]=$row->category_name;
		endforeach;
		return $tags;
	}
	function getproductid()
	{
		$this->db->group_by("product_name");
		$this->db->order_by("id","asc");
		$query = $this->db->get("products");
		if($query->num_rows()<=0)
		{
			$tags['']="..Select..";
		}
		$tags['']="..Select..";
		foreach($query->result() as $row):
			$tags[$row->id]=$row->product_name;
		endforeach;
		return $tags;
	}
	function getsubcategory()
	{
		$this->db->group_by("category_name");
		$this->db->order_by("id","asc");
		$query = $this->db->get("sub_category");
		if($query->num_rows()<=0)
		{
			$tags['']="..Select..";
		}
		$tags['']="..Select..";
		foreach($query->result() as $row):
			$tags[$row->sub_category]=$row->sub_category;
		endforeach;
		return $tags;
	}
	function getremarklist(){
	    $query = $this->db->query('SELECT remark_name FROM remark');
        return $query->result();
	}
	function getremark()
	{
		$this->db->group_by("remark_name");
		$this->db->order_by("id","asc");
		$query = $this->db->get("remark");
		if($query->num_rows()<=0)
		{
			$tags['']="..Select..";
		}
		$tags['']="..Select..";
		foreach($query->result() as $row):
			$tags[$row->id]=$row->remark_name;
		endforeach;
		return $tags;
	}
	function getproducts()
	{
		$this->db->group_by("product_name");
		$this->db->order_by("id",'desc');
		$query = $this->db->get("products");
		if($query->num_rows()<=0)
		{
			$tags['']="..Select..";
		}
		$tags['']="..Select..";
		foreach($query->result() as $row):
			$tags[$row->id]=$row->product_name;
		endforeach;
		return $tags;
	}
	
}

?>