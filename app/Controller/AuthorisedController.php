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
class AuthorisedController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('User','UserBank','ActiveZone','WithdrawalRequests','PinWallet','PinShop','PopLead');

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	function viewLeads(){
		$user_id = $this->_checkAdminLogin();
		$leads = $this->PopLead->find('all', array( 'group' => 'mobile'));
		$this->set('leads',$leads);
		
	}
	function AddFranchise(){
		$user_id = $this->_checkAdminLogin();
		$city = Configure::read('cityArray');
		$this->set('city',$city);
		if(!empty($this->data)){
			//echo '<pre>';print_r($data);die;
			$data = $this->data;
			$data['user_id'] = $user_id;
			$data['status'] = 1;
			if ($this->PinShop->save($data)) {
				$this->Session->setFlash('<div class="row text-center well"><h3 class="text-success">Thank you your requiest submitted successfully</h3></div>');
				$this->redirect( array( 'controller' => 'home_pages', 'action' => 'deshBoard' ) );
			} else {
				$this->Session->setFlash('<div class="row text-center well"><h3 class="text-danger">Something went wrong please try again</h3></div>');
				$this->redirect( array( 'controller' => 'home_pages', 'action' => 'deshBoard' ) );
			}
		}
	}
	function editFranchise($id){
		$this->autoRender = false;
		$user_id = $this->_checkAdminLogin();
		$city = Configure::read('cityArray');
		//echo $id;die;
		if (!empty($id)) {
			$shops = $this->PinShop->find('first', array( 'conditions' => "id ='$id'"));
			$this->set('data',$shops);
		}
		
		$this->set('city',$city);
		if(!empty($this->data) && empty($id)){
			$data = $this->data;
			$data['user_id'] = $user_id;
			$data['status'] = 1;
			if ($this->PinShop->save($data)) {
				$this->Session->setFlash('<div class="row text-center well"><h3 class="text-success">Thank you your requiest submitted successfully</h3></div>');
				$this->redirect( array( 'controller' => 'home_pages', 'action' => 'deshBoard' ) );
			} else {
				$this->Session->setFlash('<div class="row text-center well"><h3 class="text-danger">Something went wrong please try again</h3></div>');
				$this->redirect( array( 'controller' => 'home_pages', 'action' => 'deshBoard' ) );
			}
		} else {
			$this->render('add_franchise');
		}
	}
	function generatePin(){
        $this->autoRender = false;
        $this->layout = "";
        $user_id = $this->_checkAdminLogin();
        if ($this->data) {
        	//echo '<pre>';print_r($this->data);die;
            $pinW['user_id'] = $user_id;
            $data['pin'] = $this->data['quantity'];
            $pinW['status'] = 1;
            $pinW['created_by'] = 'Admin';
            for($i=0; $i <$data['pin'] ; $i++) { 
                $pinW['cypher_code'] = md5(date("YmdHis").$i.$user_id.$i.'+');
                $this->PinWallet->create();
                $ot = $this->PinWallet->save($pinW);
                $pin[$i]['id'] = $ot['PinWallet']['id'];
                $pin[$i]['pin'] = $ot['PinWallet']['cypher_code'];
				$pin[$i]['status'] = $ot['PinWallet']['status'];
				$pin[$i]['created_by'] = $ot['PinWallet']['created_by'];
				$pin[$i]['date'] = $ot['PinWallet']['created'];
            }
            $filename = "fortune-power-pin.xlsx";
            header("Content-Disposition: attachment; filename=\"$filename\"");
			header("Content-Type: application/vnd.ms-excel");
			// Write data to file
			$flag = false;
			foreach ($pin as $key => $value) {  
				if (!$flag) {
			        echo implode("\t", array_keys($value)) . "\r\n";
			        $flag = true;
			    }
			    echo implode("\t", array_values($value)) . "\r\n";
			}
		}
    }
    function viewRequest(){
		//$this->layout = "default";
		$this->autoRender = false;
		$data = $this->WithdrawalRequests->find('all', array( 'conditions' => array('is_paid =0 or is_paid = 1')));
		$users = Set::classicExtract($data, '{n}.WithdrawalRequests.user_id');
		$Userdata = $this->User->find('list', array( 'fields' => array('email'),'conditions' => array('id' => $users)));
		//echo '<pre>';print_r($Userdata);die;
		$this->set('txtRequest',$data);
		$this->set('Userdata',$Userdata);
		$this->render('../DeshBoard/txt_history');
	}
}