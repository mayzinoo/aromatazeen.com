<?php
/**
* 
*/
class Main_model extends CI_Model
{
	public function __construct()
	{
	
	}
	public function insert($tablename,$data)
    {
        $this->db->insert($tablename,$data);
        return true;
    }
	public function delete($tablename,$field,$value)
	{
		$this->db->where($field,$value);
		$this->db->delete($tablename);
	 	return true;
	}
	public function readByEmail($email) {
        $condition = "email =" . "'" . $email . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
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
    			$path='./images/'.$folder.'/';
    			$config['overwrite']=TRUE;
    		 	$config['upload_path']=$path;	
    		 	$config['remove_spaces'] = TRUE;	
    		   	$config['allowed_types'] = 'jpg|png|jpeg';				   		
    			$this->load->library('upload', $config);
    			if(!$this->upload->do_upload($files))
    			{
    				echo $this->upload->display_errors();
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
			$tags['']="..Brand..";
		}
		$tags['']="..Brand..";
		foreach($query->result() as $row):
			$tags[$row->brand_name]=$row->brand_name;
		endforeach;
		return $tags;
	}
	function getitemsname()
	{
		$this->db->group_by("name");
		$this->db->order_by("name");
		$query = $this->db->get("items");
		if($query->num_rows()<=0)
		{
			$tags['']="..Item Type..";
		}
		$tags['']="..Item Type..";
		foreach($query->result() as $row):
			$tags[$row->name]=$row->name;
		endforeach;
		return $tags;
	}
	
}

?>