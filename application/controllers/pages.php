<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller 
{
 
	function index()
	{
		$this->search();
	}
	
	function search($search_terms = '', $start = 0)
	{
		// If the form has been submitted, rewrite the URL so that the search
		// terms can be passed as a parameter to the action. Note that there
		// are some issues with certain characters here.
		if ($this->input->post('q'))
		{
			redirect('/pages/search/' . $this->input->post('q'));
		}

		if ($search_terms)
		{
			// Determine the number of results to display per page
			$results_per_page = 10;
			
			// Load the model and perform the search
			$this->load->model('Page_model');
			$results = $this->Page_model->search($search_terms, $start, $results_per_page);
			
			$total_results = $this->Page_model->count_search_results($search_terms);

			// Call a method to setup pagination
			$this->_setup_pagination('/pages/search/' . $search_terms . '/', $total_results, $results_per_page);

			// Work out which results are being displayed
			$first_result = $start + 1;
			$last_result = min($start + $results_per_page, $total_results);
		}

		// Render the view, passing it the necessary data
		$this->load->view('search_results', array(
		    'search_terms' => $search_terms,
		    'first_result' => @$first_result,
		    'last_result' => @$last_result,
		    'total_results' => @$total_results,
		    'results' => @$results
		));
	}
	
	function _setup_pagination($url, $total_results, $results_per_page)
   {
		// Ensure the pagination library is loaded
		$this->load->library('pagination');

		// not sure why the pagination class can't work this out itself...
		$uri_segment = count(explode('/', $url));

		// Initialise the pagination class, passing in some minimum parameters
		$this->pagination->initialize(array(
		    'base_url' => site_url($url),
		    'uri_segment' => $uri_segment,
		    'total_rows' => $total_results,
		    'per_page' => $results_per_page
		));
   }
}