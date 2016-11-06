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
	public $uses = array('UserBank','Team','User','GetHelp','PopLead','PinShop','UserProfile','PinWallet',
		'WithdrawalRequests');

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
		
		$this->set('HelpData',$HelpData);
	}
	function registration() {
		$this->autoRender = false;
	    $this->layout = "";
	    $response = array(
            'hasError' => true,
            'messages' => "Either email or password is incorrect!",
            'redirect' => false
        );
		$User = $this->_import("User");
		$ActiveZone = $this->_import("ActiveZone");
		$login_detail = $User->find('first', array( 'conditions' => array('email' => $this->data['email'])));
		if(!empty($login_detail)) {
			$this->redirect( array( 'controller' => 'home_pages', 'action' => 'index?status=1' ) );
		} else {
			$childs = $User->CheckDirectIds($this->data['sponcer']);
			$data['email'] = $this->data['email'];
			$data['password'] = md5($this->data['password']);
			$data['name'] = $this->data['Name'];
			$data['mobile'] = $this->data['mobile'];
			$data['sponcer'] = $childs['mobile'];
			$data['status'] = 1;
			$data['payment'] = 0;
			$data['r1'] = 0;
			$data1 = $User->save($data);
			$data['password'] = '';
			$this->Session->write('User',$data);
			if (count($childs['ids']) >= 2) {
				$sponcerData['user_id'] = $childs['user_id'];
				$sponcerData['directs'] = implode(",", $childs['ids']);
				$User->updateAll(array("direct_complete"=>1),array("id"=>$sponcerData['user_id']));
				$ActiveZone->save($sponcerData);
			} 
			$data['UserId'] = $data1['User']['id'];
			$this->Session->write('User',$data);
			$response = array('hasError' => false, 'messages' => null,'redirect' => ABSOLUTE_URL.'/home_pages/deshBoard'); 
			echo json_encode($response);
			
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
				$login_detail['User']['UserId'] = $login_detail['User']['id'];
				$this->Session->write('User',$login_detail['User']);
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
		$data['mobile'] = $this->data['email_id'];
		$data['source'] = 'Home-PopUp';
		$user_id = $this->checkRegisterdGetId($data['email'],2);
		if(!empty($user_id)){
			$data['user_id'] = $user_id;
			$data['is_registered'] = 1;
		} else{
			$data['user_id'] = 0;
			$data['is_registered'] = 0;
		}
		//echo '<pre>';print_r($this->PopLead->checkPopEntryByMobile($data['mobile']));die;
		if( empty($this->PopLead->checkPopEntryByMobile($data['mobile'])) ) {
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
	function pinShop(){
		$PinShop = $this->PinShop->find('all', array( 'conditions' => array('status' => 1)));
		$this->set('pinShop' ,$PinShop );
		//echo '<pre>';print_r($PinShop);die;
	}
	function r1(){
		$city = Configure::read('cityArray');
		$this->set('city',$city);
		
		$user = $this->Session->read('User');
		//$this->UserBank->find(array("all"=>0),array("user_id" => $user['UserId']));
		$this->set('bank',$this->UserBank->find('first', array( 'conditions' => array('user_id' => $user['UserId'],'is_active' =>1))));
		//echo '<pre>';print_r($user);die;
		if(!empty($this->data)){
			$data = $this->data;
			//echo '<pre>';print_r($data);die;
			$data['user_id'] = $user['UserId'];
			if($this->UserProfile->save($data)){
				$user['r1'] = 1;
				$this->Session->write('User',$user);
				$this->User->updateALL(array('r1' => 1),array('id' => $user['UserId']));
			}
			$data['bank_name'] = $this->data['bankName'];
			$data['account_number'] = $this->data['accountNumber'];
			$data['ifsc_code'] = $this->data['ifsc'];
			$data['branch'] = $this->data['branch'];
			$data['is_active'] = 1;
			$this->UserBank->updateAll(array("is_active"=>0),array("user_id" => $user['UserId']));
			if ($this->UserBank->save($data)) {
				$this->redirect( array( 'controller' => 'home_pages', 'action' => 'deshBoard' ) );
			}
		}
	}
	function submitLeads(){
		$this->layout = "default";
		$this->autoRender = false;
		if(!empty($this->request->data)) {
			$leads['name'] = $this->request->data['Name'];
			$leads['email'] = $this->request->data['email'];
			$leads['mobile'] = $this->request->data['mobile'];
			$leads['comments'] = $this->request->data['comments'];
			$leads['source'] = 'Contact-US';
			$user_id = $this->checkRegisterdGetId($leads['email'],1);
			if(!empty($user_id)){
				$leads['user_id'] = $user_id;
				$leads['is_registered'] = 1;
			} else{
				$leads['user_id'] = 0;
				$leads['is_registered'] = 0;
			}
			if($this->PopLead->save($leads)){
				$message['message'] = "Thanks for contacting us we will shortly connect you";
				$message['class'] = 'text-success';
			} else{
				$message['message'] = "Smothing went wrong please try again";
				$message['class'] = 'text-danger';
			}
		}
		echo json_encode($message);
		exit;
	}
	function varificationGoGreen(){
		$this->layout = "default";
		$this->autoRender = false;
		$user_id = $this->_checkLogin();
		if($this->data){
			$pin = $this->data['pin'];
			$this->PinWallet->updateAll(array("user_id"=>$user_id,'status' => 2,'used_on' => $this->Session->read('User.email') ),array('cypher_code' => $this->data['pin']));
			$this->User->updateAll(array("payment"=>1,'pin' => "'$pin'"),array('id' => $user_id));
			$this->Session->write('User.payment' , 1);
			$this->Session->setFlash('<div class="row text-center well"><h3 class="text-success">Thank you you have successfully activate your id</h3></div>');
            $this->redirect( array( 'controller' => 'home_pages', 'action' => 'deshBoard' ) );
        } else {
            $this->Session->setFlash('<div class="row text-center well"><h3 class="text-danger">Something went wrong please try again</h3></div>');
            $this->redirect( array( 'controller' => 'home_pages', 'action' => 'deshBoard' ) );
        }
	}
}