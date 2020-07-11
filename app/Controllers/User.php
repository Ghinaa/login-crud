<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\my_user;

class User extends BaseController
{
	
	public function index(){
		$data = [
			'title' => 'Form Login',
			'tampil' => 'login',
		];
		echo view('tamplates/wrapper',$data);
	}
	public function register(){
		$data = [
			'title' => 'Form Register',
			'tampil' => 'register',
		];
		echo view('tamplates/wrapper',$data);
	}
	public function regis(){
		helper(['form','url','date']);

		$userModel = new my_user();
		$now = date('Y-m-d H:i:s');
		$data = [
			'firstname' => $this->request->getVar('firstname'),
			'lastname' => $this->request->getVar('lastname'),
			'email' => $this->request->getVar('email'),
			'password' => $this->request->getVar('password'),
			'date_created' => $now,
			'date_updated' => $now
		];


		$save = $userModel->insert($data);

		session()-> setFlashdata('message','Registrasi');
		
		return redirect()-> to(base_url('user'));
	}
}