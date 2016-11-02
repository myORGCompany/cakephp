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
    function getTeam($mobile,$level = 1){
        set_time_limit(0);
        $price = Configure::read('incomeGlobleArray');
        $users = $this->find('all', array(
            'fields' => array("User.mobile",'User.sponcer','payment','email'),'conditions' => array('User.sponcer' => $mobile)
        ));
        $lev = $level +1;
        //echo '<pre>##########'.$level.'######'; print_r($users);
        if(!empty($users)){
            foreach ($users as $key => $value) {
                if($value['User']['payment'] == 1){
                    $value['User']['level'] = $level;
                    $value['User']['income'] = $price[$level] ;
                    $GLOBALS['Wallet'][] = $value['User'];
                }
                $this->getTeam($value['User']['mobile'],$lev); 
            }  
        }
    }
    function getAwardsData($mobile,$level = 1){
        set_time_limit(0);
        $price = Configure::read('incomeGlobleArray');
        $users = $this->find('all', array(
            'fields' => array("User.mobile",'User.sponcer','payment','email','created'),'conditions' => array('User.sponcer' => $mobile)
        ));
        $lev = $level +1;
        //echo '<pre>##########'.$level.'######'; print_r($users);
        if(!empty($users)){
            foreach ($users as $key => $value) {
                if($value['User']['payment'] == 1){
                    $value['User']['level'] = $level;
                    $value['User']['income'] = $price[$level] ;
                    $GLOBALS['Award'][] = $value['User'];
                }
                $this->getAwardsData($value['User']['mobile'],$lev); 
            }  
        }
    }
    function getSafeZoneTree($userData){
        $users = $this->find('all', array(
            'fields' => array("User.email",'User.sponcer','mobile','payment'),'conditions' => array('User.id >' => $userData['UserId'])
            ));

        $parant =0;
        if($userData['payment'] == 1){
            $treeData[0]['image'] = ABSOLUTE_URL.'/img/user1.png';
        } else {
            $treeData[0]['image'] = ABSOLUTE_URL.'/img/user2.png';
        }
        $treeData[0]['key'] = 0;
        $treeData[0]['mobile'] = $users[0]['User']['mobile'];
        $treeData[0]['parant'] = "";
            foreach ($users as $key => $value) {
                $i = $key+1;
                if($key %2 ==0 && $key >= 2){
                    $parant++;
                }
                if (!empty($users[$i])) {
                    if($users[$i]['User']['payment'] == 1){
                        $treeData[$i]['image'] = ABSOLUTE_URL.'/img/user1.png';
                    } else {
                        $treeData[$i]['image'] = ABSOLUTE_URL.'/img/user2.png';
                    }
                    $treeData[$i]['key'] = $i;
                    $treeData[$i]['mobile'] = $users[$i]['User']['mobile'];
                    $treeData[$i]['parant'] = $parant;
                }
            }
            return $treeData;
    }
}
