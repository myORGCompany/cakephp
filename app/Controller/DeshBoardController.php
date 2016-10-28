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
class DeshBoardController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('GiveHelp','GetHelp','User','UserBank','ActiveZone','WithdrawalRequests','PinWallet','PinShop');

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	function giveHelp() {
		$this->autoRender = false;
	    $this->layout = "";
	     if($this->data){
	    	$userData = $this->Session->read('User');
	    	$helpData['amount'] = $this->data['amount'];
	    	$helpData['email'] = $userData['username'];
	    	$helpData['user_id'] = $userData['UserId'];
	    	$helpData['start_time'] = date("Y-m-d h:i:s");
	    	$helpData['is_active'] = 1;
	    	$helpData['end_time'] = date('Y-m-d h:i:s', strtotime(' +2 day'));
	    	$this->GiveHelp->save($helpData);
	    } else {
	    	return false;
	    }
	}
	function getHelp() {
		$this->autoRender = false;
	    $this->layout = "";
	    if($this->data){
	    	$userData = $this->Session->read('User');
	    	$helpData['amount'] = $this->data['amount'];
	    	$helpData['email'] = $userData['username'];
	    	$helpData['user_id'] = $userData['UserId'];
	    	$helpData['start_time'] = date("Y-m-d h:i:s");
	    	$helpData['end_time'] = date('Y-m-d h:i:s', strtotime(' +2 day'));
	    	$this->GetHelp->save($helpData);
	    } else {
	    	return false;
	    } 
	}
	function saveBankDetails() {
		$this->autoRender = false;
	    $this->layout = "";
        $response = array(
            'hasError' => true,
            'message' => "Either email or password is incorrect!",
            'redirect' => false
        );
	    $userData = $this->Session->read('User');
		$data['user_id'] = $userData['UserId'];
		if($this->data){
			$data['bank_name'] = $this->data['bankName'];
			$data['account_number'] = $this->data['accountNumber'];
			$data['ifsc_code'] = $this->data['ifsc'];
			$data['branch'] = $this->data['branch'];
			$data['is_active'] = 1;
			$this->UserBank->updateAll(array("is_active"=>0),array("user_id"=>$userData['UserId']));
			$this->UserBank->save($data);
            $response = array('hasError' => false, 'message' => 'Thank You Your Bank Details Updated Successfully','redirect' => ABSOLUTE_URL.'/home_pages/deshBoard'); 
            echo json_encode($response);
            exit;
		}
	}
	function adminLogin(){
        $user_id = $this->_checkLogin();
		$userData = $this->Session->read('User');
		$data['giveHelp'] = $this->GiveHelp->find('all', array( 'fields' =>array('User.name','GiveHelp.user_id','GiveHelp.amount','GiveHelp.start_time','User.email'),'conditions' => array('GiveHelp.is_active' => 1),
			'joins' => array(
                    array('table'=>'users','alias'=>'User','type'=>'inner','conditions'=>array('GiveHelp.user_id = User.id'))
                )));
		$data['getHelp'] = $this->GetHelp->find('all', array( 'fields' =>array('User.name','GetHelp.user_id','GetHelp.amount','GetHelp.start_time','User.email'),'conditions' => array('GetHelp.is_active' => 1),
			'joins' => array(
                    array('table'=>'users','alias'=>'User','type'=>'inner','conditions'=>array('GetHelp.user_id = User.id'))
                )));
		$this->set('HelpRecords',$data);
	}
	function acceptGetHelp() {
		$this->autoRender = false;
	    $this->layout = "";
		if(!empty($this->data['id'])) {
			$this->GetHelp->updateAll(array("is_active"=>0,"is_accepted" =>1),array("id"=>$this->data['id']));
			return true;
		} else {
			return false;
		}
	}
	function submitGiveHelp() {
		$this->autoRender = false;
	    $this->layout = "";
		if(!empty($this->data['id'])) {
			$this->GiveHelp->updateAll(array("is_active"=>0,"status" =>1),array("id"=>$this->data['id']));
			return true;
		} else {
			return false;
		}
	}
	function checkMemberShipByEmail($emailId = '') {
        $isAvailbale = true;
        $message = false;
        $this->autoRender = false;
        $this->layout = null;
        if (trim($emailId) == '')
            $emailId = $this->data['email'];
        //check if email exists on some mail server
        $isMember = false;
        $loginData = $this->User->find('first', array(
            'fields' => array("User.id"),
            'conditions' => array('User.email' => $emailId)
        ));
        if (isset($loginData['User']['id']) && (int) $loginData['User']['id']) {
            $isMember = (int) $loginData['User']['id'];
        }
        if ($isMember) {
	        $message = 'This email is already registered.';
	        $isAvailbale = false;
            
        } 
        echo json_encode(array('valid' => $isAvailbale, 'message' => $message));
        exit;
    }
    function checkMemberShipByMobile($mobile = '') {
        $isAvailbale = true;
        $message = false;
        $this->autoRender = false;
        $this->layout = null;

        if (trim($mobile) == '')
            $mobile = $this->data['User']['mobile'];

        // condition added if mobile number is changed from profile page
        if ($mobile == "") {
            $mobile = $this->data['mobile'];
        }
        $replace_str = array(" ", "(", ")", "-", "+");
        $mobile = str_replace($replace_str, "", $mobile);

        //check if already registered
        $UserId = $this->User->checkMemberShipByMobile($mobile);
        if ((int) $UserId) {
            $isAvailbale = false;
            $message = 'This mobile number is already registered';
        }
        echo json_encode(array('valid' => $isAvailbale, 'message' => $message));
        exit;
    }
    function checkMemberShipEmail($emailid){
    	$this->autoRender = false;
        $this->layout = null;

        if (trim($emailid) == '')
            $emailid = $this->data['sponcer'];
        //check if email exists on some mail server
        $isMember = false;
        $loginData = $this->User->find('first', array(
            'fields' => array("User.id"),
            'conditions' => array('User.email' => $emailid)
        ));
        
        if (isset($loginData['User']['id']) && (int) $loginData['User']['id']) {
            $isMember = (int) $loginData['User']['id'];
        }
        return $isMember;
    }
    public function isRegistered() {
        $isMember = false;
        $this->autoRender = false;
        $this->layout = null;
        $loginId = $this->checkMemberShipEmail($this->data['sponcer']);
        if ((int) $loginId) {
            $isMember = true;
        } else {
            $message = "This Email is not registered";
        }
        $cnt = $this->User->CheckDirectIds($this->data['sponcer']);
        if (count($cnt['ids']) >= 3) {
            $isMember = false;
            $message = "This Member Complete 3 directs please chose other one";
        }
        echo json_encode(array('valid' => $isMember,'message' => $message));
        exit;
    }
    public function validateSponcer() {
        $isValid = true;
        $this->autoRender = false;
        $this->layout = null;
        $cnt = $this->User->CheckDirectIds($this->data['sponcer']);
        if (count($cnt['ids']) >= 3) {
            $isValid = false;
        }
        echo json_encode(array('valid' => $isValid));
        exit;
    }
    function isRegisteredEmail(){
        $isMember = false;
        $this->autoRender = false;
        $this->layout = null;
        $loginId = $this->checkMemberShipEmail($this->data['email']);
        if ((int) $loginId) {
            $isMember = true;
        }
        echo json_encode(array('valid' => $isMember));
        exit;
    }
    function getTree($option){
        $user_id = $this->_checkLogin();
        set_time_limit(0);
        $userData = $this->Session->read('User');
        $data['email'] = $userData['email'];
        if ($userData['membership'] == 'safezone') {
            $users = $this->User->find('all', array(
            'fields' => array("User.email",'User.sponcer'),'conditions' => array('User.id >' => $userData['UserId'])
            ));
            foreach ($users as $key => $value) {
                $value['User']['sponcer'] = $data['email'];
                $GLOBALS['SessionData'][] = $value['User'];
            }
        } else{
            if($userData['payment'] == 1){
                    $data['image'] = ABSOLUTE_URL.'/img/user1.png';
                } else {
                    $data['image'] = ABSOLUTE_URL.'/img/user2.png';
                }
            $GLOBALS['SessionData'][0]['mobile'] = $userData['mobile'];
            $GLOBALS['SessionData'][0]['image'] = $data['image'];
            $GLOBALS['SessionData'][0]['email'] = $data['email'];
            $GLOBALS['SessionData'][0]['sponcer'] = $data['email'];
            $this->getRecursiveIcon($userData['mobile']);
        }
       //echo '<pre>'; print_r($GLOBALS['SessionData']);die;
        $this->set('use',$GLOBALS['SessionData']);
    }
    function getTreeSafeZon($option){
        $user_id = $this->_checkLogin();
        $this->autoRender = false;
        //$this->layout = null;
        set_time_limit(0);
        $userData = $this->Session->read('User');
        $data['email'] = $userData['email'];
        $treeData = $this->User->getSafeZoneTree($userData);
        $this->set('use',$treeData);
        $this->render('get_tree_active');
    }
    function getTreeActive(){
        $user_id = $this->_checkLogin();
        set_time_limit(0);
        $userData = $this->Session->read('User');
        $data['email'] = $userData['email'];
        $treeData = $this->ActiveZone->getActiveZoneTree($user_id);
        $this->set('use',$treeData);
    }
    function getRecursiveIcon($mobile){
        set_time_limit(0);
        $users = $this->User->find('all', array(
            'fields' => array("User.email",'User.sponcer','User.mobile','payment'),'conditions' => array('User.sponcer' => $mobile)
        ));
         //echo '<pre>'; print_r($users);die;
        if(!empty($users)){
            foreach ($users as $key => $value) {
                if($value['User']['payment'] == 1){
                    $value['User']['image'] = ABSOLUTE_URL.'/img/user1.png';
                } else {
                    $value['User']['image'] = ABSOLUTE_URL.'/img/user2.png';
                }
                $GLOBALS['SessionData'][] = $value['User'];
                $this->getRecursiveIcon($value['User']['mobile']); 
            }
        }
    }
    function income($type = null){
        $user_id = $this->_checkLogin();
        switch ($type) {
            case "active":
                $tp = 'Active-Zone';
                break;
            case "working":
            $tp = 'Working-Zone';
            $this->User->getTeam($this->Session->read('User.mobile'),1);
            $workingZone = Set::classicExtract($GLOBALS['Wallet'], '{n}.income');
            $this->set('workingZone',$workingZone);
            $this->set('walletData',$GLOBALS['Wallet']);
                break;
            case "safe":
            $tp = 'Safe-Zone';
                break;
            case "all":
                $tp = 'All-Zone';
                break;
            default:
                $tp = 'All-Zone';
        }

        $this->set('zone',$tp);
    }
    function incomeWallet(){
        $user_id = $this->_checkLogin();
        $data = $this->getAllIncomes($user_id);
        $this->set('workingZone',$workingZone);
        $this->set('walletData',$data);
    }
    function widrowMoney(){
        $user_id = $this->_checkLogin();
        $data['user_id'] = $user_id;
          $data['active'] = $this->data['Active'];
          $data['working'] = $this->data['Working'];
          $data['safe'] = $this->data['Safe'];
          $data['pin'] = '';
          $data['other'] = '';
          $data['is_paid'] = 0;
          $data['total'] = $this->data['Gtotal'];
          if ($data['total'] == ($data['working']+$data['active']+$data['safe'])) {
              $this->WithdrawalRequests->save($data);
          }
        $this->Session->setFlash('<div class="row text-center well"><h3 class="text-success">Thank you your requiest submitted successfully</h3></div>');
        $this->redirect( array( 'controller' => 'home_pages', 'action' => 'deshBoard' ) );
    }
    function txtHistory(){
        $user_id = $this->_checkLogin();
        $withdrawZoneWise = $this->WithdrawalRequests->find('all', array('conditions' => array('user_id' => $user_id)
        ));
        //echo '<pre>';print_r($withdrawZoneWise);die;
        $this->set('txtRequest',$withdrawZoneWise);
    }
    function pinParachase(){
        $user_id = $this->_checkLogin();
        $pin = $this->PinWallet->find('all', array('conditions' => array('user_id' => $user_id)
        ));
        $data = $this->getAllIncomes($user_id);
        $PinShop = $this->PinShop->find('all', array( 'conditions' => array('status' => 1)));
        $this->set('pinShop' ,$PinShop );
        $this->set('availbalePin',$pin);
        $this->set('availbaleIncome',$data);
        if ($this->data) {
           // echo '<pre>'; print_r($this->data);die;
            $data['active'] = $this->data['Active'];
            $data['user_id'] = $user_id;
            $data['working'] = $this->data['Working'];
            $data['safe'] = $this->data['Safe'];
            $data['pin'] = $this->data['quantity'];
            $data['other'] = '';
            $data['is_paid'] = 1;
            $data['total'] = $this->data['tot'];
            $pinW['user_id'] = $user_id;
            $pinW['status'] = 1;
            $pinW['created_by'] = 'user';
            for ($i=0; $i <$data['pin'] ; $i++) { 
                $pinW['cypher_code'] = $i."+".md5(date("YmdHis").$user_id.$i.'+');
                $this->PinWallet->create();
                $this->PinWallet->save($pinW);
            }
            if ($data['total'] == ($data['working']+$data['active']+$data['safe'])) {
                $this->WithdrawalRequests->save($data);
            }
            $this->Session->setFlash('<div class="row text-center well"><h3 class="text-success">Thank you your requiest submitted successfully</h3></div>');
            $this->redirect( array( 'controller' => 'home_pages', 'action' => 'deshBoard' ) );
        }
    }
    function pinRequestFromShop(){
        $this->autoRender = false;
        $this->layout = "";
        $user_id = $this->_checkLogin();
        if ($this->data) {
            $data['user_id'] = $user_id;
            $data['pin'] = $this->data['shopPinQuantity'];
            $data['is_paid'] = 0;
            $data['total'] = $this->data['total'];
            $pinW['user_id'] = $user_id;
            $pinW['status'] = 3;
            $pinW['created_by'] = 'shoper';
            $pinW['pin_franchise_id'] = $this->data['shopId'];
            for($i=0; $i <$data['pin'] ; $i++) { 
                $pinW['cypher_code'] = $i."+".md5(date("YmdHis").$user_id.$i.'+');
                $this->PinWallet->create();
                $this->PinWallet->save($pinW);
            }
            if ($data['total'] == ($data['working']+$data['active']+$data['safe'])) {
                $this->WithdrawalRequests->save($data);
            }
            $this->Session->setFlash('<div class="row text-center well"><h3 class="text-success">Thank you your requiest submitted successfully</h3></div>');
            $this->redirect( array( 'controller' => 'home_pages', 'action' => 'deshBoard' ) );
        } else {
            $this->Session->setFlash('<div class="row text-center well"><h3 class="text-danger">Something went wrong please try again</h3></div>');
            $this->redirect( array( 'controller' => 'home_pages', 'action' => 'deshBoard' ) );
        }
    }
    
}