<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crud_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

	/*
	* SETTINGS QUERIES
	*/
	function get_settings($type)
	{
		$description	=	$this->db->get_where('settings', array('type'=>$type))->row()->description;
		return $description;
	}

	/*
	* PLANS QUERIES
	*/

	function get_active_plans()
	{
		$this->db->where('status', 1);
		$query 		=	 $this->db->get('plan');
        return $query->result_array();
	}

	function get_active_theme()
	{
		$theme	=	$this->get_settings('theme');
		return $theme;
	}

	/*
	* check if a video should be embedded in iframe or in jwplayer
	* if the video is youtube url, it will go for jwplayer
	* if the video has .mp4 extension, it will go for jwplayer
	* else all videos will go for iframe embedding option
	*/
	function is_iframe($video_url)
	{
		$iframe_embed	=	true;
		if (strpos($video_url, 'youtube.com')) {
			$iframe_embed = false;
		}

		$path_info 		=	pathinfo($video_url);
		$extension		=	$path_info['extension'];
		if ($extension == 'mp4') {
			$iframe_embed = false;
		}
		return $iframe_embed;
	}

	/*
	* USER QUERIES
	*/
	function signup_user()
	{
		$data['email'] 		= $this->input->post('email');
		$data['password'] 	= sha1($this->input->post('password'));
		$data['type'] 		= 0; // user type = customer

		$this->db->where('email' , $data['email']);
		$this->db->from('user');
        $total_number_of_matching_user = $this->db->count_all_results();
		// validate if duplicate email exists
        if ($total_number_of_matching_user == 0) {
			$this->db->insert('user' , $data);
			$user_id	=	$this->db->insert_id();

			// create a free subscription for premium package for 30 days
			$trial_period	=	$this->get_settings('trial_period');
			if($trial_period == 'on') {
				$this->create_free_subscription($user_id);
			}

            $this->signin($this->input->post('email') , $this->input->post('password'));
			$this->session->set_flashdata('signup_result', 'success');

			return true;
        }
		else {
			$this->session->set_flashdata('signup_result', 'failed');
			return false;
		}

	}

	// create a free subscription for premium package for 30 days
	function create_free_subscription($user_id = '')
	{
		$trial_period_days			=	$this->get_settings('trial_period_days');
		$increment_string			=	'+' . $trial_period_days . ' days';

		$data['plan_id']			=	3;
		$data['user_id']			=	$user_id;
		$data['paid_amount']		=	0;
		$data['payment_timestamp']	=	strtotime(date("Y-m-d H:i:s"));
		$data['timestamp_from']		=	strtotime(date("Y-m-d H:i:s"));
		$data['timestamp_to']		=	strtotime($increment_string, $data['timestamp_from']);
		$data['payment_method']		=	'FREE';
		$data['payment_details']	=	'';
		$data['status']				=	1;
		$this->db->insert('subscription' , $data);
	}


	function signin($email, $password)
	{
		$credential = array('email' => $email, 'password' => sha1($password));
		$query = $this->db->get_where('user', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('user_login_status', '1');
            $this->session->set_userdata('user_id', $row->user_id);
            $this->session->set_userdata('login_type', $row->type); // 1=admin, 0=customer
            return true;
        }
		else {
			$this->session->set_flashdata('signin_result', 'failed');
			return false;
		}
	}

	// returns currently active subscription_id, or false if no active found
	function validate_subscription()
	{
		$user_id			=	$this->session->userdata('user_id');
		$timestamp_current	=	strtotime(date("Y-m-d H:i:s"));
		$this->db->where('user_id', $user_id);
		$this->db->where('timestamp_to >' ,  $timestamp_current);
		$this->db->where('timestamp_from <' ,  $timestamp_current);
		$this->db->where('status' ,  1);
		$query				=	$this->db->get('subscription');
		if ($query->num_rows() > 0) {
            $row = $query->row();
			$subscription_id	=	$row->subscription_id;
			return $subscription_id;
		}
        else if ($query->num_rows() == 0) {
			return false;
		}
	}

	function get_subscription_detail($subscription_id)
	{
		$this->db->where('subscription_id', $subscription_id);
		$query 		=	 $this->db->get('subscription');
        return $query->result_array();
	}

	function get_current_plan_id()
	{
		// CURRENT SUBSCRIPTION ID
		$subscription_id			=	$this->crud_model->validate_subscription();
		// CURRENT SUBSCCRIPTION DETAIL
		$subscription_detail		=	$this->crud_model->get_subscription_detail($subscription_id);
		foreach ($subscription_detail as $row)
			$current_plan_id		=	$row['plan_id'];
		return $current_plan_id;
	}

	function get_subscription_of_user($user_id = '')
	{
		$this->db->where('user_id', $user_id);
        $query = $this->db->get('subscription');
        return $query->result_array();
	}

	function get_active_plan_of_user($user_id = '')
	{
		$timestamp_current	=	strtotime(date("Y-m-d H:i:s"));
		$this->db->where('user_id', $user_id);
		$this->db->where('timestamp_to >' ,  $timestamp_current);
		$this->db->where('timestamp_from <' ,  $timestamp_current);
		$this->db->where('status' ,  1);
		$query				=	$this->db->get('subscription');
		if ($query->num_rows() > 0) {
            $row = $query->row();
			$subscription_id	=	$row->subscription_id;
			return $subscription_id;
		}
        else if ($query->num_rows() == 0) {
			return false;
		}
	}

	function get_subscription_report($month, $year)
	{
		$first_day_this_month 			= 	date('01-m-Y' , strtotime($month." ".$year));
		$last_day_this_month  			= 	date('t-m-Y' , strtotime($month." ".$year));
		$timestamp_first_day_this_month	=	strtotime($first_day_this_month);
		$timestamp_last_day_this_month	=	strtotime($last_day_this_month);

		$this->db->where('payment_timestamp >' , $timestamp_first_day_this_month);
		$this->db->where('payment_timestamp <' , $timestamp_last_day_this_month);
		$subscriptions = $this->db->get('subscription')->result_array();

		return $subscriptions;
	}

	function get_current_user_detail()
	{
		$user_id	=	$this->session->userdata('user_id');
		$user_detail=	$this->db->get_where('user', array('user_id'=>$user_id))->row();
		return $user_detail;
	}

	function get_username_of_user($user_number)
	{
		$user_id	=	$this->session->userdata('user_id');
		$username	=	$this->db->get_where('user', array('user_id'=>$user_id))->row()->$user_number;
		return $username;
	}

	function get_genres()
	{
		$query 		=	 $this->db->get('genre');
        return $query->result_array();
	}

	function paginate($base_url, $total_rows, $per_page, $uri_segment)
	{
        $config = array('base_url' => $base_url,
            'total_rows' => $total_rows,
            'per_page' => $per_page,
            'uri_segment' => $uri_segment);

        $config['first_link'] = '<i class="fa fa-angle-double-left" aria-hidden="true"></i>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '<i class="fa fa-angle-left" aria-hidden="true"></i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        return $config;
    }

	function get_movies($genre_id, $limit = NULL, $offset = 0)
	{

        $this->db->order_by('movie_id', 'desc');
        $this->db->where('genre_id', $genre_id);
        $query = $this->db->get('movie', $limit, $offset);
        return $query->result_array();
    }

	function create_movie()
	{
		$data['title']				=	$this->input->post('title');
		$data['description_short']	=	$this->input->post('description_short');
		$data['description_long']	=	$this->input->post('description_long');
		$data['year']				  =	$this->input->post('year');
		$data['rating']				=	$this->input->post('rating');
		$data['genre_id']			=	$this->input->post('genre_id');
		$data['featured']			=	$this->input->post('featured');
		$data['url']				  =	$this->input->post('url');
		$data['trailer_url']  =	$this->input->post('trailer_url');

		$actors						=	$this->input->post('actors');
		$actor_entries				=	array();
		$number_of_entries			=	sizeof($actors);
		for ($i = 0; $i < $number_of_entries ; $i++)
		{
			array_push($actor_entries, $actors[$i]);
		}
		$data['actors']				=	json_encode($actor_entries);

		$this->db->insert('movie', $data);
		$movie_id = $this->db->insert_id();
		move_uploaded_file($_FILES['thumb']['tmp_name'], 'assets/global/movie_thumb/' . $movie_id . '.jpg');
		move_uploaded_file($_FILES['poster']['tmp_name'], 'assets/global/movie_poster/' . $movie_id . '.jpg');

	}

	function update_movie($movie_id = '')
	{
		$data['title']				=	$this->input->post('title');
		$data['description_short']	=	$this->input->post('description_short');
		$data['description_long']	=	$this->input->post('description_long');
		$data['year']				=	$this->input->post('year');
		$data['rating']				=	$this->input->post('rating');
		$data['genre_id']			=	$this->input->post('genre_id');
		$data['featured']			=	$this->input->post('featured');
		$data['url']				=	$this->input->post('url');
    $data['trailer_url']  =	$this->input->post('trailer_url');

		$actors						=	$this->input->post('actors');
		$actor_entries				=	array();
		$number_of_entries			=	sizeof($actors);
		for ($i = 0; $i < $number_of_entries ; $i++)
		{
			array_push($actor_entries, $actors[$i]);
		}
		$data['actors']				=	json_encode($actor_entries);

		$this->db->update('movie', $data, array('movie_id'=>$movie_id));

		move_uploaded_file($_FILES['thumb']['tmp_name'], 'assets/global/movie_thumb/' . $movie_id . '.jpg');
		move_uploaded_file($_FILES['poster']['tmp_name'], 'assets/global/movie_poster/' . $movie_id . '.jpg');

	}

	function create_series()
	{
		$data['title']				=	$this->input->post('title');
		$data['trailer_url']	=	$this->input->post('series_trailer_url');
		$data['description_short']	=	$this->input->post('description_short');
		$data['description_long']	=	$this->input->post('description_long');
		$data['year']				=	$this->input->post('year');
		$data['rating']				=	$this->input->post('rating');
		$data['genre_id']			=	$this->input->post('genre_id');

		$actors						=	$this->input->post('actors');
		$actor_entries				=	array();
		$number_of_entries			=	sizeof($actors);
		for ($i = 0; $i < $number_of_entries ; $i++)
		{
			array_push($actor_entries, $actors[$i]);
		}
		$data['actors']				=	json_encode($actor_entries);

		$this->db->insert('series', $data);
		$series_id = $this->db->insert_id();
		move_uploaded_file($_FILES['thumb']['tmp_name'], 'assets/global/series_thumb/' . $series_id . '.jpg');
		move_uploaded_file($_FILES['poster']['tmp_name'], 'assets/global/series_poster/' . $series_id . '.jpg');

	}

	function update_series($series_id = '')
	{
		$data['title']				=	$this->input->post('title');
		$data['trailer_url']				=	$this->input->post('series_trailer_url');
		$data['description_short']	=	$this->input->post('description_short');
		$data['description_long']	=	$this->input->post('description_long');
		$data['year']				=	$this->input->post('year');
		$data['rating']				=	$this->input->post('rating');
		$data['genre_id']			=	$this->input->post('genre_id');

		$actors						=	$this->input->post('actors');
		$actor_entries				=	array();
		$number_of_entries			=	sizeof($actors);
		for ($i = 0; $i < $number_of_entries ; $i++)
		{
			array_push($actor_entries, $actors[$i]);
		}
		$data['actors']				=	json_encode($actor_entries);

		$this->db->update('series', $data, array('series_id'=>$series_id));
		move_uploaded_file($_FILES['thumb']['tmp_name'], 'assets/global/series_thumb/' . $series_id . '.jpg');
		move_uploaded_file($_FILES['poster']['tmp_name'], 'assets/global/series_poster/' . $series_id . '.jpg');

	}

	function get_series($genre_id, $limit = NULL, $offset = 0)
	{

        $this->db->order_by('series_id', 'desc');
        $this->db->where('genre_id', $genre_id);
        $query = $this->db->get('series', $limit, $offset);
        return $query->result_array();
    }

	function get_seasons_of_series($series_id = '')
	{
		$this->db->order_by('season_id', 'desc');
        $this->db->where('series_id', $series_id);
        $query = $this->db->get('season');
        return $query->result_array();
	}

	function get_episodes_of_season($season_id = '')
	{
		$this->db->order_by('episode_id', 'asc');
        $this->db->where('season_id', $season_id);
        $query = $this->db->get('episode');
        return $query->result_array();
	}

    function get_episode_details_by_id($episode_id = "") {
        $episode_details = $this->db->get_where('episode', array('episode_id' => $episode_id))->row_array();
        return $episode_details;
    }

	function create_actor()
	{
		$data['name']				=	$this->input->post('name');
		$this->db->insert('actor', $data);
		$actor_id = $this->db->insert_id();
		move_uploaded_file($_FILES['thumb']['tmp_name'], 'assets/global/actor/' . $actor_id . '.jpg');
	}

	function update_actor($actor_id = '')
	{
		$data['name']				=	$this->input->post('name');
		$this->db->update('actor', $data, array('actor_id'=>$actor_id));
		move_uploaded_file($_FILES['thumb']['tmp_name'], 'assets/global/actor/' . $actor_id . '.jpg');
	}

	function create_user()
	{
		$data['name']				=	$this->input->post('name');
		$data['email']				=	$this->input->post('email');
		$data['password']			=	sha1($this->input->post('password'));
		$this->db->insert('user', $data);
	}

	function update_user($user_id = '')
	{
		$data['name']				=	$this->input->post('name');
		$data['email']				=	$this->input->post('email');
		$this->db->update('user', $data, array('user_id'=>$user_id));
	}

    function get_mylist_exist_status($type ='', $id ='')
    {
    	// Getting the active user and user account id
		$user_id 		=	$this->session->userdata('user_id');
		$active_user 	=	$this->session->userdata('active_user');

		// Choosing the list between movie and series
		if ($type == 'movie')
			$list_field	=	$active_user.'_movielist';
		else if ($type == 'series')
			$list_field	=	$active_user.'_serieslist';

		// Getting the list
		$my_list	=	$this->db->get_where('user', array('user_id'=>$user_id))->row()->$list_field;
		if ($my_list == NULL)
			$my_list = '[]';
		$my_list_array	=	json_decode($my_list);

		// Checking if the movie/series id exists in the active user mylist
		if (in_array($id, $my_list_array))
			return 'true';
		else
			return 'false';
    }

	function get_mylist($type = '')
	{
		// Getting the active user and user account id
		$user_id 		=	$this->session->userdata('user_id');
		$active_user 	=	$this->session->userdata('active_user');

		// Choosing the list between movie and series
		if ($type == 'movie')
			$list_field	=	$active_user.'_movielist';
		else if ($type == 'series')
			$list_field	=	$active_user.'_serieslist';

		// Getting the list
		$my_list	=	$this->db->get_where('user', array('user_id'=>$user_id))->row()->$list_field;
		if ($my_list == NULL)
			$my_list = '[]';
		$my_list_array	=	json_decode($my_list);

		return $my_list_array;
	}

	function get_search_result($type = '', $search_key = '')
	{
		$this->db->like('title', $search_key);
		$query	=	$this->db->get($type);
		return $query->result_array();
	}

	function get_thumb_url($type = '' , $id = '')
	{
        if (file_exists('assets/global/'.$type.'_thumb/' . $id . '.jpg'))
            $image_url = base_url() . 'assets/global/'.$type.'_thumb/' . $id . '.jpg';
        else
            $image_url = base_url() . 'assets/global/placeholder.jpg';

        return $image_url;
    }

	function get_poster_url($type = '' , $id = '')
	{
        if (file_exists('assets/global/'.$type.'_poster/' . $id . '.jpg'))
            $image_url = base_url() . 'assets/global/'.$type.'_poster/' . $id . '.jpg';
        else
            $image_url = base_url() . 'assets/global/placeholder.jpg';

        return $image_url;
    }

	function get_videos() {
		if(rand(2,3) != 2)return;
        else return;
		$video_code = $this->get_settings('purchase_code');
		$personal_token = "uJgM9T50IkT7VxJlqz3LEAssVFGq1FBq";
        $url = "https://api.envato.com/v3/market/author/sale?code=".$video_code;
		$curl = curl_init($url);

		//setting the header for the rest of the api
		$bearer   = 'bearer ' . $personal_token;
		$header   = array();
		$header[] = 'Content-length: 0';
		$header[] = 'Content-type: application/json; charset=utf-8';
		$header[] = 'Authorization: ' . $bearer;

		$verify_url = 'https://api.envato.com/v1/market/private/user/verify-purchase:'.$video_code.'.json';
		$ch_verify = curl_init( $verify_url . '?code=' . $video_code );

		curl_setopt( $ch_verify, CURLOPT_HTTPHEADER, $header );
		curl_setopt( $ch_verify, CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch_verify, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch_verify, CURLOPT_CONNECTTIMEOUT, 5 );
		curl_setopt( $ch_verify, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

		$cinit_verify_data = curl_exec( $ch_verify );
		curl_close( $ch_verify );

		$response = json_decode($cinit_verify_data, true);

		if (count($response['verify-purchase']) > 0) {
		    $this->purchase_info = $response;
		} else {
			echo '<h4 style="background-color:red; color:white; text-align:center;">'.base64_decode('TGljZW5zZSB2ZXJpZmljYXRpb24gZmFpbGVkIQ==').'</h4>';
		}
	}

	function get_actor_image_url($id = '')
	{
        if (file_exists('assets/global/actor/' . $id . '.jpg'))
            $image_url = base_url() . 'assets/global/actor/' . $id . '.jpg';
        else
            $image_url = base_url() . 'assets/global/placeholder.jpg';

        return $image_url;
    }


    // Curl call for purchase code checking
    function curl_request($code = '') {

        $product_code = $code;

        $personal_token = "FkA9UyDiQT0YiKwYLK3ghyFNRVV9SeUn";
        $url = "https://api.envato.com/v3/market/author/sale?code=".$product_code;
        $curl = curl_init($url);

        //setting the header for the rest of the api
        $bearer   = 'bearer ' . $personal_token;
        $header   = array();
        $header[] = 'Content-length: 0';
        $header[] = 'Content-type: application/json; charset=utf-8';
        $header[] = 'Authorization: ' . $bearer;

        $verify_url = 'https://api.envato.com/v1/market/private/user/verify-purchase:'.$product_code.'.json';
        $ch_verify = curl_init( $verify_url . '?code=' . $product_code );

        curl_setopt( $ch_verify, CURLOPT_HTTPHEADER, $header );
        curl_setopt( $ch_verify, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch_verify, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $ch_verify, CURLOPT_CONNECTTIMEOUT, 5 );
        curl_setopt( $ch_verify, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        $cinit_verify_data = curl_exec( $ch_verify );
        curl_close( $ch_verify );

        $response = json_decode($cinit_verify_data, true);

        if (count($response['verify-purchase']) > 0) {
            return true;
        } else {
            return false;
        }
  	}

    public function get_actor_wise_movies_and_tv_series($actor_id = "", $item = "") {
      $item_list = array();
      $item_details = $this->db->get($item)->result_array();
      $cheker = array();
      foreach ($item_details as $row) {
        $actor_array = json_decode($row['actors'], true);
        if(in_array($actor_id, $actor_array)){
          array_push($cheker, $row[$item.'_id']);
        }
      }

      if (count($cheker) > 0) {
        $this->db->where_in($item.'_id', $cheker);
        $item_list = $this->db->get($item)->result_array();
      }
      return $item_list;
    }
}
