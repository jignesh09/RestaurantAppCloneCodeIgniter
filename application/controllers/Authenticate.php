<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticate extends MY_Controller {
	function __construct() {
		parent::__construct();   
    }
	public function index()
	{ 
        redirect( $this->data['base_url'].'admin/Category');
    }
}
?>