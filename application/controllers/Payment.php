<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

	// constructor
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->library('stripegateway');
	}
	

	function stripe_payment($plan_id = '') {
		if (isset($_POST['stripeToken'])) {
			
			$plan_name				=	$this->db->get_where('plan', array('plan_id'=>$plan_id))->row()->name;
			$plan_price				=	$this->db->get_where('plan', array('plan_id'=>$plan_id))->row()->price;
			$charging_amount		=	$plan_price * 100;
			$stripe_token			=	$_POST['stripeToken'];
			$stripe_secret_key		=	$this->db->get_where('settings',array('type'=>'stripe_secret_key'))->row()->description;
			
			
			
			$stripe_data['stripe_token']	=	$stripe_token;
			$stripe_data['amount']			=	$charging_amount;
			$stripe_data['description'] 	= 	$plan_name;
			$stripe_data['stripe_secret_key']= 	$stripe_secret_key;

			// after token generated, payment completed here
			$this->stripegateway->checkout($stripe_data);

			// insert databse of payment info
			$data['plan_id']			=	$plan_id;
			$data['user_id']			=	$this->session->userdata('user_id');
			$data['paid_amount']		=	$plan_price;
			$data['payment_timestamp']	=	strtotime(date("Y-m-d H:i:s"));
			$data['timestamp_from']		=	strtotime(date("Y-m-d H:i:s"));
			$data['timestamp_to']		=	strtotime('+30 days', $data['timestamp_from']);
			$data['payment_method']		=	'stripe';
			$data['payment_details']	=	$stripe_token;
			$data['status']				=	1;
			$this->db->insert('subscription' , $data);
			
			// redirect to account page after payment successfull
			$this->session->set_flashdata('payment_status', 'success');
			redirect(base_url().'index.php?browse/youraccount' , 'refresh');
		}
		
	}
	
	function paypal_payment($task = '')
	{
		if ($task == 'paypal_post')
		{
			$plan_id		=	$this->input->post('plan_id');
			$user_id		=	$this->session->userdata('user_id');

			$item_name		=	$this->db->get_where('plan', array('plan_id'=>$plan_id))->row()->name;
			$amount			=	$this->db->get_where('plan', array('plan_id'=>$plan_id))->row()->price;
			$custom			=	'plan_id='.$plan_id.'&user_id='.$user_id;
			$business		=	$this->db->get_where('settings',array('type'=>'paypal_merchant_email'))->row()->description;
			$notify_url		=	base_url() . 'index.php?payment/paypal_payment/paypal_ipn';
			$cancel_return	=	base_url() . 'index.php?payment/paypal_payment/paypal_cancel';
			$return			=	base_url() . 'index.php?payment/paypal_payment/paypal_success';

			$this->paypal->add_field('rm', 				2);
			$this->paypal->add_field('no_note', 		0);
			$this->paypal->add_field('item_name', 		$item_name);
			$this->paypal->add_field('amount', 			$amount);
			$this->paypal->add_field('currency_code', 	'USD');
			$this->paypal->add_field('custom', 			$custom);
			$this->paypal->add_field('business', 		$business);
			$this->paypal->add_field('notify_url', 		$notify_url);
			$this->paypal->add_field('cancel_return',	$cancel_return);
			$this->paypal->add_field('return',			$return);

			
			$this->paypal->submit_paypal_post();
		}
		
		else if ($task == 'paypal_ipn')
		{
			if ($this->paypal->validate_ipn() == true) 
			{
                $ipn_response = '';
                foreach ($_POST as $key => $value) {
                    $value = urlencode(stripslashes($value));
                    $ipn_response .= "\n$key=$value";
                }
				
				$custom	=	$_POST['custom'];
				parse_str($custom,$_MYVAR);
				$data['plan_id']			=	$_MYVAR['plan_id'];
				$data['user_id']			=	$_MYVAR['user_id'];
				
				$data['paid_amount']		=	$this->db->get_where('plan', array('plan_id'=>$_MYVAR['plan_id']))->row()->price;
				$data['payment_timestamp']	=	strtotime(date("Y-m-d H:i:s"));
				$data['timestamp_from']		=	strtotime(date("Y-m-d H:i:s"));
				$data['timestamp_to']		=	strtotime('+30 days', $data['timestamp_from']);
				$data['payment_method']		=	'paypal';
				$data['payment_details']	=	$ipn_response;
				$data['status']				=	1;
				
                $this->db->insert('subscription' , $data);
            }
		}
		
		else if ($task == 'paypal_cancel')
		{
			$this->session->set_flashdata('payment_status', 'cancelled');
			redirect(base_url().'index.php?browse/youraccount' , 'refresh');
		}
		
		else if ($task == 'paypal_success')
		{
			$this->session->set_flashdata('payment_status', 'success');
			redirect(base_url().'index.php?browse/youraccount' , 'refresh');
		}
		
	}
	
	

}
