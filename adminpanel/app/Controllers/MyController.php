<?php

namespace App\Controllers;
use App\Libraries\Html;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class MyController extends BaseController
{
	public $request;
	public $response;
	public $logger;
	public $email;
	protected $helpers = ['form', 'url', 'html'];
	public $head = array(
		"title" => "Welcome to My Indian Scholarship - India",
		"description" => "Get chance to win up to 100% scholarship from My Indian Scholarship",
		"image" => "",
		"site_name" => "My Indian Scholarship",
		"url" =>"https://www.myindiascholarship.in",
		"type" =>"website",
		"page_name" =>"My Indian Scholarship",
		"author" =>"My Indian Scholarship"
	);
	
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
		$this->session = \Config\Services::session();
		helper($this->helpers);
    }
	
    public function publicView($page, $data = array(), $head=array(), $foot=array())
    {
       return view('_templates/header', $head).view($page, $data).view('_templates/footer', $foot);
    }
	
	public function adminView($page, $data = array(), $head=array(), $foot=array())
    {
	   if($this->session->get('isLogin'))
	   {
		   return view('_templates/header', $head)
		   .view('_templates/admin-layout-wrapper-open', $data)
		   .view('_templates/admin-aside', $data)
		   .view('_templates/admin-navbar', $data)
		   .view('_templates/admin-content-wrapper-open', $data)
		   .view($page, $data)
		   .view('_templates/admin-content-wrapper-close', $data)
		   .view('_templates/admin-layout-wrapper-close', $data)
		   .view('_templates/footer', $foot);
	   }else{
		   $this->setFlashMessage('Unauthorized access', 'danger');
		   return $this->response->redirect(site_url('auth/signin'));	
	   }
    }
	
	public function emailView($page, $data = array())
	{		
		$parser  = \Config\Services::parser();
		$parser->setData($data);
		return $parser->render('email-template/inc/email-header')
		.$parser->render('email-template/'.$page)
		.$parser->render('email-template/inc/email-footer');
    }
	
	public function emailData($data = array()){
		$basicData = array(
			'site_logo' => base_url('public/img/logo.png'),
			'app_name' => APP_NAME,
			'about_link' => base_url('about-us'),
			'faq_link' => base_url('faq'),
			'privacy_link' => base_url('privacy-policy'),
			'unsubscribe_link' => base_url('unsubscribe/'),
		);
		return array_merge($basicData, $data);
	}
	
	public function getMessageIcon($variant){
		$messageIconArray = array(
			'primary' => '<i class="fa fa-check"></i>',
			'warning' => '<i class="fa fa-warning"></i>',
			'danger' => '<i class="fa fa-close"></i>',
			'success' => '<i class="fa fa-check"></i>',
			'info' => '<i class="fa fa-circle-info"></i>',
		);
		return isset($messageIconArray[$variant]) ? $messageIconArray[$variant] : "";
	}
	
	public function setFlashMessage($message, $variant="primary")
    {
       $this->session->setFlashdata('message', $message);
	   $this->session->setFlashdata('variant', $variant);
	   $this->session->setFlashdata('icon', $this->getMessageIcon($variant));
    }
	
	public function createEmail($to, $name, $subject=null, $message=null){
		$this->email = \Config\Services::email();
		$this->email->setFrom(DEFAULT_SENDER_EMAIL, DEFAULT_SENDER_NAME);
		$this->email->setTo($to);
		$this->email->setCC(DEFAULT_EMAIL_CC);
		$this->email->setBCC(DEFAULT_EMAIL_BCC);
		$this->email->setSubject($subject == null ? "Mail from ".APP_NAME : $subject);
		$this->email->setMessage($message);
		return $this->email;
	}
	public function addToEmail($to){
		$this->email->setTo($to);
		return $this->email;
	}
	public function setEmailSubject($subject){
		$this->email->setSubject($subject);
		return $this->email;
	}
	public function setEmailMessage($message){
		$this->email->setMessage($message);
		return $this->email;
	}
	public function sentEmail(){
		$this->email->send();
	}
}
