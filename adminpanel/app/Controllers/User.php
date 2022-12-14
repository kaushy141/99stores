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
		return $this->response->redirect(site_url('dashboard/index'));  
    }
	public function layoutcollapse()
    {
		$this->session->set('collapse-menu', !$this->session->get('collapse-menu'));
		return $this->response->redirect(site_url('dashboard/index'));  
    }
	
	public function delete($id)
    {
		if($this->session->get('type') == USER_TYPE_ADMIN){
			$user = model(UserModel::class);
			$user->update($id, ['status'=>'Deleted']);
			$user->delete($id);
			$this->setFlashMessage('User deleted successfull.', 'success');
			//return $this->response->redirect($this->request->getUserAgent()->referrer());
			return $this->response->redirect(site_url('dashboard/index')); 
		}else{
			$this->setFlashMessage('Permission denined.', 'danger');
			return $this->response->redirect(site_url('dashboard/index')); 
		}
    }
	
	public function donner()
    {
		$user = model(UserModel::class);
		$donnerList = $user->getList(USER_TYPE_ADMIN);
		echo $this->adminView('user/donnerlist', ['donnerList' =>$donnerList], $this->head);
    }
}
