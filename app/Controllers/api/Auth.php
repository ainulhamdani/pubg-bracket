<?php namespace App\Controllers\Api;

use Firebase\JWT\JWT;
use App\Controllers\IonAuthController;
use CodeIgniter\API\ResponseTrait;
use Config\JWTConfig;
class Auth extends IonAuthController
{
	use ResponseTrait;

	public function authenticate() {
    if ($this->request->getPost()) {
      if ($this->ionAuth->login($this->request->getVar('username'), $this->request->getVar('password'), false))
			{
        $payload = [
          'iss' => base_url(),
          'sub' => '123456',
          "iat" => now(),
          'name' => $this->session->get('fullname'),
        ];

        $jwt = JWT::encode($payload, JWTConfig::$KEY);
        $data = ['message' => 'Access granted', 'token' => $jwt];
        return $this->respond($data, 200);
			}
			else
			{
				return $this->respond(['error' => true, 'message' => 'Wrong username or password'], 401);
			}
    }
  }
	
}
