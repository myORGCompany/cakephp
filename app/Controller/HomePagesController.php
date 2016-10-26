<?php
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class HomePagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('UserBank','GiveHelp','User','GetHelp','PopLead');

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	function index() {
		$this->layout="default";

	}

	function deshBoard() {
		$user_id = $this->_checkLogin();
		$userData = $this->Session->read('User');
		$this->layout="default";
		$HelpData['bank'] = $this->UserBank->find('first', array( 'conditions' => array('is_active' => 1,'user_id' =>$userData['UserId'])));
		$HelpData['giveHelpData'] = $this->GiveHelp->find('all', array( 'conditions' => array('is_active' => 1,'user_id' =>$userData['UserId'])));
		//$HelpData['getHelpData'] = $this->GetHelp->find('all', array( 'conditions' => array('is_active' => 1,'user_id' =>$userData['UserId'])));
		$HelpData['userData'] = $this->User->find('all', array( 'conditions' => array('status' => 1,'id' =>$userData['UserId'])));
		//echo '<pre>';print_r($HelpData);die;
		
		$this->set('HelpData',$HelpData);
	}
	function registration() {
		$this->autoRender = false;
	    $this->layout = "";
		$User = $this->_import("User");
		$login_detail = $User->find('first', array( 'conditions' => array('email' => $this->data['email'])));
		if(!empty($login_detail)) {
			$this->redirect( array( 'controller' => 'home_pages', 'action' => 'index?status=1' ) );
		} else {
			$data['email'] = $this->data['email'];
			$data['password'] = md5($this->data['password']);
			$data['name'] = $this->data['Name'];
			$data['mobile'] = $this->data['mobile'];
			$data['sponcer'] = $this->data['sponcer'];
			$data['status'] = 1;
			$this->Session->write('User',$data);
			$data1 = $User->save($data);
			$data['UserId'] = $data1['User']['id'];
			$this->Session->write('User',$data);
			$this->redirect( array( 'controller' => 'home_pages', 'action' => 'deshBoard' ) );
		}
	}

	function logins() {
		$this->autoRender = false;
	    $this->layout = "";
		$User = $this->_import("User");
		$login_detail = $User->find('first', array( 'conditions' => array('email' => $this->data['email'],'status' =>1)));
		if(empty($login_detail)) {
			$this->redirect( array( 'controller' => 'home_pages', 'action' => 'index?status=2' ) );
		} else {
			if($login_detail['User']['email'] == $this->data['email'] && $login_detail['User']['password'] == md5($this->data['password'])) {
				$data['UserId'] = $login_detail['User']['id'];
				$data['email'] = $login_detail['User']['email'];
				$data['password'] = $login_detail['User']['password'];
				$data['mobile'] = $login_detail['User']['mobile'];
				$data['status'] = $login_detail['User']['status'];
				$data['payment'] = $login_detail['User']['payment'];
				$this->Session->write('User',$data);
				if(!empty($login_detail['User']['is_admin']) && $login_detail['User']['is_admin'] ==1) {
					$this->redirect( array( 'controller' => 'desh_board', 'action' => 'adminLogin' ) );
				}
				$this->redirect( array( 'controller' => 'home_pages', 'action' => 'deshBoard' ) );
			} else {
				$this->redirect( array( 'controller' => 'home_pages', 'action' => 'index?status=3' ) );
			}
		}
	}

	function logout(){
		$this->Session->delete('User');
		$this->Session->destroy();
		$this->redirect( array( 'controller' => 'home_pages', 'action' => 'index' ) );
	}
	function saveLead(){
		$this->Session->write('pop',1);
		$data['name'] = $this->data['fname'];
		$data['email'] = $this->data['email_id'];
		$data['mobile'] = $this->data['mobile'];
		if( empty($this->User->checkMemberShipByMobile($data['mobile'])) ) {
			if($this->PopLead->save($data)){
			echo 1;
			exit;
			} else{
				echo 0;
				exit;
			}	
		} else {
			echo 1;
			exit;
		}
	}
	function contactUs(){
		
	}
	function plan(){
		
	}
	function aboutUs(){
		
	}
}