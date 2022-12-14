<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\VerifiactionModel;
class Auth extends MyController
{
	public $minPasswordLength = 8;
	public function signin()
    {
        $this->head['title'] = "Sign in to your account";
		$data = array();
        echo $this->publicView('auth/signin', $data, $this->head);
    }
	public function signup()
    {
		$this->head['title'] = "Create your account"; 
        $data = array();
        echo $this->publicView('auth/signup', $data, $this->head);
    }
	public function resetpassword()
    {
        return view('auth/resetpassword');
    }
	public function passwordreset()
    {
        return view('auth/passwordreset');
    }
	public function logout($hash='')
	{
		if($hash == $this->session->get('hash')){
			$this->session->destroy();
			$this->setFlashMessage('Logout successfull', 'success');
			return $this->response->redirect(site_url('auth/signin'));	
		}
		else{
			return $this->response->redirect(site_url('dashboard/index'));	
		}		
	}	
	public function verification($token)
	{
		$verificationModel = model(VerificationModel::class);
		if($record = $verificationModel->check($token)){
			$user = model(UserModel::class);
			$userRecord = $user->get($record['user_id']);
			$user->update($record['user_id'], array($record['type'] == $verificationModel::$verificationTypeMail ? 'email_verified' :'mobile_verified' => 1));
			$verificationModel->update($record['id'], array('status' => 0));
			$this->setFlashMessage("{$record['type']} verified successfully", 'success');
			return $this->response->redirect(site_url('auth/signin'));	
		}
		else{
			$this->setFlashMessage("Verification link expired or invalid", 'warning');
			return $this->response->redirect(site_url('auth/signin'));	
		}		
	}	
public function signincheck()
    {
		if($this->request->getMethod() === 'post')
		{
			$user = model(UserModel::class);
			$user_id = 0;
			if ($this->validate([
				'email' => "required|valid_email" ,
				'password' => "required"  			
			])){
				if($authUser = $user->where('email', $this->request->getPost('email'))->where('password', md5($this->request->getPost('password')))->first()){
					if($authUser['email_verified'] == 1){
						$userRecord = $user->get($authUser['id']);
						$this->session->set($userRecord);
						$this->session->set('isLogin', true);
						$this->session->set('hash', md5(json_encode($userRecord)));
						$this->setFlashMessage('Signin successfull.', 'success');
						return $this->response->redirect(site_url('dashboard/index'));
					}else{
						$this->setFlashMessage('Email is not verified yet. Please check email or Click to <a href="'.base_url('auth/resetpassword').'">Reset Password</a>', 'warning');
						return $this->response->redirect(site_url('auth/signin'));
					}
				}
				else{
					$this->setFlashMessage('Incorrect login details', 'warning');
					return $this->response->redirect(site_url('auth/signin'));
				}
			}else{
				$this->setFlashMessage($this->validator->listErrors(), 'warning');
				return $this->response->redirect(site_url('auth/signin'));
			}
		}
		else{
			$this->setFlashMessage('Invalid request', 'warning');
			 return $this->response->redirect(site_url('auth/signin'));
		}
    }
	
	public function signupcheck()
    {
		if($this->request->getMethod() === 'post')
		{
			$user = model(UserModel::class);
			$user_id = 0;
			if ($this->validate([
				'fname'  => 'required|alpha',
				'lname'  => 'required|alpha',
				'type'  => 'required|numeric|',
				'mobile'  => 'required|numeric',
				'email' => "required|valid_email|is_unique[users.email,user_id,{$user_id}]" ,
				'password' => "required|min_length[$this->minPasswordLength]"  			
			])){
				$userData = array(
					'fname' => $this->request->getPost('fname'),
					'lname' => $this->request->getPost('lname'),
					'type' => $this->request->getPost('type'),
					'email' => $this->request->getPost('email'),
					'mobile' => $this->request->getPost('mobile'),
					'password' => md5($this->request->getPost('password')),
					'email_verified' => 0,
					'mobile_verified' => 0,
					'created_date' => time(),
					'image' => $user->defaultImage, 
					'status' => $user->unverified
				);			
				
				if($user_id = $user->insert($userData)){
					//$user->update($user_id, array('password' => md5($this->request->getPost('password'))));
					$verificationModel = model(VerificationModel::class);
					
					$this->createEmail($userData['email'], $userData['fname'], "New Registration - ".APP_NAME);
					$content = $this->emailView('user-registration', $this->emailData([
						'user_name' => $userData['fname']. ' ' .$userData['lname'],
						'app_name' => APP_NAME,
						'activation_link' => $verificationModel->getLink($user_id, $verificationModel::$verificationTypeMail)
					]));
					//echo $content;die;
					$this->setEmailMessage($content);
					$this->sentEmail();
					
					$this->setFlashMessage('Account created successfully. An email confirmation link sent to your email '.$userData['email'].', Confirm email to continue. ', 'success');
					return $this->response->redirect(site_url('auth/signup'));
				}
				else{
					$this->setFlashMessage('Unbale to create account', 'warning');
					return $this->response->redirect(site_url('auth/signup'));
				}
			}else{
				$this->setFlashMessage($this->validator->listErrors(), 'warning');
				return $this->response->redirect(site_url('auth/signup'));
			}
		}
		else{
			$this->setFlashMessage('Invalid request', 'warning');
			 return $this->response->redirect(site_url('auth/signup'));
		}
    }
}
