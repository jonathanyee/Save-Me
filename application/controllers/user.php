<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require 'Readability.inc.php';

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('tank_auth');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$id = $this->tank_auth->get_user_id();
			$data['user_id']	= $id;
			$data['username']	= $this->tank_auth->get_username();

			$sql = "SELECT article.id, article.title, article.url, userarticles.date 
					  FROM article JOIN userarticles ON userarticles.aid = article.id 
					  WHERE userarticles.uid = ? ORDER BY userarticles.date DESC";
			$data['query'] = $this->db->query($sql, array($id));
			
			$this->load->view('getAllview', $data);
		}
	}
		
	function getSingle()
	{
		$data['query'] = $this->db->get_where('article', array('id' => $this->uri->segment(3) ) );
		$this->load->view('getSingleview', $data);
	}
	
	function insert()
	{
		$uid = $this->tank_auth->get_user_id();
		$url = $this->input->get('url', TRUE);
		
		$html = file_get_contents($url); 

		$Readability = new Readability($html);  //default charset is utf-8 
		$ReadabilityData = $Readability->getContent(); 
		$title = $ReadabilityData['title'];
		$content = $ReadabilityData['content'];
		
		$data = array(
		   'title' => $title,
		   'url' => $url,
			'body' => $content,
		);

		$this->db->insert('article', $data);
		
		//get ID of the row just added
		$rowID = $this->db->insert_id();
		
		$data2 = array(
			'uid' => $uid, 
			'aid' => $rowID,
			'date'   => date("Y-m-d H:i:s")
		);
		
		$this->db->insert('userarticles', $data2);
		
		redirect('');
	}
	
	function newArticle()
	{
		$this->load->view('newArticleview');
	}
	
	function insertArticle()
	{
		$data = $_POST;
		$this->db->insert('article', $data);
		
		//get ID of the row just added
		$rowID = $this->db->insert_id();
		$uid = $this->tank_auth->get_user_id();
		
		$data = array(
			'uid' => $uid, 
			'aid' => $rowID,
			'date'   => date("Y-m-d H:i:s")
		);
		
		$this->db->insert('userarticles', $data);
		
		redirect('');
	}

	//$this->output->enable_profiler(TRUE); 
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */