<?php
if(!defined('BASEPATH'))
		exit('No direct script acceess allowed'); 

class Admin extends CI_Controller
{
	function __construct() 
	    {
        parent::__construct(); 
        error_reporting(1);
        $this->load->helper('url'); 
      
      }
      public function index(){
        $this->load->view("admin/login");
      }
      function dashboard()
      {
        //  $data["menu"]=$this->db->get("category");
         $data["menu"]=$this->db->select("products.*,products.category_name as catname,count(products.category_name) as total")
                            ->join('category','category.category_name=products.category_name', 'left')
                            ->group_by('products.category_name')
                            // ->where('MONTH(products.created_at)', 'MONTH(NOW())')
                            ->get("products");
        $data["orders"]=$this->db->order_by("id","desc")->limit('10')->get("orders");
        
        $data["orderlist"]=$this->db->select("*")->get("orders");
        $data["allproducts"]=$this->db->select("*")->get("products");
        $data["allbrands"]=$this->db->select("*")->get("brands");
        
        $this->load->view("admin/template",$data);
      }
      function guideline()
      {
          $data['content']="admin/guideline";
        $this->load->view("admin/inner-content",$data);   
      }
      function orders_detail()
      {
        $id=$this->uri->segment(3);
        $data["order"]=$this->db->order_by("id","desc")->get_where("orders",array("id"=>$id))->row();
        $data['content']="admin/order-detail";
        $this->load->view("admin/inner-content",$data);   
      }
      function update_orderstatus()
      {
        $id=$this->uri->segment(3);  
        $data['content']="admin/update-orderstatus";
        $this->load->view("admin/inner-content",$data);   
      }
      function orderstatus_update()
      {
          $id=$this->input->post("id");
          $status=$this->input->post("status");
          $data=array(
              "order_status"=>$status
            );
        $this->db->where('id',$id);
		$this->db->update("orders",$data);
        redirect("Admin/dashboard");
      }
      function allslideshow()
      {
        $data["slideshowdata"]=$this->db->get_where("products",array("remark"=>'5'));
        
        $data['content']="admin/slideshowphoto";
        $this->load->view("admin/inner-content",$data);  
      }
      function add_headermsg()
      {
        $data['homemsg']=$this->db->get("header_msg");
        $data['content']="admin/add-headermsg";
        $this->load->view("admin/inner-content",$data);  
      }
      function add_shipping()
      {
        $data['shippingfee']=$this->db->get("shipping_fee");
        $data['shipdata']=$this->db->get("shipping_fee")->row();
        $data['content']="admin/add-shippingfee";
        $this->load->view("admin/inner-content",$data);  
      }
      function addslideshow_form()
      {
        $data['content']="admin/addslideshow";
        $this->load->view("admin/inner-content",$data);  
      }
      function add_aboutchairman()
      {
          $data['chairman']=$this->db->get("about_chairman");
        $data['content']="admin/addaboutchairman";
        $this->load->view("admin/inner-content",$data);  
      }
      function add_remark_form()
      {
        $data['remark']=$this->db->get("remark");
        $data['content']="admin/addremark_form";
        $this->load->view("admin/inner-content",$data);  
      }
      function updateslideshow_form()
      {
        $data["slideshowdata"]=$this->db->get("home_slideshow")->row();
        
        $data['content']="admin/updateslideshow";
        $this->load->view("admin/inner-content",$data);  
      }
      function update_category_form()
      {
        $id=$this->uri->segment(3);
        $data["category"]=$this->db->get_where('category',array("id"=>$id))->row();
        
        $data['content']="admin/update_category";
        $this->load->view("admin/inner-content",$data);  
      }
      function updateremark_form()
      {
        $id=$this->uri->segment(3);
        $data["remark"]=$this->db->get_where('remark',array("id"=>$id))->row();
        
        $data['content']="admin/updateremark_form";
        $this->load->view("admin/inner-content",$data);    
      }
      function update_categorysize_form()
      {
            $id=$this->uri->segment(3);
        $data['categorylist']=$this->Admin_model->getcategorylist();
        $data["categorysize"]=$this->db->get_where('category_size',array("id"=>$id))->row();
        $data['content']="admin/update_categorysize";
        $this->load->view("admin/inner-content",$data);  
      }
      function update_subcategory_form()
      {
        $id=$this->uri->segment(3);
        $data['categorylist']=$this->Admin_model->getcategorylist();
        $data["subcategory"]=$this->db->get_where('sub_category',array("id"=>$id))->row();
        $data['content']="admin/update_subcategory";
        $this->load->view("admin/inner-content",$data);  
      }
      function updatebrand_form()
      {
          $id=$this->uri->segment(3);
          $data["branddata"]=$this->db->get_where('brands',array("id"=>$id))->row();
          $data['content']="admin/updatebrand_form";
        $this->load->view("admin/inner-content",$data);  
      }
      function update_productcolor_form()
      {
          $id=$this->uri->segment(3);
          $data["productcolor"]=$this->db->get_where('product_color',array("id"=>$id))->row();
          $data['content']="admin/update_productcolor";
        $this->load->view("admin/inner-content",$data);  
      }
      function latest_fashion()
      {
        $data["latestfashiondata"]=$this->db->get("home_latest_fashion")->row();
        $data['content']="admin/latestfashion";
        $this->load->view("admin/inner-content",$data);  
      }
      function discountitem()
      {
        $data["discountitem"]=$this->db->get("home_discount")->row();
        $data['content']="admin/discount";
        $this->load->view("admin/inner-content",$data);  
      }
      function category()
      {
          
        $data["category"]=$this->db->select('*')
                                    ->group_by('id')
									->order_by('id','asc')
									->get('category');
        $data['productcolor']=$this->db->get("product_color");
        $data["categorysize"]=$this->db->get("category_size");
        $data["subcategory"]=$this->db->get("sub_category");
        $data['categorylist']=$this->Admin_model->getcategory();
        $data['content']="admin/category";
        $this->load->view("admin/inner-content",$data);
      }
      function homemenu()
      {
          
        $data["category"]=$this->db->select('*')
                                    ->group_by('id')
									->order_by('sort_id','asc')
									->get('category');
        $data['productcolor']=$this->db->get("product_color");
        $data["categorysize"]=$this->db->get("category_size");
        $data["subcategory"]=$this->db->get("sub_category");
        
         $data["allmenu"]=$this->db->get("category");
        $data['categorylist']=$this->Admin_model->getcategory();
        $data['content']="admin/home-menu";
        $this->load->view("admin/inner-content",$data);
      }
      function edit_sortingmenu()
      {
          $id=$this->input->post("id");
          $menu=$this->input->post("menu");
          
         $qry=$this->db->query("SELECT * from category");
        // while($qry->result())
        // {
        // 	$id=$this->input->post("id");
        // 	$menu=$this->input->post("menu");
        
        // 	$this->db->query("UPDATE category SET id='$id' WHERE category_name='$menu'");
        // }
		redirect("Admin/homemenu");
      }
      function get_subcategory()
		{
// 		 echo "hhhhh"   ;exit;
			$category=$this->input->post("category");
			$this->db->group_by("sub_category");
			$this->db->order_by("sub_category");
			$this->db->where("category_name",$category);
			$query = $this->db->get("sub_category ");
			// $result=$query->num_rows();
			// echo $result;exit;
			echo "<option value=''>".'...No select...'."</option>";
			foreach($query->result() as $row):

			echo "<option value='".$row->id."'>".$row->sub_category."</option>";
			endforeach;
    		
		}
	function gett_productsize()
		{
// 		 echo "hhhhh"   ;exit;
			$category=$this->input->post("category");
			$this->db->group_by("size");
			$this->db->order_by("size");
			$this->db->where("category_name",$category);
			$query = $this->db->get("category_size ");
			// $result=$query->num_rows();
			// echo $result;exit;
			echo "<option value=''>".'...No select...'."</option>";
			foreach($query->result() as $row):

			echo "$row->size";
			endforeach;
    		
		}
      function brands()
      {
        $data["brands"]=$this->db->get("brands");
        $data['content']="admin/brands";
        $this->load->view("admin/inner-content",$data);
      }
      function insert_shipping()
      {
        $fee=$this->input->post("fee");
        $shiptext=$this->input->post("ship-text");
        
        $data=array(
          "fee"=>$fee,
         "text"=>$shiptext
        );
      
        $this->db->where('id','1');
		$this->db->update("shipping_fee",$data);
        redirect("Admin/add_shipping");
      }
      function add_category()
      {
        $categoryname=$this->input->post("categoryname");
        

        $data=array(
          "category_name"=>$categoryname,
          "status"=>'1',
          "created_at"=>date("Y-m-d")
        );
        $this->db->insert("category",$data); 
        redirect("Admin/homemenu");
      }
      function insert_remark()
      {
          $remark=$this->input->post("remark");
        

        $data=array(
          "remark_name"=>$remark,
          "created_at"=>date("Y-m-d")
        );
        $this->db->insert("remark",$data); 
        redirect("Admin/add_remark_form");
      }
      function add_productcolor()
      {
        $productcolor=$this->input->post("productcolor");

        $data=array(
          "product_color"=>$productcolor,
          "created_at"=>date("Y-m-d")
        );
        $this->db->insert("product_color",$data); 
        redirect("Admin/category");
      }
      function update_productcolor()
      {
          $id=$this->input->post("id");
        $productcolor=$this->input->post("productcolor");

        $data=array(
          "product_color"=>$productcolor
          
        );
        $this->db->where('id',$id);
		$this->db->update("product_color",$data);
        redirect("Admin/category");
      }
      function update_category()
      {
        $id=$this->input->post("id");
        $sortid=$this->input->post("sortid");
        $categoryname=$this->input->post("categoryname");
        $status=$this->input->post("status");
        
        $data=array(
            "sort_id"=>$sortid,
          "status"=>$status,
          "category_name"=>$categoryname
        );
        $this->db->where('id',$id);
		$this->db->update("category",$data);
        redirect("Admin/homemenu");
      }
       function update_remark()
      {
           $id=$this->input->post("id");
          $remark=$this->input->post("remark");
        $data=array(
          "remark_name"=>$remark
        );
        $this->db->where('id',$id);
		$this->db->update("remark",$data);
        redirect("Admin/add_remark_form");
      }
      function add_categorysize()
      {
          $categoryname=$this->input->post("categoryname");
            $size=$this->input->post("size");

        $data=array(
          "category_name"=>$categoryname,
           "size"=>$size,
          "created_at"=>date("Y-m-d")
        );
        $this->db->insert("category_size ",$data); 
        redirect("Admin/category");
      }
      function update_categorysize()
      {
          $id=$this->input->post("id");
          $categoryname=$this->input->post("categoryname");
            $size=$this->input->post("size");

        $data=array(
          "category_name"=>$categoryname,
           "size"=>$size,
          "created_at"=>date("Y-m-d")
        );
        $this->db->where('id',$id);
		$this->db->update("category_size",$data);
        redirect("Admin/category");
      }
      function add_subcategory()
      {
          $categoryname=$this->input->post("categoryname");
            $subcategory=$this->input->post("subcategory");

        $data=array(
          "category_name"=>$categoryname,
           "sub_category"=>$subcategory,
          "created_at"=>date("Y-m-d")
        );
        $this->db->insert("sub_category",$data); 
        redirect("Admin/homemenu");
      }
      function update_subcategory()
      {
          $id=$this->input->post("id");
          $categoryname=$this->input->post("categoryname");
            $subcategory=$this->input->post("subcategory");

        $data=array(
          "category_name"=>$categoryname,
           "sub_category"=>$subcategory,
          "created_at"=>date("Y-m-d")
        );
        $this->db->where('id',$id);
		$this->db->update("sub_category",$data);
        redirect("Admin/category");
      }
      function add_brand()
      {
        $brandname=$this->input->post("brandname");   
        // $brandphoto=$this->input->post("brandphoto");
        if(!empty($_FILES['brandphoto']['name'])){    
          $this->Admin_model->coverimg_upload("brandphoto",'brandphotos');  
          $brand =str_replace(" ","_",$_FILES['brandphoto']['name']);
        }
        else
        {
          $brand="";
        }
        $data=array(
          "brand_name"=>$brandname,
          "brand_photo"=>$brand,
          "created_at"=>date("Y-m-d")
        );
        $this->db->insert("brands",$data); 
        redirect("Admin/brands");
      }
      function update_brand()
      {
        $id=$this->input->post("id");
        $brandname=$this->input->post("brandname");   
        // $brandphoto=$this->input->post("brandphoto");
        
        if(!empty($_FILES['brandphoto']['name'])){    
          $this->Admin_model->coverimg_upload("brandphoto",'brandphotos');  
          $brand =str_replace(" ","_",$_FILES['brandphoto']['name']);
        }
        else
        {
          $brand="";
        }
       
        $data=array(
          "brand_name"=>$brandname,
          "brand_photo"=>$brand,
          "created_at"=>date("Y-m-d")
        );
        $this->db->where('id',$id);
		$this->db->update("brands",$data);
        redirect("Admin/brands");
      }
      // function select_category()
      // {
      //   $query = $this->db->get("category");

      // }
      function product_list()
      {
        $data["productlist"]=$this->db->select("products.*,remark.remark_name as remarkname")
                            ->join('remark', 'remark.id=products.remark', 'left')
                            ->order_by("id","desc")
                            ->get("products");

        $data['content']="admin/product-list";
        $this->load->view("admin/inner-content",$data);
      }
      function orderlist()
      {
        $data["orderlist"]=$this->db->select("*")
                           
                            ->order_by("id","desc")
                            ->get("orders");

        $data['content']="admin/order-list";
        $this->load->view("admin/inner-content",$data);
      }
      function transactionlist()
      {
        $data["transactionlist"]=$this->db->get("transaction");

        $data['content']="admin/transaction-list";
        $this->load->view("admin/inner-content",$data);
      }
      function coupons_list()
      {
        $data["couponslist"]=$this->db->get("coupons");

        $data['content']="admin/coupons-list";
        $this->load->view("admin/inner-content",$data);
      }
      function menulist()
      {
        $data["menulist"]=$this->db->get("menu_list");
        $data['content']="admin/menu-list";
        $this->load->view("admin/inner-content",$data);
      }
      function user_list()
      {        
        $this->db->where("role !=","admin");
        $this->db->order_by("id",'desc');
        $data["userlist"]=$this->db->get("users");

        $data['content']="admin/user-list";
        $this->load->view("admin/inner-content",$data);
      }
      function invoice()
      {   
           
        $data["invoicelist"]=$this->db->select("*")
                           
                            ->order_by("id","desc")
                            ->get("orders");
        $data['shippingfee']=$this->db->get("shipping_fee")->row();
        $data['content']="admin/invoice";
        $this->load->view("admin/inner-content",$data);
      }
      function payment_method()
      {   
           
        $data["paymethod"]=$this->db->select("*")
                            ->order_by("id","asc")
                            ->get("payment_ways");
       
        $data['content']="admin/payment-method";
        $this->load->view("admin/inner-content",$data);
      }
      function edit_paymethod()
      {
        $id=$this->uri->segment(3);
        $data["paymethod"]=$this->db->select("*")
                            
                            ->get_where("payment_ways",array("id"=>$id))->row();
       
        $data['content']="admin/update_paymethod";
        $this->load->view("admin/inner-content",$data); 
      }
      function update_paymethod(){
          
            $id=$this->input->post("id");
            $payname=$this->input->post("payname");
            $status=$this->input->post("status");
            
            $data=array(
               
              "status"=>$status,
              "payment_name"=>$payname
            );
            $this->db->where('id',$id);
    		$this->db->update("payment_ways",$data);
            redirect("Admin/payment_method");  
      }
      function invoice_form()
      {
        $id=$this->uri->segment(3);
        $data["order"]=$this->db->order_by("id","desc")->get_where("orders",array("id"=>$id))->row();
        $data["admininfo"]=$this->db->get_where("users",array("role"=>'admin'))->row();
        
        $data['content']="admin/invoice-form";
        $this->load->view("admin/inner-content",$data);
      }
      
      
      
function invoice_download(){
   
$this->load->library('pdf');
$id=$this->uri->segment(3);
$data["order"]=$this->db->order_by("id","desc")->get_where("orders",array("id"=>$id))->row();
 $data["admininfo"]=$this->db->get_where("users",array("role"=>'admin'))->row();

$path = base_url('assets/css/vendors/bootstrap.css');
$dat = file_get_contents($path);
//$css = '<link type="text/css" href="'.$data.'" rel="stylesheet" />';  // couldn’t get this to work
$css="<style>$dat</style>";


$this->load->view('invoicedownload',$data);
$html=$this->output->get_output();
$this->dompdf->loadHtml($html);
$this->dompdf->set_option('isRemoteEnabled', true);
$this->dompdf->setPaper('A4','portrait');
$this->dompdf->render();
// $this->dompdf->getOptions()->setChroot('/assets/css/');
$this->dompdf->setBasePath(realpath('https://aromatazeen.com/assets/css/'));

$pdfFilePath = 'InvoiceNo-#'.$id.'.pdf';
$this->dompdf->stream($pdfFilePath,array('Attachment'=>0));

}
      
      
      
      
      function invoice_editform(){
          
        $id=$this->uri->segment(3);
        $pid=$this->input->post("pname");
        $data['pname']=$this->Admin_model->getproductsname();
        $data['pcolor']=$this->Admin_model->getproductcolor();
        $data["orderdata"]=$this->db->select("*")
                        ->order_by("id","desc")
                        ->get_where("orders",array("id"=>$id))->row();
        $data['shippingfee']=$this->db->get("shipping_fee")->row();
        
        $data["productdetail"]=$this->db->select("*")
                            ->get_where("products",array("id"=>$pid))->row();
        $data['ppname']=$this->Admin_model->getpname();
        
        $p=array(
                    "pid"=>$pid
                    );
                $this->session->set_userdata($p); 
         
        
        $data['content']="admin/invoice_editform";
        $this->load->view("admin/inner-content",$data); 
      }
      
      function add_orderproduct()
      {
          $orderid=$this->uri->segment(3);
          $pid=$this->input->post("pname");
          $data["orderdata"]=$this->db->select("*")
                        ->order_by("id","desc")
                        ->get_where("orders",array("id"=>$orderid))->row();
          $data["productdetail"]=$this->db->select("*")
                            ->get_where("products",array("id"=>$pid))->row();
         $data['pname']=$this->Admin_model->getpname();
          $data['content']="admin/add-orderproducts";
          $this->load->view("admin/inner-content",$data); 
          
      }
      function update_orderdata()
      {
          $orderid=$this->input->post("orderid");
          $name=$this->input->post("name");
          $email=$this->input->post("email");
          $paymethod=$this->input->post("paymethod");
          $orderdate=$this->input->post("orderdate");
          $ordernote=$this->input->post("ordernote");
          
          $data=array(
              "full_name"=>$name,
             "text"=>$email,
             "payer_email"=>$paymethod,
             "order_date"=>$orderdate,
             "ordernote"=>$ordernote
            );
          
        $this->db->where('id',$orderid);
		$this->db->update("orders",$data);
        redirect("Admin/invoice_editform/".$orderid);
      }
      function update_deliveryinfo()
      {
          
          $orderid=$this->input->post("orderid");
          $deliname=$this->input->post("deliname");
          $deliaddress=$this->input->post("deliaddress");
          $delicity=$this->input->post("delicity");
          $deliphone=$this->input->post("deliphone");
          
          $data=array(
             
             "full_name"=>$deliname,
             "address1"=>$deliaddress,
             "city"=>$delicity,
             "phone"=>$deliphone
            );
          
        $this->db->where('id',$orderid);
		$this->db->update("orders",$data);
        redirect("Admin/invoice_editform/".$orderid);
      }
      function add_orderproducts(){
          $orderid=$this->input->post("orderid");
          
          $product=$this->input->post("product");
          $total=$this->input->post("total");
          $pid=$this->input->post("pid");
          $newqty=$this->input->post("newqty");
          $newprice=$this->input->post("newprice");
          $color=$this->input->post("color");
          $size=$this->input->post("size");
          $pprice=$this->input->post("pprice");
          $c=$pprice+$total;
         
        
        $item="";
		for($i=0;$i<count($pid);$i++)
		{
			$item.=$product[$i]."".$pid[$i]."#".$newqty[$i]."#".$newprice[$i]."#".$color[$i]."#".$size[$i]."]";
			
		}
		$data=array( 
                  "product" =>$item,
                  "amount"=>$c
                  );
        $this->db->where('id',$orderid);
		$this->db->update("orders",$data);
        redirect("Admin/invoice_editform/".$orderid);
      }
      function add_allorderproducts(){
          $orderid=$this->input->post("orderid");
          
          $ppid=$this->input->post("ppid");
          $pqty=$this->input->post("pqty");
          $pprice=$this->input->post("pprice");
          $pcolor=$this->input->post("pcolor");
          $size=$this->input->post("size");
          $finalsum=$this->input->post("finalsum");
        
            $item="";
    		for($i=0;$i<count($ppid);$i++)
    		{
    			$item.=$ppid[$i]."#".$pqty[$i]."#".$pprice[$i]."#".$pcolor[$i]."#".$size[$i]."]";
    			
    		}
    // 	echo $item;exit;
    		$data=array( 
                      "product" =>$item,
                      "amount"=>$finalsum
                      );
            $this->db->where('id',$orderid);
    		$this->db->update("orders",$data);
            redirect("Admin/invoice_editform/".$orderid);
      }
      function search_product(){
          $orderid=$this->uri->segment(3);
         $pid=$this->input->post("pname");
         $data["orderdata"]=$this->db->select("*")
                        ->order_by("id","desc")
                        ->get_where("orders",array("id"=>$orderid))->row();
         $data["productdetail"]=$this->db->select("*")
                            ->get_where("products",array("id"=>$pid))->row();
      }
      function forgotpassword()
      {
        $data['admindata']=$this->db->get_where('users',array('role'=>'admin'))->row();
       
        $this->load->view('admin/forgotpassword',$data);
      }
      function myprofile()
      {
        
        $data['admindata']=$this->db->get_where('users',array('role'=>'admin'))->row();
        $data['content']="admin/myprofile";
        $this->load->view("admin/inner-content",$data);
      }
      function add_coupons_form()
      {
        $data['content']="admin/addcoupon_form";
        $this->load->view("admin/inner-content",$data);
      }
      function add_product_form()
      {
        $data['productcolor'] =$this->db->get("product_color");
        $data['categorylist']=$this->Admin_model->getcategory();
        $data['productlist']=$this->Admin_model->getproductid();
        $data['subcategorylist']=$this->Admin_model->getsubcategory();
        $data['brandlist']=$this->Admin_model->getbrandname();
        $data['remarklist']=$this->Admin_model->getremark();
        $data['category']=$this->db->get("category")->row();

        $data['content']="admin/addproduct_form";
        $this->load->view("admin/inner-content",$data);
      }
      function product_photos()
      {
        $data['productlist']=$this->Admin_model->getproducts();
        $data['productphotolist']=$this->db->select('product_morephotos.*,products.product_name as pname,products.cover_photo as pcover,count(product_id) as pno')
		                            ->join('products', 'products.id=product_morephotos.product_id', 'left')
		                            ->group_by("product_id")
		                            ->get('product_morephotos');
		$data['stylewithphoto']=$this->db->select('products.*,count(styledwith_pid) as stylepid')
		                            ->group_by("styledwith_pid")
		                            ->get('products')->row();
		
// 		$data['stylewithphoto']=$this->db->select('*,count(product_id) as styno')
// 		                            ->get('stylewith_photos')->row();
        $data['content']="admin/add_productphotos";
        $this->load->view("admin/inner-content",$data);
      }
      function view_morephotos()
      {
          $pid=$this->uri->segment(3);
        $data['galleryphoto']=$this->db->get_where("product_morephotos",array("product_id"=>$pid));
        $data['productname']=$this->db->select('products.product_name as pname')
		                            ->join('products', 'products.id=product_morephotos.product_id', 'left')
		                            ->get_where('product_morephotos',array("product_id"=>$pid))->row();
        $data['content']="admin/view_photogallery";
        $this->load->view("admin/inner-content",$data);
      }
      function view_stylewithphotos()
      {
          $pid=$this->uri->segment(3);
        $data['styphoto']=$this->db->get_where("stylewith_photos ",array("product_id"=>$pid));
        $data['productname']=$this->db->select('products.product_name as pname')
		                            ->join('products', 'products.id=stylewith_photos.product_id', 'left')
		                            ->get_where('stylewith_photos',array("product_id"=>$pid))->row();
        $data['content']="admin/view_stylephoto";
        $this->load->view("admin/inner-content",$data);
      }
      function edit_product_form()
      {
        $id=$this->uri->segment(3);
        $data['productcolor'] =$this->db->get("product_color");
        $data['categorylist']=$this->Admin_model->getcategorylist();
        $data['productlist']=$this->Admin_model->getproductidlist();
        $data['brandlist']=$this->Admin_model->getbrandnamelist();
        $data['remarklist']=$this->Admin_model->getremarklist();
        
        $data['productdata']=$this->db->select("products.*,sub_category.sub_category as subcatname,remark.remark_name as remarkname")
                                    ->join('remark','products.remark = remark.id', 'left')
                                    ->join('sub_category','products.sub_category = sub_category.id', 'left')
                                    ->get_where("products",array('products.id'=>$id))->row();
        
        $data['content']="admin/updateproduct_form";
        $this->load->view("admin/inner-content",$data);
      }
      function insert_productphotos()
      {
          $productid=$this->input->post("productid");
          
         if(!empty($_FILES['morephotos']['name'])){    
          $this->Admin_model->coverimg_upload("morephotos",'morephotos');  
          $stylephoto =str_replace(" ","_",$_FILES['morephotos']['name']);
        }
        else
        {
          $stylephoto="";
        }
            
        $data=array(
            'product_id'=>$productid,
              'photo'=> $stylephoto,
              'created_date'=> date("Y-m-d")
              );
              $this->Admin_model->insert("product_morephotos",$data);
        redirect("Admin/product_photos/");
      }
    function insert_stylewithphotos()
      {
          $productid=$this->input->post("pid");
          
         if(!empty($_FILES['stylephoto']['name'])){    
          $this->Admin_model->coverimg_upload("stylephoto",'stylephotos');  
          $stylephoto =str_replace(" ","_",$_FILES['stylephoto']['name']);
        }
        else
        {
          $stylephoto="";
        }
            
        $data=array(
            'product_id'=>$productid,
              'photo'=> $stylephoto,
              'created_date'=> date("Y-m-d")
              );
              $this->Admin_model->insert("stylewith_photos",$data);
        redirect("Admin/product_photos/");
      }
      function insert_products()
      {
        $productname=$this->input->post('productname');
        $categoryname=$this->input->post('categoryname');
        $subcategory=$this->input->post('subcategory');
        $brandname=$this->input->post('brandname');
        $price=$this->input->post('price');
        $color=$this->input->post('color');
        $size=$this->input->post('size');
        $qty=$this->input->post('qty');
        $description=$this->input->post('description');
        $remark=$this->input->post('remark');
        $addhome=$this->input->post('addhome');
        
        if(!empty($_FILES['coverphoto']['name'])){    
          $this->Admin_model->coverimg_upload("coverphoto",'coverimg');  
          $cover =str_replace(" ","_",$_FILES['coverphoto']['name']);
        }
        else
        {
          $cover="";
        }
        $colo="";
    	for($i=0;$i<count($color);$i++)
    	{
    		$colo .= $color[$i]."]";
    	}
    	$siz="";
    	for($i=0;$i<count($size);$i++)
    	{
    		$siz .= $size[$i]."]";
    	}
    	if(!empty($_FILES['homeslider']['name'])){    
          $this->Admin_model->slideimg_upload("homeslider",'homeslideshow'); 
          $slider =str_replace(" ","_",$_FILES['homeslider']['name']);
        }
        else
        {
          $slider="";
        }  
    /*end insert cover photo*/
        $data=array(
              'product_name'=> $productname,
              'category_name'=> $categoryname,
              'sub_category'=> $subcategory,
              'brand_name'=> $brandname,
              'price'=> $price,
              'color'=> $colo,
              'available_size'=> $siz,
              'available_qty'=> $qty,
              'description'=> $description,
              'cover_photo'=> $cover,
              'remark'=> $remark,
              'home_slider'=> $slider,
              'created_at'=> date("Y-m-d")
              );
        $this->Admin_model->insert("products",$data);

        redirect("Admin/add_product_form");
      }
      function insert_headermsg()
      {
        $message=$this->input->post("message"); 
        $data=array(
              'message'=> $message
                );
                
        $this->db->where('id','1');
		$this->db->update("header_msg",$data);
        redirect("Admin/add_headermsg");
      }
      function insert_aboutchairman()
      {
        $name=$this->input->post("name");
        $position=$this->input->post("position");
        $about=$this->input->post("about");
        $data=array(
              'name'=> $name,
              'position'=> $position,
              'about'=> $about,
              'created_at'=>date("Y-m-d")
              );
        
        $this->Admin_model->insert("about_chairman",$data);
        redirect("Admin/add_aboutchairman");
      }
      function insert_slideshow()
      {
        
        $title=$this->input->post("title");
        $bodytext=$this->input->post("bodytext");
        $remark=$this->input->post("remark");
        
        if(!empty($_FILES['coverphoto']['name'])){    
          $this->Admin_model->slideimg_upload("coverphoto",'homeslideshow'); 
          $cover =str_replace(" ","_",$_FILES['coverphoto']['name']);
        }
        else
        {
          $cover="";
        }  
       
         $data=array(
              'title'=> $title,
              'body_text'=> $bodytext,
              'slide_photo'=> $cover,
              'remark'=> $remark
              );
        
        $this->Admin_model->insert("home_slideshow",$data);
        redirect("Admin/allslideshow");
      }
      function update_slideshow()
      {
        $id=$this->input->post("id");
        $title=$this->input->post("title");
        $bodytext=$this->input->post("bodytext");
        $remark=$this->input->post("remark");
        
        if(!empty($_FILES['coverphoto']['name'])){    
          $this->Admin_model->slideimg_upload("coverphoto",'homeslideshow'); 
          $cover =str_replace(" ","_",$_FILES['coverphoto']['name']);
        }
        else
        {
          $cover=$this->input->post("coverphoto");
        }  
     
         $data=array(
              'title'=> $title,
              'body_text'=> $bodytext,
              'slide_photo'=> $cover,
              'remark'=> $remark
              );
        $this->db->where('id',$id);
		$this->db->update("home_slideshow",$data);
    // $this->Admin_model->insert("home_slideshow",$data);
        redirect("Admin/allslideshow");
      }
      function update_latestfashion()
      {
        $id='1';
        
        $bodytext=$this->input->post("bodytext");
        
        if(!empty($_FILES['photo']['name'])){    
          $this->Admin_model->slideimg_upload("photo",'homeslideshow'); 
          $viewphoto =str_replace(" ","_",$_FILES['photo']['name']);
        }
        else
        {
          $viewphoto=$this->input->post("photo");
        }  
    //   echo $viewphoto;exit;
         $data=array(
              
              'viewphoto'=> $viewphoto,
              'content_text'=> $bodytext
              );
        $this->db->where('id',$id);
		$this->db->update("home_latest_fashion",$data);
    // $this->Admin_model->insert("home_latest_fashion ",$data);
        redirect("Admin/latest_fashion"); 
      }
      function update_discountitem()
      {
        $id='1';
        $disamt=$this->input->post("dis-amt");
        
        if(!empty($_FILES['discountphoto']['name'])){    
          $this->Admin_model->slideimg_upload("discountphoto",'homeslideshow'); 
          $viewphoto =str_replace(" ","_",$_FILES['discountphoto']['name']);
        }
        else
        {
          $viewphoto=$this->input->post("discountphoto");
        }  
    //   echo $viewphoto;exit;
         $data=array(
              'viewphoto'=> $viewphoto,
              'discount_amt'=> $disamt,
              'created_at'=>date("Y-m-d")
              );
        $this->db->where('id',$id);
		$this->db->update("home_discount",$data);
    // $this->Admin_model->insert("home_discount ",$data);
        redirect("Admin/discountitem");   
      }
      function update_products()
      {
          $id=$this->input->post("id");
        $productname=$this->input->post('productname');
        $productid=$this->input->post('productid');
        
        $categoryname=$this->input->post('categoryname');
        $subcategory=$this->input->post('subcategory');
        $brandname=$this->input->post('brandname');
        $price=$this->input->post('price');
        $color=$this->input->post('color');
        $size=$this->input->post('size');
        $qty=$this->input->post('qty');
        $description=$this->input->post('description');
        $remark=$this->input->post('remark');
        $addhome=$this->input->post('addhome');
        // echo $addhome;exit;
        if(!empty($_FILES['coverphoto']['name'])){    
          $this->Admin_model->coverimg_upload("coverphoto",'coverimg');  
          $cover =str_replace(" ","_",$_FILES['coverphoto']['name']);
        }
        else
        {
          $cover=$this->input->post("coverphoto");
        }
    /*end insert cover photo*/
        
        if(empty($addhome)){
            $addhome='';
        }else{
             $addhome= $this->input->post('addhome');
        }/*end add home*/
        // if(empty($color)){
        //     	$colo="";
        //     	for($i=0;$i<count($color);$i++)
        //     	{
        //     		$colo .= $color[$i]."]";
        //     	}
        // }else{
        //     $colo= $this->input->post('$color');
        // }
        // if(empty($size)){
        //     $siz="";
        // 	for($i=0;$i<count($size);$i++)
        // 	{
        // 		$siz .= $size[$i]."]";
        // 	}
        // }else{
        //     $siz=$this->input->post('size');
        // }
    
        $data=array(
              'product_name'=> $productname,
              'styledwith_pid'=> $productid,
              'category_name'=> $categoryname,
              'sub_category'=> $subcategory,
              'brand_name'=> $brandname,
              'price'=> $price,
            //   'color'=> $colo,
            //   'available_size'=> $siz,
              'available_qty'=> $qty,
              'description'=> $description,
              'cover_photo'=> $cover,
              'remark'=> $remark,
                'add_home'=> $addhome
              );
        $this->db->where('id',$id);
		$this->db->update("products",$data);
       

        redirect("Admin/product_list");
      }
      function change_data()
      {
          $firstname=$this->input->post("firstname");
          $lastname=$this->input->post("lastname");
          $email=$this->input->post("email");
          $phone=$this->input->post("phone");
          $cmyname=$this->input->post("cmyname");
          $location=$this->input->post("location");
          
          if(!empty($_FILES['cmylogo']['name'])){    
              $this->Admin_model->coverimg_upload("cmylogo",'logo');  
              $cmylogo =str_replace(" ","_",$_FILES['cmylogo']['name']);
            }
            else
            {
              $cmylogo=$this->input->post("cmylogo");
            }

          $data=array(
             "cmyname" =>$cmyname,
            "first_name" =>$firstname,
            "last_name" =>$lastname,
            "email" =>$email,
            
            // "gender" =>$gender,
            "phone" =>$phone,
            "cmylogo" =>$cmylogo,
            "address" =>$location
            );
         $this->db->where('role','admin');
          $this->db->update("users",$data);

          redirect("Admin/myprofile");
      }
      function change_password()
      {
          $password=$this->input->post("password");
          $data=array(
              "password" =>$password
            );
        $this->db->where('role','admin');
          $this->db->update("users",$data);
        redirect("Admin/myprofile");
      }
      function admin_login()
      {
          ob_start();   

          $email=$this->input->post("email");
          $password=$this->input->post("password");
          $this->db->select('*');
          $this->db->from('users');
          $this->db->where(array('email'=>$email,'password'=>$password,'role'=>'admin'));
          $query=$this->db->get();

          if($query->num_rows()==1)
          {
            $user=$query->row();
            $userdata=array('adminid'=>$user->id,'adminemail'=>$user->email,'adminpassword'=>$user->password,'role'=>$user->role);
            $this->session->set_userdata($userdata);

            redirect("Admin/dashboard","refresh");
          }
          else
          {
             echo "<script>
            alert('Username and Password do not match!');
            window.location.href='http://aromatazeen.com/admin/';
            </script>";
          }
      }

      function admin_forgotpwd()
      {
          
          $email=$this->input->post("email");
        //  echo $email;exit;
          $this->db->select('*');
          $this->db->from('users');
          $this->db->where(array('email'=>$email,'role'=>'admin'));
          $query=$this->db->get();
          $user=$query->row();
          
          $userpwd=$user->password;
        //  echo $emprpwd;exit;
          if($user){
              $this->email->from("companyemail@gmail.com","Company Name");
              $this->email->to($email);
              $this->email->reply_to($email);
              $this->email->subject("Get Your Password");
              $this->email->message("Thanks for contacting regarding to forgot password and Password Here-  ".$userpwd);
             
              $this->email->send();
              
              echo "Successfully send your password";
          }
          else{
              echo "Something Error!";
          }
      
      }
      function deleteslideshow()
      {
          $id= $this->uri->segment(3);
		$this->Admin_model->delete("home_slideshow",'id',$id);
		redirect('Admin/allslideshow');
      }
      function delete_category()
      {
          $id= $this->uri->segment(3);
		$this->Admin_model->delete("category",'id',$id);
		redirect('Admin/category');
      }
      function delete_productcolor()
      {
          $id= $this->uri->segment(3);
		$this->Admin_model->delete("product_color",'id',$id);
		redirect('Admin/category');
      }
      function delete_categorysize()
      {
          $id= $this->uri->segment(3);
		$this->Admin_model->delete("category_size",'id',$id);
		redirect('Admin/category');
      }
      function delete_subcategory()
      {
          $id= $this->uri->segment(3);
		$this->Admin_model->delete("sub_category",'id',$id);
		redirect('Admin/category');
      }
      function delete_productphotos()
      {
          $id= $this->uri->segment(3);
		$this->Admin_model->delete("product_morephotos",'id',$id);
		redirect('Admin/product_photos');
      }
      function delete_styphotos()
      {
          $id= $this->uri->segment(3);
		$this->Admin_model->delete("stylewith_photos",'id',$id);
		redirect('Admin/product_photos');
      }
      function delete_remark()
      {
          $id= $this->uri->segment(3);
		$this->Admin_model->delete("remark",'id',$id);
		redirect('Admin/add_remark_form');  
      }
      function logout()
      {
          session_destroy();
          redirect('Admin/',"refresh");
      }

}

?>