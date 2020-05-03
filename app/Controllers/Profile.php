<?php namespace App\Controllers;

class Profile extends IonAuthController
{
	public function index()
	{
    return redirect()->to('/profile/photo');
  }

  public function photo(){
		$studentModel = model('App\Models\StudentModel');
		$studentPhotoModel = model('App\Models\StudentPhotoModel');

		$this->useImageCompressor();

		if ($this->request->getFiles()) {
			$file = $this->request->getFile('photo_profile');
			if ($file)
			{
        $name = $file->getRandomName();
        $file = $file->move(ROOTPATH.'public/assets/uploads/profile_pictures', $name);
				if ($file) {
					if ($this->request->getPost('id')) {
						$fileData['id'] = $this->request->getPost('id');
						$oldPhoto = $studentPhotoModel->find($fileData['id']);
						unlink(ROOTPATH.'public/assets/uploads/profile_pictures/'.$oldPhoto['name']);
					}
					$fileData['user_id'] = $this->ionAuth->getUserId();
					$fileData['name'] = $name;
					$check = $studentPhotoModel->save($fileData);
					echo 'success';
				} else {
					echo 'failed';
				}
			} else {
				echo 'file not exist';
			}
			return;
		}

    echo view('admin/include/header');
		echo view('admin/include/navbar', $this->data);
		echo view('admin/include/sidebar_profile', $this->data);
		echo view('admin/profile/photo', $this->data);
		echo view('admin/include/footer');
  }
}
