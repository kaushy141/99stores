<?php

namespace App\Controllers;

class User extends MyController
{
    public function profile()
    {
        echo $this->adminView('user/profile', array(), $this->head);
    }
	public function thememode()
    {
		$this->session->set('darkmode', !$this->session->get('darkmode'));
		return $this->response->redirect($this->request->getUserAgent()->getReferrer());  
    }
	public function layoutcollapse()
    {
		$this->session->set('collapse-menu', !$this->session->get('collapse-menu'));		
		return $this->response->redirect($this->request->getUserAgent()->getReferrer());
    }
	
	public function delete($id)
    {
		if($this->session->get('type') == USER_TYPE_ADMIN){
			$user = model(UserModel::class);
			$user->update($id, ['status'=>'Deleted']);
			$user->delete($id);
			$this->setFlashMessage('User deleted successfull.', 'success');
			return $this->response->redirect($this->request->getUserAgent()->getReferrer());
		}else{
			$this->setFlashMessage('Permission denined.', 'danger');
			return $this->response->redirect(site_url('dashboard/index')); 
		}
    }
	
	public function registration()
    {
		if($this->session->get('type') == USER_TYPE_ADMIN){
			$user = model(UserModel::class);
			$skills = $user->getSkillsList();
			$identities = $user->getIdentitiesList();
			echo $this->adminView('user/registration', ['skills' => $skills, 'identities' => $identities], $this->head);
			
		}else{
			$this->setFlashMessage('Permission denined.', 'danger');			
			return $this->response->redirect($this->request->getUserAgent()->getReferrer());
		}
    }
	
	public function add()
    {
		print_r($_POST);die;
		if($this->request->getMethod() === 'post')
		{
			$user = model(UserModel::class);
			if ($this->validate([
				'fname'  => 'required|alpha',
				'lname'  => 'required|alpha',
				'type'  => 'required|numeric',
				'mobile'  => 'required|numeric|exact_length[10]',
				'email' => "required|valid_email|is_unique[users.email,user_id,{$user_id}]" ,
				'password' => "required|min_length[$this->minPasswordLength]", 
				'line1' => "alpha_numeric_punct",
				'line2' => "alpha_numeric_punct",
				'district' => "alpha_space",
				'state' => "alpha_space",
				'country' => "alpha_space",
				'pincode' => "numeric|exact_length[6]",
				'charges' => "numeric",
			])){
				$userData = array(
					'fname' => $this->request->getPost('fname'),
					'lname' => $this->request->getPost('lname'),
					'type' => 2,
					'email' => $this->request->getPost('email'),
					'mobile' => $this->request->getPost('mobile'),
					'password' => md5($this->request->getPost('password')),
					'line1' => $this->request->getPost('line1'),
					'line2' => $this->request->getPost('line2'),
					'district' => $this->request->getPost('district'),
					'state' => $this->request->getPost('state'),
					'country' => $this->request->getPost('country'),
					'pincode' => $this->request->getPost('pincode'),
					'charges' => $this->request->getPost('charges'),
					'email_verified' => 1,
					'mobile_verified' => 1,
					'created_date' => time(),
					'image' => $user->defaultImage, 
					'status' => $user->verified
				);			
				
				if($user_id = $user->insert($userData)){
					if($this->request->getPost('skills')){
						$user->saveSkills($user_id, $this->request->getPost('skills'))
					}
					if($this->request->getPost('identities') && $this->request->getPost('identity_value')){
						$user->saveIdentities($user_id, $this->request->getPost('identities'), $this->request->getPost('identity_value'));
					}
					
					$user->saveAddress(
						$user_id, 
						$this->request->getPost('line1'), 
						$this->request->getPost('line2'), 
						$this->request->getPost('district'), 
						$this->request->getPost('state'), 
						$this->request->getPost('country'), 
						$this->request->getPost('pincode')
						)
					
					$this->setFlashMessage('User created successfully.', 'success');
					return $this->response->redirect(site_url('user/registration'));
				}
			}
		}
    }
	public function edit($id)
    {
		if($this->session->get('type') == USER_TYPE_ADMIN){
			$user = model(UserModel::class);
			$userData = $user->get($id);
			echo $this->adminView('user/edit', ['user'=>$userData], $this->head);
		}else{
			$this->setFlashMessage('Permission denined.', 'danger');			
			return $this->response->redirect($this->request->getUserAgent()->getReferrer());
		}
    }
	
	public function donner()
    {
		$user = model(UserModel::class);
		$donnerList = $user->getList(USER_TYPE_ADMIN);
		echo $this->adminView('user/donnerlist', ['donnerList' =>$donnerList], $this->head);
    }
}
