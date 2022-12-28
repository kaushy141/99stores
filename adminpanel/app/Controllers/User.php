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

	public function registration($user_id=0)
    {
		if($this->session->get('type') == USER_TYPE_ADMIN){
			$user = model(UserModel::class);
			$data = [];
			if($user_id){
				$data = $user->get($user_id);
				$data['skills'] = array_column($user->getUserSkills($user_id), 'skill_id');
				$identity = $user->getUserIdentities($user_id);
				if($identity){
					$data = array_merge($data, $identity);
				}
				if($data['address_id']){
					$address = $user->getUserAddress($user_id, $data['address_id']);
					$data = array_merge($data, array_intersect_key($address, array_flip(array('line1', 'line2', 'district', 'state', 'country', 'pincode'))));
				}
				$this->head['title'] = "{$data['fname']} {$data['lname']} Information";
			}
			$skills = $user->getSkillsList();
			$identities = $user->getIdentitiesList();
			$states = $user->getStatesList();
			echo $this->adminView('user/registration', ['skills' => $skills, 'states'=>$states, 'identities' => $identities, 'data'=>$data], $this->head);

		}else{
			$this->setFlashMessage('Permission denined.', 'danger');
			return $this->response->redirect($this->request->getUserAgent()->getReferrer());
		}
    }

	public function save($user_id=0)
    {
		$newUser = !$user_id;
		if($this->request->getMethod() === 'post')
		{
			$user = model(UserModel::class);
			$validationArray = [
				'fname'  => 'required|alpha',
				'lname'  => 'required|alpha',
				'mobile'  => 'required|numeric|exact_length[10]',
				'email' => "required|valid_email|is_unique[users.email,id,{$user_id}]",
				'line1' => "alpha_numeric_punct",
				'line2' => "alpha_numeric_punct",
				'district' => "alpha_space",
				'state' => "alpha_space",
				'country' => "alpha_space",
				'pincode' => "numeric|exact_length[6]",
				'charges' => "numeric",
			];
			if($user_id == 0){
				$validationArray['password'] = "required|min_length[".APP_MIN_PASS_LENGTH."]";
			}
			if ($this->validate($validationArray)){
				$userData = array(
					'fname' => $this->request->getPost('fname'),
					'mname' => $this->request->getPost('mname'),
					'lname' => $this->request->getPost('lname'),
					'type' => 2,
					'email' => $this->request->getPost('email'),
					'mobile' => $this->request->getPost('mobile'),
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

				if($user_id == 0){
					$userData = array_merge($userData, array(
						'email_verified' => 1,
						'mobile_verified' => 1,
						'image' => $user->defaultImage,
						'status' => $user->active
						)
					);
					$user_id = $user->insert($userData);
				}
				else{
					if($this->request->getPost('password')){
						$userData['password'] = md5($this->request->getPost('password'));
					}
					$user->update($user_id,$userData);
				}
				#=============File Upload====================================
				if ($path = $this->uploadFile('image', 'user')) {
					$user->update($user_id, ['image' => $path]);
				}
				#============================================================

				if($user_id){
					if($this->request->getPost('skills')){
						$user->saveSkills($user_id, $this->request->getPost('skills'));
					}
					if($this->request->getPost('identity_id') && $this->request->getPost('identity_value')){
						$user->saveIdentities($user_id, $this->request->getPost('identity_id'), $this->request->getPost('identity_value'));
					}

					$address_id = $user->saveAddress(
						$user_id,
						$this->request->getPost('line1'),
						$this->request->getPost('line2'),
						$this->request->getPost('district'),
						$this->request->getPost('state'),
						$this->request->getPost('country'),
						$this->request->getPost('pincode')
					);
					//echo $address_id;die;
					$user->update($user_id, ['address_id' => $address_id]);

					$this->setFlashMessage($newUser ? 'User created successfully.' : 'User updated successully', 'success');
					return $this->response->redirect(site_url("user/registration/{$user_id}"));
				}
			}else{
				$this->setFlashMessage($this->validator->listErrors(), 'warning');
				return $this->response->redirect(site_url("user/registration/{$user_id}"));
			}
		}
    }

	public function admin()
    {
		$user = model(UserModel::class);
		$userlist = $user->getList(USER_TYPE_ADMIN);
		$this->head['title'] = "Admin List Accounts";
		echo $this->adminView('user/userlist', ['userlist' =>$userlist], $this->head);
    }
	public function vendor()
    {
		$user = model(UserModel::class);
		$userlist = $user->getList(USER_TYPE_VENDOR);
		$this->head['title'] = "Vendor List Accounts";
		echo $this->adminView('user/userlist', ['userlist' =>$userlist], $this->head);
    }
	public function customer()
    {
		$user = model(UserModel::class);
		$userlist = $user->getList(USER_TYPE_CUSTOMER);
		$this->head['title'] = "Customer List Accounts";
		echo $this->adminView('user/userlist', ['userlist' =>$userlist], $this->head);
    }
}
