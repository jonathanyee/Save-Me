<?php
class Page_model extends CI_Model
{
	function __construct()
   {
       // Call the Model constructor
       parent::__construct();

		// Make the database available to all the methods
		$this->load->database();
   }

	function search($terms, $start = 0, $results_per_page = 0)
	{
	    // Determine whether we need to limit the results
	    if ($results_per_page > 0)
	    {
	        $limit = "LIMIT $start, $results_per_page";
	    }
	    else
	    {
	        $limit = '';
	    }

	    // Execute our SQL statement and return the result
	    $sql = "SELECT title, url, body FROM article WHERE MATCH (title, body) AGAINST (?) > 0 $limit";
	    $query = $this->db->query($sql, array($terms, $terms));
	    return $query->result();
	}
	
	function count_search_results($terms)
	{
	    // Run SQL to count the total number of search results
	    $sql = "SELECT COUNT(*) AS count FROM article WHERE MATCH (title, body) AGAINST (?)";
	    $query = $this->db->query($sql, array($terms));
	    return $query->row()->count;
	}
}