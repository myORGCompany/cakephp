<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	//public $components = array('DebugKit.Toolbar');
  var $isLogin = false;
  public function beforeFilter() {
     if( !$this->Session->read('pop') ) {
          $this->Session->write('pop',0);
      }
      if( !$this->Session->read('team') ) {
          $this->Session->write('team',0);
      }
      if( !$this->Session->read('pop') ) {
          $this->Session->write('LoginAttempts',0);
      }
  }
	function _import($model, $constructor = null) {
      try {
        if (!$this->loadModel($model)) {
          throw new Exception();
        }
      } catch (Exception $e) {
        return $this->cakeError('missingModel', array(array('className' => $model, 'webroot' => '', 'base' => $this->base)));
        exit;
      }

      if ($constructor == null) {
        return new $model;
      } else {
        $constructor = implode(',', $constructor);
        return new $model($constructor);
      }
    }
    function _checkLogin() {
        if( $this->Session->read('User') ) {
           $Login =1;
           $this->Session->write('Login' , 1);
           $user = $this->Session->read('User');
           if(empty($user['r1']) || $user['r1'] != 1){
                $user_id =$user['user_id'];
                $this->redirect( array( 'controller' => 'home_pages', 'action' => 'r1' ) );
           }
           if($user['status'] == 1){
                $user_id =$user['UserId'];
                return $user_id;
           } else {
                $this->Session->delete('User');
                $this->Session->destroy();
                $this->redirect( array( 'controller' => 'home_pages', 'action' => 'index?status=5' ) );
           }
        } else {
            $this->redirect( array( 'controller' => 'home_pages', 'action' => 'index?status=6' ) );
        }
    }
    function checkRegisterdGetId($data = null,$type = null){
        $this->autoRender = false;
        $this->layout = null;
        $isMember = false;
        $User = $this->_import('User');
        if ($type == 1) {
           $source = 'User.email';
        } else if ($type == 2) {
           $source = 'User.mobile';
        } 
        $loginData = $User->find('first', array(
            'fields' => array("User.id"),
            'conditions' => array($source => $data)
        ));
        if (isset($loginData['User']['id']) && (int) $loginData['User']['id']) {
            $isMember = (int) $loginData['User']['id'];
        }
        return $isMember;
    }
    function getAllIncomes($user_id){
        if (empty($user_id)) {
            $user_id = $this->_checkLogin();
        }
        $User = $this->_import('User');
        $WithdrawalRequests = $this->_import('WithdrawalRequests');
        $ActiveZone = $this->_import('ActiveZone');
        $userData = $User->find('first', array('conditions' => array('User.id' => $user_id)));
        $userData['User']['UserId'] = $userData['User']['id'];
        $is_paid = array('0','1');
        $withdrawZoneWise = $WithdrawalRequests->getWithdrawalRequiest($user_id,$is_paid);
        $data = $User->getTeam($userData['User']['mobile'],1);
        $workingZone = Set::classicExtract($GLOBALS['Wallet'], '{n}.income');
        $actCount = 0; 
        $safeCount = 0;
        $active = $ActiveZone->getActiveZoneTree($user_id);
        $safe = $User->getSafeZoneTree($userData['User']);
        $safeZonePairs = Set::classicExtract($safe, '{n}.parant');
        $vals1 = array_count_values($safeZonePairs);
        $activeZonePairs = Set::classicExtract($active, '{n}.parant');
        $vals2 = array_count_values($activeZonePairs);
        foreach ($vals2 as $key => $value) {
             if ($key != '' && $value >= 2) {
                 $actCount++;
             }
        }
        foreach ($vals1 as $key => $value) {
             if ($key != '' && $value >= 2) {
                 $safeCount++;
             }
        }
        $data[0]['zone'] = 'Working';
        $data[0]['income'] = array_sum($workingZone) - $withdrawZoneWise['working'];
        $data[1]['zone'] = 'Active';
        $data[1]['income'] = ($actCount*10) - $withdrawZoneWise['active'];
        $data[2]['zone'] = 'Safe';
        $data[2]['income'] = ($safeCount*5) - $withdrawZoneWise['safe'];
        return $data;
    }
    function _checkAdminLogin(){
        if( $this->Session->read('User') ) {
           $Login =1;
           $this->Session->write('Login' , 1);
           $user = $this->Session->read('User');
           if(empty($user['r1']) || $user['r1'] != 1){
                $user_id =$user['user_id'];
                $this->redirect( array( 'controller' => 'home_pages', 'action' => 'r1' ) );
           }
           if($user['status'] == 1 && $user['is_admin'] == 1){
                $user_id =$user['UserId'];
                return $user_id;
           } else {
                $this->Session->delete('User');
                $this->Session->destroy();
                $this->redirect( array( 'controller' => 'home_pages', 'action' => 'index?status=5' ) );
           }
        } else {
            $this->redirect( array( 'controller' => 'home_pages', 'action' => 'index?status=6' ) );
        }
    }
}
