<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sharemarket extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		$this->load->database(); // load database
	}
	public function index()
	{
		  
		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
	}
	public function companyProfile()
	{
		 
		$this->load->view('header');
		$this->load->view('company-profile');
		$this->load->view('footer');
	}
	public function services()
	{
		 
		$this->load->view('header');
		$this->load->view('services');
		$this->load->view('footer');
	}
	public function serviceDetails()
	{
		 
		$service_name =  urldecode($this->uri->segment(2));

		$this->db->select("*");
		$this->db->from('services');
		$this->db->where('service_name',$service_name);
		$this->db->where('status',1);
		$query = $this->db->get();
		$rs['data'] =  $query->result();
		$rs['name'] = $service_name;
		$this->load->view('header');
		$this->load->view('service-details',$rs);
		$this->load->view('footer');

	}
	public function payment()
	{
		 
		$this->load->view('header');
		$this->load->view('payment');
		$this->load->view('footer');
	}
	public function freeTrial()
	{
		 
		$this->load->view('header');
		$this->load->view('free-trial');
		$this->load->view('footer');
	}
	public function pastRecord()
	{
		$this->db->select("*");
		$this->db->from('past_performance');
		$this->db->where('status',1);
		$query = $this->db->get();
		$row['data'] = $query->result();


		
		$this->load->view('header');
		$this->load->view('past-performance',$row);
		$this->load->view('footer');
	}
	 

	public function get_pricing($service_name='',$service_duration='')
	{
		//echo $service_duration;
		$this->db->select("*");
		$this->db->from('services_price');
		$this->db->where('service_name',$service_name);
		$this->db->where('service_duration',$service_duration);
		$this->db->where('status',1);
		$query = $this->db->get();
		$rs =  $query->result();

		echo (isset($rs[0]->service_price))?$rs[0]->service_price:'';
	}

	public function pricing()
	{ 
  		$this->load->view('header');
		$this->load->view('pricing');
		$this->load->view('footer');
	}
	public function startTrial()
	{
		 
		if ($this->input->is_ajax_request()) { 

		$data=array(
			'name' =>$this->input->post('name'),
			'email'    =>$this->input->post('email'),
			'phone' => $this->input->post('phone'),   
			'city' => $this->input->post('city'),    
			'date'=>date('d-M-Y')
		);
		  
		$rs = $this->db->insert('free_trial',$data);
		 if($rs){
		 	echo  "We will contact you shortly";
		 }else
		 {
		 	echo  "0";
		 }
		}else
		{
			echo "0";
		} 
	} 

	public function specialRecommendation()
	{ 
  		$this->load->view('header');
		$this->load->view('special-recommendation');
		$this->load->view('footer');
	}

	public function riskAnalysis()
	{ 
  		$this->load->view('header');
		$this->load->view('risk-analysis');
		$this->load->view('footer');
	}

	public function kyc()
	{ 
  		$data['kyc'] = '';
		if ($this->input->server('REQUEST_METHOD') == 'POST')
  		{
  			$data=array(
				'service' =>$this->input->post('service'),
				'card_number'    =>$this->input->post('card_number'),
				'address' => $this->input->post('address'),
				'dob' => $this->input->post('dob'),  
		  );
		  
		$rs = $this->db->insert('kyc',$data);
		if($rs)
		{
			$data['kyc'] = 1; 
 
$config['crlf'] = '\r\n';    
$config['newline'] = "\r\n";
$config['mailtype'] = 'html';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;
$ci->load->library('email',$config);
            
                     $msg =  "Hello ,
                                  My card number is ".$data['card_number']." and DOB is '".$data['dob']."'
                                  MY Address :
                                  '".$data['address']."'";
                    $this->email->from('noreply@hrs.com');
                    $this->email->to('info@heavenresearchsecurity.com'); 
                    $this->email->subject('KYC FORM REQUEST');
                    $this->email->message(nl2br($msg));  
      
                    $this->email->send();
                  

		 }
  		}
  		$this->load->view('header');
		$this->load->view('kyc',$data);
		$this->load->view('footer');
	}

	public function complaintSuggestion()
	{ 
  		$data['comments'] = '';
		if ($this->input->server('REQUEST_METHOD') == 'POST')
  		{
  			$data=array(
			'name' =>$this->input->post('name'),
			'email'    =>$this->input->post('email'),
			'comments' => $this->input->post('comments'),  
			 
		  );
		  
		$rs = $this->db->insert('complain',$data);
		if($rs)
		{
			$data['comments'] = 1;

               
 
$config['crlf'] = '\r\n';    
$config['newline'] = "\r\n";
$config['mailtype'] = 'html';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;
$ci->load->library('email',$config);
            
                     $msg =  "Hello ,
                                  My name is  ".$data['name']." I would like to inform you that  
                                  '".$data['comments']."'";
                    $this->email->from($data['email']);
                    $this->email->to('info@heavenresearchsecurity.com'); 
                    $this->email->subject('Complain and Suggestion');
                    $this->email->message(nl2br($msg));  
      
                    $this->email->send();


		}
  		}

  		$this->load->view('header');
		$this->load->view('complaint-suggestion',$data);
		$this->load->view('footer');
	}
public function termOfUse()
	{ 
  		$this->load->view('header');
		$this->load->view('term-of-use');
		$this->load->view('footer');
	}

	public function privacyPolicy()
	{ 
  		$this->load->view('header');
		$this->load->view('privacy-policy');
		$this->load->view('footer');
	}

	public function disclaimerPolicy()
	{ 
  		$this->load->view('header');
		$this->load->view('disclaimer-policy');
		$this->load->view('footer');
	}

	public function refundCancellationPolicy()
	{ 
  		$this->load->view('header');
		$this->load->view('refund-cancellation-policy');
		$this->load->view('footer');
	}

	public function contactUs()
	{ 
  		$this->load->view('header');
		$this->load->view('contact-us');
		$this->load->view('footer');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */