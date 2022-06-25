<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$Login_salah = '';

		if($this->input->post()) {
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($username == 'aldi' && $password == '123'){
			redirect('backend/dashboard');
		} else {
			$Login_salah = 'kombinasi username & password salah';
		}
	}

		view('login', ['Login_salah' => $Login_salah]);
	}
}