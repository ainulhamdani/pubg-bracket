<?php namespace App\Controllers;

class Admin extends IonAuthController
{
	public function index()
	{
		return redirect()->to('/admin/overview');
	}

	public function overview(){
		echo view('admin/include/header');
		echo view('admin/include/navbar', $this->data);
		echo view('admin/include/sidebar_admin', $this->data);
		echo view('admin/index');
		echo view('admin/include/footer');
	}

}
