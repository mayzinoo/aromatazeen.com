<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Paypal extends CI_Controller{ 
     
     function  __construct(){ 
        parent::__construct(); 
        error_reporting(1);  
        // Load paypal library 
        $this->load->library('paypal_lib'); 
        // Load payment model 
        $this->load->model('Payment'); 
     } 
      
    function success(){ 
      
        // Get the transaction data 
        // $paypalInfo = $this->input->get(); 
         
        // $productData = $paymentData = array(); 
        // if(!empty($paypalInfo['item']) && !empty($paypalInfo['tx']) && !empty($paypalInfo['amt']) && !empty($paypalInfo['cc']) && !empty($paypalInfo['st'])){ 
            // $item_name = $paypalInfo['item_name']; 
            // $data['item_number'] = $paypalInfo['item_number']; 
            // $data['txn_id'] = $paypalInfo["tx"]; 
            // $data['payment_amt'] = $paypalInfo["amt"]; 
            // $data['currency_code'] = $paypalInfo["cc"]; 
            // $data['status'] = $paypalInfo["st"]; 
             
            // Get product info from the database 
            // $productData = $this->Payment->getRows($item_number); 
             
            // Check if transaction data exists with the same TXN ID 
            // $paymentData = $this->Payment->getPayment(array('txn_id' => $txn_id)); 
        // } 
         
        // Pass the transaction data to view 
        // $data['product'] = $productData; 
        // $data['payment'] = $paymentData; 
        // $this->load->view('paypal/success', $data); 
        
     
     $userid=$this->session->userdata("id");
     $orderid=$this->session->userdata("orderid");
         $data['userwishlist']=$this->db->get_where("addto_wish",array("user_id"=>$userid));
        $data['userbag']=$this->db->get_where("shopping_bag",array("user_id"=>$userid,"status"=>'1'));
        $nouserip=$this->session->userdata("nouserip");
        $data['nouserbag']=$this->db->get_where("shopping_bag",array("nologin_user"=>$nouserip,"status"=>'1'));
        
        $data['menulist']=$this->db->order_by("id","asc")->get_where('category',array("status"=>'1'));
        $data['homemsg']=$this->db->get("header_msg")->row();
        
        
        $data['cashorderdata']=$this->db->limit(1)->order_by("id","desc")->get_where("orders",array('user_id'=>$userid))->row();
        $data['userdata']=$this->db->get_where("users",array('id'=>$userid))->row();                  
        $data['order'] = $this->db->limit(1)->order_by("id","desc")->get_where("orders",array('user_id'=>$userid,'id'=>$orderid))->row(); 
        // Pass order data to the view 
       
        $data['content']='paypal/success';
        $this->load->view('inner-content',$data);
    
    } 
      
     function cancel(){ 
        // Load payment failed view 
        $this->load->view('paypal/cancel'); 
     } 
      
     function ipn(){ 
                //paypal return transaction details array
                $paypalInfo = $this->input->post();
        
                // $data['user_id'] = $paypalInfo['custom'];
                // $data['product_id'] = $paypalInfo["item_number"];
                // $data['txn_id'] = $paypalInfo["txn_id"];
                // $data['payment_gross'] = $paypalInfo["amount"];
                // $data['currency_code'] = $paypalInfo["mc_currency"];
                // $data['payer_email'] = $paypalInfo["payer_email"];
                // $data['payment_status'] = $paypalInfo["payment_status"];
                
                $data['full_name']    = $paypalInfo["fullname"]; 
                $data['user_id']    = $paypalInfo["custom"]; 
                    $data['product']    = $paypalInfo["item_number"]; 
                    $data['txn_id']    = $paypalInfo["txn_id"]; 
                    $data['amount']    = $paypalInfo["amount"]; 
                    $data['paid_amount_currency']    = $paypalInfo["mc_currency"]; 
                    // $data['full_name']    = trim($paypalInfo["first_name"].' '.$paypalInfo["last_name"], ' '); 
                    $data['payer_email']    = $paypalInfo["payer_email"]; 
                    $data['status'] = $paypalInfo["payment_status"]; 
        
                $paypalURL = $this->paypal_lib->paypal_url;
                $result = $this->paypal_lib->curlPost($paypalURL, $paypalInfo);
        
                //check whether the payment is verified
                if (preg_match("/VERIFIED/i", $result)) {
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
                        
                } 
         
    }/*end ipn fun*/ 
}