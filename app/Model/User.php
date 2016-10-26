 <?php

App::uses('AppModel', 'Model');

class User extends AppModel {

    var $name = 'User';
    
    var $assocs = array();
    public function checkMemberShipByMobile($mobile) {
        $isMember = false;
        $LoginData = $this->find('first', array(
            'fields' => array("id"),
            'conditions' => array('mobile' => $mobile)
        ));
        if (isset($LoginData['User']['id']) && (int) $LoginData['User']['id']) {
            $isMember = (int) $LoginData['User']['id'];
        }
        return $isMember;
    }
    function CheckDirectIds($email = null){
        if(empty($email)){
            return false;
        }
        $mobile = $this->find('first', array(
            'fields' => array("mobile","id"),
            'conditions' => array('email' => $email)
        ));
        $directs = $this->find('all', array(
            'fields' => array("id"),
            'conditions' => array('sponcer' => $mobile['User']['mobile'])
        ));
        $ids['ids'] = Set::classicExtract($directs, '{n}.User.id');
        $ids['user_id'] = $mobile['User']['id'];
        $ids['mobile'] = $mobile['User']['mobile'];
        return $ids;
    }
}
