<?php
if(!defined('BASEPATH'))
exit('No direct script acceess allowed');
// require_once 'dompdf/dompdf/autoload.inc.php';

// require_once 'vendor/autoload.php';
// require_once 'vendor/autoload.php';
// use Dompdf\Dompdf;
// use Dompdf\Dompdf as Dompdf;
	class Main extends CI_Controller
	{
		function __construct() 
		{
            parent::__construct();
            error_reporting(1);
            $this->load->library('stripe_lib');
            $this->load->library('Paypal_lib'); 
         
            // Load product model 
            $this->load->model('Product'); 
            $this->load->database();
            $this->load->helper('form');
            $this->load->helper('url');
            
             $this->load->library('user_agent');
            $data['browser'] = $this->agent->browser();
            $data['browser_version'] = $this->agent->version();
            $data['os'] = $this->agent->platform();
            $data['ip_address'] = $this->input->ip_address();
           $ip_address= $data['ip_address'];
            
            $nouser=array(
                    "nouserip"=>$ip_address
                    );
                $this->session->set_userdata($nouser);   
  	    }
    function index()
    {
       
        $userid=$this->session->userdata("id");
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
    //   echo $nouserip.'<br/>'.$userid;
    //   echo $userid;
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));

        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['allslideshow']=$this->db->limit(1)->get_where('products',array("remark"=>'5'));
        $data['lastestfashion']=$this->db->get('home_latest_fashion ')->row();
        $data['subcategory']=$this->db->get('sub_category ')->row();
        $data['allproducts']=$this->db->order_by('id', 'desc')->get("products");
        $data['brand']=$this->db->order_by('id', 'desc')->get("brands");
        $data['homemsg']=$this->db->get("header_msg")->row();
        
        $data['clothing']=$this->db->order_by('id', 'desc')->limit(1)->get_where("products",array("category_name"=>"Clothing"))->row();
        $data['bags']=$this->db->order_by('id', 'desc')->limit(1)->get_where("products",array("category_name"=>"Bags"))->row();
        $data['shoes']=$this->db->order_by('id', 'desc')->limit(1)->get_where("products",array("category_name"=>"Shoes"))->row();
        $data['accessories']=$this->db->order_by('id', 'desc')->limit(1)->get_where("products",array("category_name"=>"Accessories"))->row();
        $data['newarrival']=$this->db->order_by('id', 'desc')->limit(1)->get_where("products",array("remark"=>"1"))->row();
        $data['newproducts']=$this->db->order_by('id', 'desc')->limit(8)->get_where("products",array("remark"=>"1"));
        // $data['discountproducts']=$this->db->get("home_discount")->row();
        $data['discountproduct']=$this->db->limit(1)->order_by("id","desc")->get_where("products",array('remark'=>'2'))->row();
        $query = $this->db->query("SELECT * FROM products ORDER BY CAST(`addto_wishlist` AS UNSIGNED) DESC LIMIT 1");
        $data['mostviewproduct']=$query->row();
        $data['chairman']=$this->db->get("about_chairman");
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
    
        $this->load->view("template.php",$data);
    }
    public function welcome()
	{
	   $this->load->view('sample');
	   $html=$this->output->get_output();
	   $this->load->library('pdf');
	   $this->dompdf->loadHtml($html);
	   $this->dompdf->setPaper('A4','landscape');
	   $this->dompdf->render();
	   $this->dompdf->stream('welcome.pdf',array('Attachment'=>0));
	}
	function deliverycashout(){
	    $id=$this->session->userdata("id");
        $fullname=$this->input->post("fullname");
        $email=$this->input->post("email");
        $address=$this->input->post("address");
        $city=$this->input->post("city");
        $postcode=$this->input->post("postcode");
        $phone=$this->input->post("phone");
        $pitem=$this->input->post("pitem");
        $ptotal=$this->input->post("ptotal");
        $ordernote=$this->input->post("ordernote");
        $orderdata=array(  
                            "user_id"=>$id,
                              "full_name" =>$fullname,
                              "payer_email"=>$email,
                              "address1"=>$address,
                               "city"=>$city,
                               "postcode"=>$postcode,
                               "phone"=>$phone,
                              "product" =>$pitem,
                              "payment_method" =>'cash',
                              "order_date"=>date('Y-m-d'),
                              "amount" =>$ptotal,
                              "paid_amount_currency"=>'gbp',
                              "ordernote" =>$ordernote
                        );
                $this->Main_model->insert("orders",$orderdata);
                $updateshopbag=array(
                                    'status'=>'0'
                                    );
                                $this->db->where('nologin_user',$nouserip);
                                $this->db->or_where('user_id',$id);
                                $this->db->update("shopping_bag",$updateshopbag); 
                
                $data['order']=$this->db->select('orders.*')
                                    ->order_by('id','desc')
                                    ->limit(1)
                                    ->get_where("orders",array("user_id"=>$id))->row();                
                // $cmyemail="cs@aromatazeen.com";
                $cmyemail="mayzinoo2114@gmail.com";
                    $config = Array(       
                        'protocol' => 'sendmail',
                        'smtp_host' => 'your domain SMTP host',
                        'smtp_port' => 25,
                        'smtp_user' => 'SMTP Username',
                        'smtp_pass' => 'SMTP Password',
                        'smtp_timeout' => '4',
                        'mailtype'  => 'html',
                        'charset'   => 'iso-8859-1',
                        'wordwrap' => TRUE
                    );
                    $this->load->library('email', $config);
                    $this->email->set_newline("\r\n");
                    $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
                    $this->email->set_header('Content-type', 'text/html');
                     
                $this->email->from("cs@aromatazeen.com","Aroma Tazeen");
                $to_email = array($email,$cmyemail);
                $this->email->to($to_email);
                
                $this->email->subject("Thank you for your orders!");
                $body = $this->load->view('orderemail.php',$data,TRUE);
                $this->email->message($body); 
                $this->email->send();
                    
                
                redirect("Main/cash_paymentstatus");
	}
    function generate_smsotp()
    {
       
        $username = "dqh786@gmail.com";
	    $hash = "e1c5abd2372430561141e0b3a28764962dfb1a6d2974262e665ec92437752ee7";
    
    	// Config variables. Consult http://api.txtlocal.com/docs for more info.
    	$test = "0";
    	$name =$this->input->post("name");
    	// Data for text message. This is the text message data.
    	$sender = "Aroma Tazeen"; // This is who the message appears to be from.
    	$numbers = $this->input->post("num"); // A single number or a comma-seperated list of numbers
    	
    	// 612 chars or less
    	// A single number or a comma-seperated list of numbers
    	$otp=mt_rand(100000,999999);
    		setcookie("otp", $otp);
    		$message = "Hey ".$name. " your OTP IS ".$otp;
    	$message = urlencode($message);
    	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
    	$ch = curl_init('http://api.txtlocal.com/send/?');
    	curl_setopt($ch, CURLOPT_POST, true);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	$result = curl_exec($ch); // This is the re00sult from the API
    
    	curl_close($ch);
    	redirect("Main/usercheckout");
    	if(!empty($this->input->post("ver"))){
        $verotp=$this->input->post("otp");
        
        if($verotp==$_COOKIE['otp']){
        $id=$this->session->userdata("id");
        $fullname=$this->input->post("fullname");
        $email=$this->input->post("email");
        $address=$this->input->post("address");
        $city=$this->input->post("city");
        $postcode=$this->input->post("postcode");
        $phone=$this->input->post("num");
        $pitem=$this->input->post("pitem");
        $ptotal=$this->input->post("ptotal");
        $ordernote=$this->input->post("ordernote");
        
            $orderdata=array(  
                            "user_id"=>$id,
                              "full_name" =>$fullname,
                              "payer_email"=>$email,
                              "address1"=>$address,
                               "city"=>$city,
                               "postcode"=>$postcode,
                               "phone"=>$phone,
                              "product" =>$pitem,
                              "payment_method" =>'cash',
                              "order_date"=>date('Y-m-d'),
                              "amount" =>$ptotal,
                              "paid_amount_currency"=>'gbp',
                              "ordernote" =>$ordernote
                        );
                $this->Main_model->insert("orders",$orderdata);
                $updateshopbag=array(
                                    'status'=>'0'
                                    );
                                $this->db->where('nologin_user',$nouserip);
                                $this->db->or_where('user_id',$id);
                                $this->db->update("shopping_bag",$updateshopbag); 
                
                $data['order']=$this->db->select('orders.*')
                                    ->order_by('id','desc')
                                    ->limit(1)
                                    ->get_where("orders",array("user_id"=>$id))->row();                
                // $cmyemail="cs@aromatazeen.com";
                $cmyemail="mayzinoo2114@gmail.com";
                    $config = Array(       
                        'protocol' => 'sendmail',
                        'smtp_host' => 'your domain SMTP host',
                        'smtp_port' => 25,
                        'smtp_user' => 'SMTP Username',
                        'smtp_pass' => 'SMTP Password',
                        'smtp_timeout' => '4',
                        'mailtype'  => 'html',
                        'charset'   => 'iso-8859-1',
                        'wordwrap' => TRUE
                    );
                    $this->load->library('email', $config);
                    $this->email->set_newline("\r\n");
                    $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
                    $this->email->set_header('Content-type', 'text/html');
                     
                $this->email->from("cs@aromatazeen.com","Aroma Tazeen");
                $to_email = array($email,$cmyemail);
                $this->email->to($to_email);
                
                $this->email->subject("Thank you for your orders!");
                $body = $this->load->view('orderemail.php',$data,TRUE);
                $this->email->message($body); 
                $this->email->send();
                    
                
                redirect("Main/cash_paymentstatus");
        
        }else{
            echo("otp worng");
        }
        }
    
    }
    function category_products()
    {
        $userid=$this->session->userdata("id");
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        
         $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
         $categoryname=$this->uri->segment(3);
        $subcat=$this->uri->segment(4);
        $data['subcategory']=$this->db->get_where("sub_category ",array('category_name'=>$categoryname));
        
        $data['categoryproduct']=$this->db->order_by("id","desc")->get_where("products",array('category_name'=>$categoryname));
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
        $data['content']='category_products';
        $this->load->view('inner-content',$data);
    }
    function subcategory_products()
    {
        $userid=$this->session->userdata("id");
         $nouserip=$this->session->userdata("nouserip");
         $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        
        $categoryname=$this->uri->segment(3);
        $subcat=$this->uri->segment(4);
        $data['subcategory']=$this->db->get_where("sub_category ",array('category_name'=>$categoryname));
        $data['categoryproduct']=$this->db->order_by("id","desc")->get_where("products",array('category_name'=>$categoryname));
        
        $data['subcategoryproduct']=$this->db->select('products.*,sub_category.sub_category as subname')
		                            ->join('sub_category', 'products.sub_category=sub_category.id', 'left')
		                            ->get_where('products',array('sub_category.id'=>$subcat));
		$data['subcat']=$this->db->get_where('sub_category',array('id'=>$subcat))->row();
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
        $data['content']='subcategory_products';
        $this->load->view('inner-content',$data);
    }
    function discount_products()
    {
         $userid=$this->session->userdata("id");
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        
        $data['subcategory']=$this->db->select('sub_category.*')
                                    
		                            ->join('products', 'products.sub_category=sub_category.id', 'left')
		                            ->join('addto_wish', 'products.id=addto_wish.product_id', 'left')
		                            ->get_where("sub_category",array('products.remark'=>'2'));
		
        
        $data['discountproduct']=$this->db->order_by("id","desc")->get_where("products",array('remark'=>'2'));
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
        $data['content']='discount-products';
        $this->load->view('inner-content',$data);
    }
    function mostviewed_products()
    {
        $userid=$this->session->userdata("id");
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        
        $data['subcategory']=$this->db->select('sub_category.*')
                                    
		                            ->join('products', 'products.sub_category=sub_category.id', 'left')
		                            ->join('addto_wish', 'products.id=addto_wish.product_id', 'left')
		                            ->get_where("sub_category",array('products.remark'=>'2'));
		
        
        // $data['mostviewproduct']=$this->db->order_by("id","desc")->get_where("products",array('remark'=>'2'));
        $query = $this->db->query("SELECT * FROM products ORDER BY addto_wishlist DESC");
    $data['mostviewproduct']=$query;
    $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
    
        $data['content']='mostviewed-products';
        $this->load->view('inner-content',$data);
    }
    function newproducts()
    {
         $userid=$this->session->userdata("id");
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        
        $data['subcategory']=$this->db->select('sub_category.*')
                                    
		                            ->join('products', 'products.sub_category=sub_category.id', 'left')
		                            ->join('addto_wish', 'products.id=addto_wish.product_id', 'left')
		                            ->get_where("sub_category",array('products.remark'=>'1'));
		
        
        $data['newproduct']=$this->db->order_by("id","desc")->get_where("products",array('remark'=>'1'));
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
        $data['content']='newarrivalproducts';
        $this->load->view('inner-content',$data);
    }
    function newcollection()
    {
         $userid=$this->session->userdata("id");
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        
        $data['subcategory']=$this->db->select('sub_category.*')
                                    
		                            ->join('products', 'products.sub_category=sub_category.id', 'left')
		                            ->join('addto_wish', 'products.id=addto_wish.product_id', 'left')
		                            ->get_where("sub_category",array('products.remark'=>'4'));
        
        $data['newproduct']=$this->db->order_by("id","desc")->get_where("products",array('remark'=>'4'));
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
        $data['content']='newcollection';
        $this->load->view('inner-content',$data);
    }
    function brand_items()
    {
        $category=$this->uri->segment(3);
        $brandid=$this->uri->segment(4);
        $userid=$this->session->userdata("id");
        $categoryname=$this->uri->segment(3);
        $data['brand']=$this->db->get_where("brands",array("id"=>$brandid))->row();
        $brandname=$data['brand']->brand_name;
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['subcategory']=$this->db->get_where("sub_category ",array('category_name'=>$categoryname));
		$data['homemsg']=$this->db->get("header_msg")->row();                            
        
        
        $data['branditem']=$this->db->get_where("products",array("category_name"=>$category,"brand_name"=>$brandname));
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
        $data['content']='branditems';
        $this->load->view('inner-content',$data);
    }
     function mywishlist()
    {
        $userid=$this->session->userdata("id");
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        
        $data['mywishproducts']=$this->db->select('products.*')
                                    ->order_by("addto_wish.id","desc")
		                            ->join('addto_wish', 'products.id=addto_wish.product_id', 'left')
		                            ->get_where('products',array('addto_wish.user_id'=>$userid));
		                            
	    $data['subcategory']=$this->db->select('sub_category.*')
                                    
		                            ->join('products', 'products.sub_category=sub_category.id', 'left')
		                            ->join('addto_wish', 'products.id=addto_wish.product_id', 'left')
		                            ->get_where("sub_category",array('addto_wish.user_id'=>$userid));
	    $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
        $data['content']='mywishproduct';
        $this->load->view('inner-content',$data);
    }
    function productdetail()
    {
  
        $userid=$this->session->userdata("id");
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        
        $id=$this->uri->segment(3);
       
        // $userid=$this->session->userdata("id");
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['productdetail']=$this->db->get_where("products",array("id"=>$id))->row();
        $data['checkwishlist']=$this->db->get_where("addto_wish",array("product_id"=>$id,"user_id"=>$userid));
        $data['homemsg']=$this->db->get("header_msg")->row();
        
        $data['morephotos']=$this->db->order_by('id','desc')->get_where("product_morephotos",array("product_id"=>$id));
        $data['stylephotos']=$this->db->order_by('id','desc')->get_where("products",array("styledwith_pid"=>$id));
        
        $data['addtocart']=$this->db->get_where("shopping_bag",array("product_id"=>$id,"user_id"=>$userid,'status'=>'1'));
        $price= $data['productdetail']->price;
         
         $pdata=array(
                "pid"=>$id,
                "price"=>$price
                );
        $this->session->set_userdata($pdata);
        
        $data['shipdata']=$this->db->get("shipping_fee")->row();
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
        $data['content']='product-detail';
        $this->load->view('inner-content',$data);
    }
   
    function login()
    {
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
        $data['content']='login';
        $this->load->view('inner-content',$data);
    }
    function forgotpassword()
    {
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        
      $data['userdata']=$this->db->get('users')->row();
      $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
      $data['content']='forgotpassword';
      $this->load->view('inner-content',$data);
    }
    function user_resetpassword()
    {
        $email=$this->input->post("email");
      //  echo $email;exit;
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('email'=>$email));
        $query=$this->db->get();
        $user=$query->row();
        
        $userpwd=$user->password;
      //  echo $emprpwd;exit;
        if($user){
            $this->email->from("cs@aromatazeen.com","Aroma Tazeen");
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
    
    function myaccount()
    {
      if($this->session->userdata("id"))
      {
           $userid=$this->session->userdata("id");
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        
          $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
          $data['homemsg']=$this->db->get("header_msg")->row();
          
        $id=$this->session->userdata('id');
          $data['userdata']=$this->db->get_where("users",array('id'=>$id))->row();
          $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
          
          $data['content']='myaccount';
          $this->load->view('inner-content',$data);
      }
      else{
        redirect('Main/login');
      }
    }
    function cash_ordercomplete()
    {
         $userid=$this->session->userdata("id");
         $uid=$this->session->userdata("uid");
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
          
        $data['billingdata']=$this->db->get_where("user_billingdata",array('user_id'=>$userid))->row();
       $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        $data['content']='cash-ordercomplete';
        $this->load->view('inner-content',$data);
    }
    // function update_deliveryorder()
    // {
    //     $firstname=$this->input->post("firstname");
    //       $lastname=$this->input->post("lastname");
    //       $cmyname=$this->input->post("cmyname");
    //       $country=$this->input->post("country");
    //       $address=$this->input->post("address");
    //       $postcode=$this->input->post("postcode");
    //       $city=$this->input->post("city");
    //       $phone=$this->input->post("phone");
    //       $email=$this->input->post("email");
    //       $ordernote=$this->input->post("ordernote");
    //     $data=array(  
    //               "user_id"=>$newid,
    //               "full_name" =>$firstname.' '.$lastname,
    //               "payer_email" =>$email,
    //               "address1"=>$address,
    //               "city"=>$city,
    //               "postcode"=>$postcode,
    //               "product" =>$pitem,
    //               "payment_method" =>'cash',
    //              "order_date"=>date('Y-m-d'),
    //               "amount" =>$ptotal,
    //               "paid_amount_currency"=>'gbp',
    //               "phone"=>$phone,
    //               "ordernote" =>$ordernote
    //                 );
    //     $this->Main_model->insert("orders",$shiporderdata);
    //     redirect("Main/paymentstatus");
    // }
    function update_userbillingdata()
    {
     
      $newacct=$this->input->post("createacct");
     
      $shipaddress=$this->input->post("shipaddress");
      $userid=$this->session->userdata("id");
      $nouserip=$this->session->userdata("nouserip");
      
      $firstname=$this->input->post("firstname");
      $lastname=$this->input->post("lastname");
      $cmyname=$this->input->post("cmyname");
      $country=$this->input->post("country");
      $address=$this->input->post("address");
      $postcode=$this->input->post("postcode");
      $city=$this->input->post("city");
      $phone=$this->input->post("phone");
      $email=$this->input->post("email");
      $password=$this->input->post("password");
      $ordernote=$this->input->post("ordernote");

     $newfirstname=$this->input->post("newfirstname");
      $newlastname=$this->input->post("newlastname");
      $newemail=$this->input->post("newemail");
      $newcmyname=$this->input->post("newcmyname");
      $newcountry=$this->input->post("newcountry");
      $newaddress=$this->input->post("newaddress");
      $newpostcode=$this->input->post("newpostcode");
      $newcity=$this->input->post("newcity");
      $data['usercheckout']=$this->db->select('user_checkout.*')
                                                ->order_by('id','desc')
                                                ->limit(1)
                                               ->get_where("user_checkout",array("nologin_user"=>$nouserip))->row();
    $pitem= $data['usercheckout']->item;
    $ptotal=$data['usercheckout']->total;
      if(!empty($shipaddress && !empty($newacct))){
          
            $data=array(  
                  "first_name" =>$firstname,
                  "last_name" =>$lastname,
                  "email" =>$email,
                  "password" =>$password,
                  "cmyname" =>$cmyname,
                  "country" =>$country,
                  "city"=>$city,
                  "address" =>$address,
                  "postcode"=>$postcode,
                  "phone"=>$phone,
                  
                  "created_date"=>date('Y-m-d')  
                    );
                $this->db->select('*');
            	$this->db->from('users');
            	$this->db->where(array('email'=>$email));
            	$query=$this->db->get();
            	$user=$query->row();
            	$newid=$user->id;
           
                if($query->num_rows()==1)
                  {     
                      
                      $shiporderdata=array(
                          "user_id"=>$newid,
                          "full_name" =>$newfirstname.' '.$newlastname,
                          "payer_email" =>$newemail,
                          "address1"=>$newaddress,
                          "country" =>$newcountry,
                           "city"=>$newcity,
                           "postcode"=>$newpostcode,
                          "product" =>$pitem,
                          "payment_method" =>'cash',
                         "order_date"=>date('Y-m-d'),
                          "amount" =>$ptotal,
                          "paid_amount_currency"=>'gbp',
                          "phone"=>$phone,
                          "ordernote" =>$ordernote
                        );
                    $this->Main_model->insert("user_billingdata",$shiporderdata);
                    $userid=array(
                            "id"=>$newid
                            );
                    $this->session->set_userdata($userid);    
                
                    echo "<script>
                      alert('Already Registered!');
                       window.location.href='https://aromatazeen.com/Main/order_overview';
                      </script>"; 
                      
                  }
                  else{
                       $this->Main_model->insert("users",$data);
                       $this->db->select('*');
                    	$this->db->from('users');
                    	$this->db->where(array('email'=>$email));
                    	$query=$this->db->get();
                    	$user=$query->row();
                    	$newid=$user->id;
                       $shiporderdata=array(
                          "user_id"=>$newid,
                          "full_name" =>$newfirstname.' '.$newlastname,
                          "payer_email" =>$newemail,
                          "address1"=>$newaddress,
                          "country" =>$newcountry,
                           "city"=>$newcity,
                           "postcode"=>$newpostcode,
                          "product" =>$pitem,
                          "payment_method" =>'cash',
                         "order_date"=>date('Y-m-d'),
                          "amount" =>$ptotal,
                          "paid_amount_currency"=>'gbp',
                          "phone"=>$phone,
                          "ordernote" =>$ordernote
                        );
                        $this->Main_model->insert("user_billingdata",$shiporderdata);
                        $userid=array(
                                "id"=>$newid
                                );
                        $this->session->set_userdata($userid);    
                     
                        redirect("Main/order_overview"); 
                  }
	        $userid=array(
                    "id"=>$newid
                    );
            $this->session->set_userdata($userid);    
        
            redirect("Main/order_overview");  
      }
      else if(!empty($newacct)){
         
                $data=array(  
                  "first_name" =>$firstname,
                  "last_name" =>$lastname,
                  "email" =>$email,
                  "password" =>$password,
                  "cmyname" =>$cmyname,
                  "country" =>$country,
                  "city"=>$city,
                  "address" =>$address,
                  "postcode"=>$postcode,
                  "phone"=>$phone,
                  
                  "created_date"=>date('Y-m-d')  
                    );
                $this->db->select('*');
            	$this->db->from('users');
            	$this->db->where(array('email'=>$email));
            	$query=$this->db->get();
            	$user=$query->row();
            	$newid=$user->id;
            
                if($query->num_rows()==1)
                  {     
                    $orderdata=array(
                          "user_id"=>$newid,
                          "full_name" =>$firstname.' '.$lastname,
                          "payer_email" =>$email,
                          "address1"=>$address,
                          "country" =>$country,
                           "city"=>$city,
                           "postcode"=>$postcode,
                          "product" =>$pitem,
                          "payment_method" =>'cash',
                         "order_date"=>date('Y-m-d'),
                          "amount" =>$ptotal,
                          "paid_amount_currency"=>'gbp',
                          "phone"=>$phone,
                          "ordernote" =>$ordernote
                        );
                    $this->Main_model->insert("user_billingdata",$orderdata);
                    $userid=array(
                            "id"=>$newid
                            );
                    $this->session->set_userdata($userid);    
                      echo "<script>
                      alert('Already Registered!');
                      window.location.href='https://aromatazeen.com/Main/order_overview';
                      </script>"; 
                      
                
                   
                  }
                  else{
                       $this->Main_model->insert("users",$data);
                       $this->db->select('*');
                    	$this->db->from('users');
                    	$this->db->where(array('email'=>$email));
                    	$query=$this->db->get();
                    	$user=$query->row();
                    	$newid=$user->id;
                       $orderdata=array(
                          "user_id"=>$newid,
                          "full_name" =>$firstname.' '.$lastname,
                          "payer_email" =>$email,
                          "address1"=>$address,
                          "country" =>$country,
                           "city"=>$city,
                           "postcode"=>$postcode,
                          "product" =>$pitem,
                          "payment_method" =>'cash',
                         "order_date"=>date('Y-m-d'),
                          "amount" =>$ptotal,
                          "paid_amount_currency"=>'gbp',
                          "phone"=>$phone,
                          "ordernote" =>$ordernote
                        );
                        $this->Main_model->insert("user_billingdata",$orderdata);
                        $userid=array(
                            "id"=>$newid
                            );
                    $this->session->set_userdata($userid);    
                
                    redirect("Main/order_overview"); 
                  }
        	        $userid=array(
                            "id"=>$newid
                            );
                    $this->session->set_userdata($userid);    
                
                    redirect("Main/order_overview");  
        
      }
      else{
          $nonuserorderdata=array(  
                    "user_id"=>$userid,
                      "full_name" =>$firstname.' '.$lastname,
                      "address1"=>$address,
                      "country" =>$country,
                       "city"=>$city,
                       "postcode"=>$postcode,
                       "phone"=>$phone,
                      "product" =>$pitem,
                      "payment_method" =>'cash',
                     "order_date"=>date('Y-m-d'),
                      "amount" =>$ptotal,
                      "paid_amount_currency"=>'gbp',
                      "ordernote" =>$ordernote
                );
        
          $this->Main_model->insert("user_billingdata",$nonuserorderdata);
          $userid=array(
                            "id"=>$newid
                            );
                    $this->session->set_userdata($userid);    
                
                    redirect("Main/order_overview"); 
      }
      
      
    }
    function order_overview()
    {
        $userid=$this->session->userdata("id");
        $data['userdata']=$this->db->get_where("users",array("id"=>$userid))->row();
         $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        
        $data['checkout']=$this->db->select('user_checkout.*')
                                        ->order_by('id','desc')
                                        ->limit(1)
                                       ->get_where("user_checkout",array("nologin_user"=>$nouserip))->row();
       $data["billdata"] =$this->db->order_by("id","desc")->get_where('user_billingdata',array("user_id"=>$userid))->row();
      $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        $data['content']='order-overview';
        $this->load->view('inner-content',$data);
    }
    function update_deliveryorder()
    {
        $userid=$this->session->userdata("id");
        $nouserip=$this->session->userdata("nouserip");
          
          $firstname=$this->input->post("firstname");
          $lastname=$this->input->post("lastname");
          $cmyname=$this->input->post("cmyname");
          $country=$this->input->post("country");
          $address=$this->input->post("address");
          $postcode=$this->input->post("postcode");
          $city=$this->input->post("city");
          $phone=$this->input->post("phone");
          $email=$this->input->post("email");
          $ordernote=$this->input->post("ordernote");
          $sql=$this->db->query("Select * from user_checkout where nologin_user='$nouserip' or user_id='$userid' order by id desc limit 1");
          $data['usercheckout']=$sql->row();
        //   $data['usercheckout']=$this->db->select('user_checkout.*')
        //                                         ->order_by('id','desc')
        //                                         ->limit(1)
        //                                       ->get_where("user_checkout",array("nologin_user"=>$nouserip))->row();
    $pitem= $data['usercheckout']->item;
    
    $ptotal=$data['usercheckout']->total;
        $orderdata=array(  
                    "user_id"=>$userid,
                      "full_name" =>$firstname.' '.$lastname,
                      "payer_email"=>$email,
                      "address1"=>$address,
                       "city"=>$city,
                       "postcode"=>$postcode,
                       "phone"=>$phone,
                      "product" =>$pitem,
                      "payment_method" =>'cash',
                      "order_date"=>date('Y-m-d'),
                      "amount" =>$ptotal,
                      "paid_amount_currency"=>'gbp',
                      "ordernote" =>$ordernote
                );
        $this->Main_model->insert("orders",$orderdata);
        $updateshopbag=array(
                            'status'=>'0'
                            );
                        $this->db->where('nologin_user',$nouserip);
                        $this->db->or_where('user_id',$userid);
                        $this->db->update("shopping_bag",$updateshopbag); 
        
        $data['order']=$this->db->select('orders.*')
                            ->order_by('id','desc')
                            ->limit(1)
                            ->get_where("orders",array("user_id"=>$userid))->row();                
        // $cmyemail="cs@aromatazeen.com";
        $cmyemail="mayzinoo2114@gmail.com";
            $config = Array(       
                'protocol' => 'sendmail',
                'smtp_host' => 'your domain SMTP host',
                'smtp_port' => 25,
                'smtp_user' => 'SMTP Username',
                'smtp_pass' => 'SMTP Password',
                'smtp_timeout' => '4',
                'mailtype'  => 'html',
                'charset'   => 'iso-8859-1',
                'wordwrap' => TRUE
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
            $this->email->set_header('Content-type', 'text/html');
             
        $this->email->from("cs@aromatazeen.com","Aroma Tazeen");
        $to_email = array($email,$cmyemail);
        $this->email->to($to_email);
        
        $this->email->subject("Thank you for your orders!");
        $body = $this->load->view('orderemail.php',$data,TRUE);
        $this->email->message($body); 
        $this->email->send();
            
        
        redirect("Main/cash_paymentstatus");
    }
    function cash_paymentstatus()
    {
        $userid=$this->session->userdata("id");
        $uid=$this->session->userdata("uid");
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
          
        $data['cashorderdata']=$this->db->limit(1)->order_by("id","desc")->get_where("orders",array('user_id'=>$userid))->row();
        $data['userdata']=$this->db->get_where("users",array('id'=>$userid))->row();                  
        $data['order'] = $this->db->limit(1)->order_by("id","desc")->get_where("orders",array('user_id'=>$userid,'id'=>$orderid))->row();
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
        $data['content']='cash-paymentstatus';
        $this->load->view('inner-content',$data);
    }
    function insert_user()
    {
      $firstname=$this->input->post("firstname");
      $lastname=$this->input->post("lastname");
      $cmyname=$this->input->post("cmyname");
      $country=$this->input->post("country");
      $address=$this->input->post("address");
      $city=$this->input->post("city");
      $state=$this->input->post("state");
      $postcode=$this->input->post("postcode");
      $phone=$this->input->post("phone");
     
      $email=$this->input->post("email");
      $password=$this->input->post("password");

      $data=array(          
          "first_name" =>$firstname,
          "last_name" =>$lastname,
          "email" =>$email,
          "password"=>$password,
          "phone"=>$phone,
          "role"=>'customer',
          "cmyname" =>$cmyname,
          "country" =>$country,
          "address" =>$address,
          "city"=>$city,
          "state"=>$state,
          "postcode"=>$postcode,
          "created_date"=>date('Y-m-d')  
        );
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where(array('email'=>$email));
      $query=$this->db->get();

      if($query->num_rows()==1)
      {     
          echo "<script>
          alert('Already Registered!');
          window.location.href='https://aromatazeen.com/Main/login';
          </script>"; 
         //$this->Main('emplogin_form');
      }
      else{
        $this->Main_model->insert("users",$data);
        echo "<script>
          alert('Registering Successful & Login here!');
          window.location.href='https://aromatazeen.com/Main/login';
          </script>"; 
        
        
      }
      
    }
    function userlogin()
    {
          ob_start();   
        $nouserip=$this->session->userdata("nouserip");
        
          $email=$this->input->post("email");
          $password=$this->input->post("password");
          $this->db->select('*');
          $this->db->from('users');
          $this->db->where(array('email'=>$email,'password'=>$password,'role'=>'customer'));
          $query=$this->db->get();
            
          if($query->num_rows()==1)
          {
            $user=$query->row();
            $userdata=array('id'=>$user->id,'email'=>$user->email,'password'=>$user->password);
            $this->session->set_userdata($userdata);
            
            $userid=$this->session->userdata("id");
            $this->db->select('*');
            $this->db->from('shopping_bag');
            $this->db->where(array('nologin_user'=>$nouserip));
            $q=$this->db->get();
            if($q->num_rows()==1)
            {
                $d=array(
                    "user_id"=>$userid
                    );
                $this->db->where('nologin_user',$nouserip);
		        $this->db->update("shopping_bag",$d);
		         redirect("Main/myaccount","refresh"); 
            }else{
               redirect("Main/myaccount","refresh"); 
            }
            
          }
          else
          {
             echo "<script>
            alert('Username and Password do not match!');
            window.location.href='https://aromatazeen.com/Main/login';
            </script>";
          }
    }

    function update_password()
    {
      if($this->session->userdata("email") && $this->session->userdata("password"))
      {
        $id=$this->input->post("id");
        $currentpwd=$this->input->post("currentpwd");
        $newpwd=$this->input->post("newpwd");
        
        $data=array("password" =>$newpwd);
        $this->db->where('id',$id);
        $this->db->update("users",$data);

         echo "<script>
            alert('Your Password is already updated!');
            window.location.href='https://aromatazeen.com/Main/myaccount';
            </script>";


      }
      else{
        redirect('Main/login');
      }
    }
    function update_userdata()
    {
      if($this->session->userdata("email") && $this->session->userdata("password"))
      {
            $this->load->helper(array('form', 'url'));

            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            if ($this->form_validation->run() == FALSE) {
                echo "<script>
                      alert('Invalid Email');
                      window.location.href='https://aromatazeen.com/Main/myaccount';
                      </script>"; 
            } else {
                 $id=$this->input->post("id");
                  $email=$this->input->post("email");   
                  $phone=$this->input->post("phone");  
                  $firstname=$this->input->post("firstname");  
                  $lastname=$this->input->post("lastname");  
                  $cmyname=$this->input->post("cmyname");  
                  $country=$this->input->post("country");  
                  $address=$this->input->post("address");  
                  $city=$this->input->post("city");  
                  $state=$this->input->post("state");  
                  $postcode=$this->input->post("postcode");  
                  
                  $data=array(
                      "email" =>$email,
                      "phone" =>$phone,
                      "first_name" =>$firstname,
                      "last_name" =>$lastname,
                      "cmyname" =>$cmyname,
                      "country" =>$country,
                      "address" =>$address,
                      "city" =>$city,
                      "state" =>$state,
                      "postcode" =>$postcode
                      );
                  $this->db->where('id',$id);
                  $this->db->update("users",$data);
                redirect('Main/myaccount');
                   
            }           
      }
      else{
        redirect('Main/login');
      }
    }
    
    
    function addtowishlist()
    {
        if($this->session->userdata("email") && $this->session->userdata("password")){
                $productid=$this->uri->segment(3);
                $userid=$this->session->userdata("id");
                
                 $pid=array(
                "prid"=>$productid
                );
                $this->session->set_userdata($pid);
                
                $data=array(
                            "user_id "=>$userid,
                            "product_id "=>$productid
                            );
                
                $this->Main_model->insert("addto_wish",$data);
                
               
                /*hitcount*/
            	$hitqry=$this->db->query("SELECT addto_wishlist FROM products  WHERE id='$productid'");
            
            	$count=$hitqry->row_array();
        
            	if(!$this->session->userdata("hit"))
                	{
                    	$hitcount=$count["addto_wishlist"] +1;
                    	$hit=array(
                                "addto_wishlist "=>$hitcount
                                );
                            $this->session->set_userdata($hit);   
                    	// $this->session->userdata["hit"]=$count["hitcount"] +1 ;
                    	// $hit=$_SESSION["hit"];
                    
                    	$this->db->query("UPDATE products SET addto_wishlist='$hitcount' WHERE id='$productid'");
                	}
            // echo "<script>
            //           document.getElementById('wishlist-btn').innerHTML= 'Added To Wishlist';
            //           </script>"; 
            redirect('Main/productdetail/'.$this->session->userdata("prid"));
        }else{
            redirect("Main/login");
        }
            
        
    }
    function giftcard()
    {
        $userid=$this->session->userdata("id");
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
         $data['content']='giftcard';
         $this->load->view('inner-content',$data);
    }
    function company()
    {
        $userid=$this->session->userdata("id");
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
         $data['content']='company';
         $this->load->view('inner-content',$data);
    }
    function ourproducts()
    {
        $userid=$this->session->userdata("id");
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
         $data['content']='ourproducts';
         $this->load->view('inner-content',$data);
    }
    
    function ourservices()
    {
        $userid=$this->session->userdata("id");
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
         $data['content']='ourservices';
         $this->load->view('inner-content',$data);
    }
    function quality_guarantees()
    {
        $userid=$this->session->userdata("id");
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
         $data['content']='quality-guarantees';
         $this->load->view('inner-content',$data);
    }
    function oppertunitieswithus()
    {
        $userid=$this->session->userdata("id");
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
         $data['content']='oppertunitieswithus';
         $this->load->view('inner-content',$data);
    }
    function size_guide()
    {
        $userid=$this->session->userdata("id");
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
         $data['content']='size-guide';
         $this->load->view('inner-content',$data);
    }
    function faqs()
    {
        $userid=$this->session->userdata("id");
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
         $data['content']='faqs';
         $this->load->view('inner-content',$data);
    }
    function ordering_payment()
    {
        $userid=$this->session->userdata("id");
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
         $data['content']='order-payment-method';
         $this->load->view('inner-content',$data);
    }
    function shipping_delivery()
    {
        $userid=$this->session->userdata("id");
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        
        $data['shipdata']=$this->db->get("shipping_fee")->row();
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
         $data['content']='shipping-delivery';
         $this->load->view('inner-content',$data);
    }

    function exchange_returns()
    {
        $userid=$this->session->userdata("id");
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
         $data['content']='exchange-returns';
         $this->load->view('inner-content',$data);
    }
    function termsofuse()
    {
        $userid=$this->session->userdata("id");
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
         $data['content']='termsofuse';
         $this->load->view('inner-content',$data);
    }
    function privacy()
    {
        $userid=$this->session->userdata("id");
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
         $data['content']='privacy-policy';
         $this->load->view('inner-content',$data);
    }
    function cokies()
    {
        $userid=$this->session->userdata("id");
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        
         $data['content']='cokies-policy';
         $this->load->view('inner-content',$data);
    }
    function Myshoppingbag()
    {
        
            $userid=$this->session->userdata("id");
            $nouserip=$this->session->userdata("nouserip");
            
            $productid=$this->uri->segment(3);
            $price=$this->session->userdata("price");
            $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
            $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
            $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
            
            $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
            $data['homemsg']=$this->db->get("header_msg")->row();
            
            $data['userbaglist']=$this->db->select('products.*,shopping_bag.*')
                                        ->order_by("shopping_bag.id","desc")
    		                            ->join('products', 'products.id=shopping_bag.product_id', 'left')
    		                            ->get_where('shopping_bag',array('shopping_bag.user_id'=>$userid,'shopping_bag.status'=>'1'));
    		$data['nouserbaglist']=$this->db->select('products.*,shopping_bag.*')
                                        ->order_by("shopping_bag.id","desc")
    		                            ->join('products', 'products.id=shopping_bag.product_id', 'left')
    		                            ->get_where('shopping_bag',array('shopping_bag.nologin_user'=>$nouserip,'shopping_bag.status'=>'1'));
    		$data['shipfee']=$this->db->get("shipping_fee")->row();
    		$data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
             $data['content']='shoppingbag';
             $this->load->view('inner-content',$data);
       
    }
   
    function Shoppingbag()
    {
    
        $userid=$this->session->userdata("id");
        $nouserip=$this->session->userdata("nouserip");
        // echo $nouserip;exit;
        $productid=$this->uri->segment(3);
        $price=$this->session->userdata("price");
        $size=$this->input->post("size");
        
        $color=$this->input->post("color");
      
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
       
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
       if(empty($userid)){
          
           $data=array(          
                  "product_id " =>$productid,
                  "nologin_user"=>$nouserip,
                  "qty" =>'1',
                  "size" =>$size,
                  "color" =>$color,
                  "price"=>$price,
                  "status"=>'1',
                  "created_at"=>date('Y-m-d')  
                );
            
                $this->db->select('*');
            	$this->db->from('shopping_bag');
            	$this->db->where(array('nologin_user'=>$nouserip,'product_id'=>$productid,'status'=>'1'));
            	$query=$this->db->get();
            
                    	if($query->num_rows()==1)
                    	{			
                    	    echo "<script>
                    	    alert('Already Added to Cart!');
                    	     window.location.href='https://aromatazeen.com/Main/productdetail/'+$productid;
                    	    </script>"; 
                    	  
                    	}
                    	else{
                    	    $this->Main_model->insert("shopping_bag",$data);
                    	    redirect('Main/Myshoppingbag');
                    	}  
       }
       else{
           
            $data=array(          
                  "product_id " =>$productid,
                  "user_id" =>$userid,
                  "qty" =>'1',
                  "size" =>$size,
                  "color" =>$color,
                  "price"=>$price,
                  "status"=>'1',
                  "created_at"=>date('Y-m-d')  
                );
            $this->db->select('*');
            	$this->db->from('shopping_bag');
            	$this->db->where(array('user_id'=>$userid,'product_id'=>$productid,'status'=>'1'));
            	$query=$this->db->get();
            
                    	if($query->num_rows()==1)
                    	{			
                    	    echo "<script>
                    	    alert('Already Added to Cart!');
                    	     window.location.href='https://aromatazeen.com/Main/productdetail/'+$productid;
                    	    </script>"; 
                    	  
                    	}
                    	else{
                    	    $this->Main_model->insert("shopping_bag",$data);
                    	    redirect('Main/Myshoppingbag');
                    	}    
       }
                
    	   
       
    }
    function update_shoppingbag()
    {
        $userid=$this->session->userdata("id");
        $nouserip=$this->session->userdata("nouserip");
        if(!empty($this->session->userdata("id"))){
                
                $productid=$this->input->post("productid");
                $qty=$this->input->post("qty");
                $color=$this->input->post("color");
                $size=$this->input->post("size");
                $price=$this->input->post("receive");
                $alltotal=$this->input->post("alltotal");
                $shipfee=$this->input->post("shipfee");
                $total=$this->input->post("finalsum");
                $item="";
        		for($i=0;$i<count($productid);$i++)
        		{
        			$item.=$productid[$i]."#".$qty[$i]."#".$price[$i]."#".$color[$i]."#".$size[$i]."]";
        		}
            	$data=array( 
                 
                  "user_id" =>$userid,
                  "nologin_user" =>$nouserip,
                  "item"=>$item,
                  "shipping_fee"=>$shipfee,
                  "price"=>$alltotal,
                  "total"=>$total,
                  "created_date"=>date('Y-m-d')
                );
                $this->Main_model->insert("user_checkout",$data);
                redirect("Main/usercheckout");
        }else{
            
            $nouserip=$this->session->userdata("nouserip");
                $productid=$this->input->post("productid");
                $qty=$this->input->post("qty");
                $color=$this->input->post("color");
                $size=$this->input->post("size");
                $price=$this->input->post("receive");
                $alltotal=$this->input->post("alltotal");
                $shipfee=$this->input->post("shipfee");
                $total=$this->input->post("finalsum");
                $item="";
        		for($i=0;$i<count($productid);$i++)
        		{
        			$item.=$productid[$i]."#".$qty[$i]."#".$price[$i]."#".$color[$i]."#".$size[$i]."]";
        		}
            	$data=array( 
                
                  "nologin_user" =>$nouserip,
                  "item"=>$item,
                  "shipping_fee"=>$shipfee,
                  "price"=>$alltotal,
                  "total"=>$total,
                  "created_date"=>date('Y-m-d')
                );
                $this->Main_model->insert("user_checkout",$data);
            redirect("Main/checkout");
        }
    }
    function checkout(){
       
         $userid=$this->session->userdata("id");
                $data['userdata']=$this->db->get_where("users",array("id"=>$userid))->row();
                 $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
                $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
                $nouserip=$this->session->userdata("nouserip");
                $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
                
                $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
                $data['homemsg']=$this->db->get("header_msg")->row();
                
                $data['checkout']=$this->db->select('user_checkout.*')
                                                ->order_by('id','desc')
                                                ->limit(1)
                                               ->get_where("user_checkout",array("nologin_user"=>$nouserip))->row();
              $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
                $data['content']='nonuser-checkout';
                $this->load->view('inner-content',$data);
        
    }
    function usercheckout()
    {
        
        if($this->session->userdata("id")){
                $userid=$this->session->userdata("id");
               
                $data['userdata']=$this->db->get_where("users",array("id"=>$userid))->row();
                 $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
                $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
                $nouserip=$this->session->userdata("nouserip");
                $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
                
                $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
                $data['homemsg']=$this->db->get("header_msg")->row();
                
                $data['paymethod']=$this->db->get("payment_ways");
                $data['payway']=$this->db->get("payment_ways")->row();
                // $data['usercheckout']=$this->db->select('user_checkout.*')
                //                                 ->order_by('id','desc')
                //                                 ->limit(1)
                //                                 ->get_where("user_checkout",array("user_id"=>$userid))->row();
                $data['usercheckout']=$this->db->query("Select * from user_checkout where user_id='$userid' or nologin_user='$nouserip' order by id DESC limit 1")->row();                      
                $sql=$data['usercheckout'];
               if($this->input->post('stripeToken')){ 
                    // Retrieve stripe token and user info from the posted form data 
                    $postData = $this->input->post(); 
                    $postData['product'] = $sql;
                     
                    // Make payment 
                  
                        $paymentID = $this->payment($postData); 
                    
                    // If payment successful 
                    if($paymentID){ 
                        redirect('Main/payment_status/'.$paymentID); 
                    }else{ 
                        $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':''; 
                        $data['error_msg'] = 'Transaction has been failed!'.$apiError; 
                    } 
                }
               $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
                $data['content']='usercheckout';
                $this->load->view('inner-content',$data);
        }else{
            redirect("Main/login");
        }
    }
    function user_shipaddress(){
        $userid=$this->session->userdata("id");
        $data['userdata']=$this->db->get_where("users",array("id"=>$userid))->row();
         $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
                
        $data['shipdata']=$this->db->query("SELECT * from user_billingdata WHERE user_id='$userid' order by id desc Limit 1")->row();
        $data['content']='usershipaddress';
        $this->load->view('inner-content',$data);
    }
    function update_usershipdata()
    {
        $id=$this->input->post("id");
        $fullname=$this->input->post("fullname");
        $email=$this->input->post("email");
        $phone=$this->input->post("phone");
        $city=$this->input->post("city");
        $country=$this->input->post("country");
        $address=$this->input->post("address");
        $postcode=$this->input->post("postcode");
        
        $data=array(
            'full_name'=>$fullname,
            'payer_email'=>$email,
            'phone'=>$phone,
            'city'=>$city,
            'country'=>$country,
            'address1'=>$address,
            'postcode'=>$postcode
            );
        $this->db->where('id',$id);
        $this->db->update("user_billingdata",$data); 
        redirect("Main/user_shipaddress");
    }
    function sendSMS($senderID, $recipient_no, $message){
            // Request parameters array
            $requestParams = array(
                'user' => 'codexworld',
                'apiKey' => 'dssf645fddfgh565',
                'senderID' => $senderID,
                'recipient_no' => $recipient_no,
                'message' => $message
            );
            
            // Merge API url and parameters
            $apiUrl = "http://api.example.com/http/sendsms?";
            foreach($requestParams as $key => $val){
                $apiUrl .= $key.'='.urlencode($val).'&';
            }
            $apiUrl = rtrim($apiUrl, "&");
            
            // API call
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            
            $response = curl_exec($ch);
            curl_close($ch);
            
            // Return curl response
            return $response;
        }
    function verify_ph()
    {
        $statusMsg = $receipient_no = '';
        $otpDisplay = $verified = 0;
        $recipient_no = $this->input->post("phone");
        
        // Generate random verification code
        $rand_no = rand(10000, 99999);
        
        $otpData = array(
                'mobile_number' => $recipient_no,
                'verification_code' => $rand_no,
                'verified' => 0
            );
        $insert =  $this->Main_model->insert("mobile_numbers",$otpData);
       if($insert){
            // Send otp to user via SMS
            $message = 'Dear User, OTP for mobile number verification is '.$rand_no.'. Thanks CodexWorld';
            $send = sendSMS('CODEXW', $recipient_no, $message);
            
            if($send){
                $otpDisplay = 1;
            }else{
                $statusMsg = array(
                    'status' => 'error',
                    'msg' => "We're facing some issue on sending SMS, please try again."
                );
            }
        }else{
            $statusMsg = array(
                'status' => 'error',
                'msg' => 'Some problem occurred, please try again.'
            );
        }
    }
    function payment($postData){ 
      
        // If post data is not empty 
        if(!empty($postData)){ 
            // Retrieve stripe token and user info from the submitted form data 
            $token  = $postData['stripeToken'];  
            $fullname = $postData['fullname']; 
            $email = $postData['email']; 
            $address1 = $postData['address1']; 
            $address2 = $postData['address2']; 
            $city = $postData['city']; 
            $postcode = $postData['postcode']; 
            
            $phone = $postData['creditphone']; 
            
            
            $userid = $postData['userid']; 
            $pitem = $postData['pitem']; 
            $ptotal = $postData['ptotal'];
              
            // Add customer to stripe 
            $customer = $this->stripe_lib->addCustomer($email, $token); 
            
            if($customer){ 
                // Charge a credit or a debit card 
                $charge = $this->stripe_lib->createCharge($customer->id, $pitem, $ptotal); 
                
                if(!empty($charge)){ 
                  
                    // Check whether the charge is successful 
                    if($charge['amount_refunded'] == 0 && empty($charge['failure_code']) && $charge['paid'] == 1 && $charge['captured'] == 1){ 
                        // Transaction details  
                         
                        $transactionID = $charge['balance_transaction']; 
                        $paidAmount = $charge['amount']; 
                        $paidAmount = ($paidAmount/100); 
                        $paidCurrency = $charge['currency']; 
                        $payment_status = $charge['status']; 
        
        
       
                        $orderData = array( 
                            'user_id' => $userid, 
                            'payer_email' => $email, 
                            'full_name' => $fullname, 
                            'address1' => $address1, 
                            'address2' => $address2, 
                            'city' => $city, 
                            'postcode' => $postcode, 
                            'phone'=>$phone,
                            // 'verification_code' => $rand_no,
                            //     'verified' => 0,
                            'txn_id' => $transactionID, 
                            'product' => $pitem, 
                            'payment_status' => $payment_status,
                            'payment_method' => 'credit',
                            'paid_amount_currency' => $paidCurrency,
                            'order_date' => date("Y-m-d"),
                            'amount' => $ptotal,
                        ); 
                        $orderID =  $this->Main_model->insert("orders",$orderData);
                        $myquery= $this->db->order_by('id','desc')->limit(1)->get('orders')->row();
                        $orderid=array(
                                "orderid"=>$myquery->id
                                );
                        $this->session->set_userdata($orderid);   
                        
                        $updateshopbag=array(
                            'status'=>'0'
                            );
                        $this->db->where('user_id',$userid);
                        $this->db->update("shopping_bag",$updateshopbag); 
                        $data['order']=$this->db->select('orders.*')
                                            ->order_by('id','desc')
                                            ->limit(1)
                                            ->get_where("orders",array("user_id"=>$userid))->row();                
                        // $cmyemail="cs@aromatazeen.com";
                        $cmyemail="mayzinoo2114@gmail.com";
                            $config = Array(       
                                'protocol' => 'sendmail',
                                'smtp_host' => 'your domain SMTP host',
                                'smtp_port' => 25,
                                'smtp_user' => 'SMTP Username',
                                'smtp_pass' => 'SMTP Password',
                                'smtp_timeout' => '4',
                                'mailtype'  => 'html',
                                'charset'   => 'iso-8859-1',
                                'wordwrap' => TRUE
                            );
                            $this->load->library('email', $config);
                            $this->email->set_newline("\r\n");
                            $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
                            $this->email->set_header('Content-type', 'text/html');
                             
                        $this->email->from("cs@aromatazeen.com","Aroma Tazeen");
                        $to_email = array($email,$cmyemail);
                        $this->email->to($to_email);
                        
                        $this->email->subject("Thank you for your orders!");
                        $body = $this->load->view('orderemail.php',$data,TRUE);
                        $this->email->message($body); 
                        $this->email->send();
                        // If the order is successful 
                        if($payment_status == 'succeeded'){ 
                            return $orderID; 
                        } 
                    } 
                }
            } 
        } 
        return false; 
    } 
    function payment_status($id){ 
     
     $userid=$this->session->userdata("id");
     $orderid=$this->session->userdata("orderid");
         $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        
        
        $data['cashorderdata']=$this->db->limit(1)->order_by("id","desc")->get_where("orders",array('user_id'=>$userid))->row();
        $data['userdata']=$this->db->get_where("users",array('id'=>$userid))->row();                  
        $data['order'] = $this->db->limit(1)->order_by("id","desc")->get_where("orders",array('user_id'=>$userid,'id'=>$orderid))->row(); 
        // Pass order data to the view 
       $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
       
        $data['content']='payment-status';
        $this->load->view('inner-content',$data);
    } 
    function buy(){ 
    $this->load->library('Paypal_lib'); 
    // Load product model 
    $this->load->model('Payment'); 
    $this->load->database();
    $this->load->helper('form');
    $this->load->helper('url');
        $returnURL = base_url() . 'Main/success'; //payment success url
        $cancelURL = base_url() . 'Main/cancel'; //payment cancel url
        $notifyURL = base_url() . 'Main/ipn'; //ipn url  
         
        // Get product data from the database 
        $userid=$this->session->userdata("id");
        $product['usercheckout']=$this->db->select('user_checkout.*')
                                        ->order_by('id','desc')
                                        ->limit(1)
                                       ->get_where("user_checkout",array("user_id"=>$userid))->row();
        $product['userdata']=$this->db->select('*')
                                       ->get_where("users",array("id"=>$userid))->row();        
                                       
        $pitem=$product['usercheckout']->item;
        $ptotal=$product['usercheckout']->total;
        $fullname=$product['userdata']->first_name.' '.$product['userdata']->last_name;
    //   echo $pitem;exit;
        // Add fields to paypal form 
        $this->paypal_lib->add_field('return', $returnURL); 
        $this->paypal_lib->add_field('cancel_return', $cancelURL); 
        $this->paypal_lib->add_field('notify_url', $notifyURL); 
        $this->paypal_lib->add_field('fullname', $fullname); 
        $this->paypal_lib->add_field('item_name', 'Aroma Tazeen Products'); 
        $this->paypal_lib->add_field('custom', $userid); 
        $this->paypal_lib->add_field('item_number', $pitem); 
        $this->paypal_lib->add_field('amount','0.01'); 
         
        // Render paypal form 
        $this->paypal_lib->paypal_auto_form(); 
        // redirect("Main/success");
    } 
    function success(){ 
         $this->load->library('Paypal_lib'); 
    // Load product model 
    $this->load->model('Payment'); 
    $this->load->database();
    $this->load->helper('form');
    $this->load->helper('url');
     $userid=$this->session->userdata("id");
     $orderid=$this->session->userdata("orderid");
         $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        
        
        $data['cashorderdata']=$this->db->limit(1)->order_by("id","desc")->get_where("orders",array('user_id'=>$userid))->row();
        $data['userdata']=$this->db->get_where("users",array('id'=>$userid))->row();                  
        $data['order'] = $this->db->limit(1)->order_by("id","desc")->get_where("orders",array('user_id'=>$userid,'id'=>$orderid))->row(); 
        // Pass order data to the view 
       $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        $data['content']='paypal/success';
        $this->load->view('inner-content',$data);
    
    } 
      
     function cancel(){ 
          $this->load->library('Paypal_lib'); 
    // Load product model 
    $this->load->model('Payment'); 
    $this->load->database();
    $this->load->helper('form');
    $this->load->helper('url');
        // Load payment failed view 
        $this->load->view('paypal/cancel'); 
     } 
      
     function ipn(){ 
          $this->load->library('Paypal_lib'); 
    // Load product model 
    $this->load->model('Payment'); 
    $this->load->database();
    $this->load->helper('form');
    $this->load->helper('url');
                //paypal return transaction details array
                $paypalInfo = $this->input->post();
        
                // $data['user_id'] = $paypalInfo['custom'];
                // $data['product_id'] = $paypalInfo["item_number"];
                // $data['txn_id'] = $paypalInfo["txn_id"];
                // $data['payment_gross'] = $paypalInfo["amount"];
                // $data['currency_code'] = $paypalInfo["mc_currency"];
                // $data['payer_email'] = $paypalInfo["payer_email"];
                // $data['payment_status'] = $paypalInfo["payment_status"];
                
                // $data['full_name']= $paypalInfo["fullname"]; 
                $data['user_id']= $paypalInfo['custom'];
                    $data['product']= $paypalInfo["item_number"]; 
                    $data['txn_id']= $paypalInfo["txn_id"]; 
                    $data['amount']= $paypalInfo["amount"];
                    $data['payment_method']= 'paypal';
                    $data['paid_amount_currency']= $paypalInfo["mc_currency"]; 
                    // $data['full_name']    = trim($paypalInfo["first_name"].' '.$paypalInfo["last_name"], ' '); 
                    $data['payer_email']= $paypalInfo["payer_email"];
                    $data['order_status'] = $paypalInfo["payment_status"];
        
                $paypalURL = $this->paypal_lib->paypal_url;
                $result = $this->paypal_lib->curlPost($paypalURL, $paypalInfo);
        
                //check whether the payment is verified
               
                    //insert the transaction data into the database
                    $this->Payment->insertTransaction($data);
                   
                    
                    $userid=$paypalInfo["custom"]; 
                    $myquery= $this->db->order_by('id','desc')->limit(1)->get('orders')->row();
                        $orderid=array(
                                "orderid"=>$myquery->id
                                );
                        $this->session->set_userdata($orderid);   
                        
                        $updateshopbag=array(
                            'status'=>'0'
                            );
                        $this->db->where('user_id',$userid);
                        $this->db->update("shopping_bag",$updateshopbag); 
                        $data['order']=$this->db->select('orders.*')
                                            ->order_by('id','desc')
                                            ->limit(1)
                                            ->get_where("orders",array("user_id"=>$userid))->row();                
                        // $cmyemail="cs@aromatazeen.com";
                        $cmyemail="mayzinoo2114@gmail.com";
                            $config = Array(       
                                'protocol' => 'sendmail',
                                'smtp_host' => 'your domain SMTP host',
                                'smtp_port' => 25,
                                'smtp_user' => 'SMTP Username',
                                'smtp_pass' => 'SMTP Password',
                                'smtp_timeout' => '4',
                                'mailtype'  => 'html',
                                'charset'   => 'iso-8859-1',
                                'wordwrap' => TRUE
                            );
                            $this->load->library('email', $config);
                            $this->email->set_newline("\r\n");
                            $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
                            $this->email->set_header('Content-type', 'text/html');
                             
                        $this->email->from("cs@aromatazeen.com","Aroma Tazeen");
                        $to_email = array($email,$cmyemail);
                        $this->email->to($to_email);
                        
                        $this->email->subject("Thank you for your orders!");
                        $body = $this->load->view('orderemail.php',$data,TRUE);
                        $this->email->message($body); 
                        $this->email->send();
                        // If the order is successful 
                        
                 
         
    }/*end ipn fun*/ 
    function orderhistory()
    {
        $userid=$this->session->userdata("id");
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        $data['myorders'] = $this->db->order_by('id','desc')->get_where("orders",array('user_id'=>$userid));
        $data['content']='orderhistory';
        $this->load->view('inner-content',$data);
    }
    public function shoppingitem_delete()
	{
	    $id= $this->uri->segment(3);
		$this->Main_model->delete("shopping_bag",'id',$id);
		redirect('Main/Myshoppingbag');
	}
	function search_items()
	{
	    if($this->input->post('submit')==true)
        {
    	    $itemname=$this->input->post("itemname");
    	    $userdata=array(
    	    'itemname'=>$itemname
    	    );
    	    $this->session->set_userdata($userdata);
        }
        else{
            $itemname=$this->session->userdata("itemname");
        }
        if(!empty($itemname))
        {
            $query = $this->db->query("Select * from products where product_name LIKE'%$itemname%' OR category_name LIKE'%$itemname%' OR brand_name LIKE'%$itemname%' order by id DESC");
        }
        elseif(empty($itemname))
        {
            $query = $this->db->query("Select * from products order by id desc");
        }
        $userid=$this->session->userdata("id");
        $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        $data['cmylogo']=$this->db->get_where("users",array("role"=>'admin'))->row();
        $data['menulist']=$this->db->order_by("sort_id","asc")->get_where('category',array("status"=>'1'));
        $data['subcategory']=$this->db->get("sub_category");
        $data['homemsg']=$this->db->get("header_msg")->row();
        
            if($query->num_rows()>=1)
        	{
        	    $data["message"]="";
                $data["searchlists"]=$query;
                 $data["content"]='search-items';
                $this->load->view("inner-content",$data);
        	}
        	else{
        		$data["message"]="0 search results found for : ".$itemname;
        		$data["content"]="nodata";
        		$this->load->view("inner-content",$data);
        	}
	}
    function logout()
    {
        session_destroy();
        redirect('Main/',"refresh");
    }

	}
?>