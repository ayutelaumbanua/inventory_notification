<?php

class Logout extends CI_Controller
{
	public function index()
	{
		$this->session->sess_destroy();
		$url = base_url('login');
		redirect($url);
	}
}