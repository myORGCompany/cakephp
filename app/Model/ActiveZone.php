 <?php

App::uses('AppModel', 'Model');

class ActiveZone extends AppModel {

    var $name = 'ActiveZone';
    
    var $assocs = array();
    function getActiveZoneTree($id){
        $users = $this->find('first', array(
            'fields' => array('created'),'conditions' => array('user_id' => $id)
            ));
        $activeUsers = $this->find('all', array(
            'fields' => array("User.mobile",'ActiveZone.id','ActiveZone.created'),
            'conditions' => array('ActiveZone.created >=' => $users['ActiveZone']['created']),
            'joins' => array(
                    array('table'=>'users','alias'=>'User','type'=>'inner','conditions'=>array('ActiveZone.user_id = User.id'))
                ),
            'order' => 'ActiveZone.created'
            ));
        $parant =0;
        $treeData[0]['key'] = 0;
        $treeData[0]['mobile'] = $activeUsers[0]['User']['mobile'];
        $treeData[0]['parant'] = "";
        $treeData[0]['image'] = ABSOLUTE_URL.'/img/user1.png';
        foreach ($activeUsers as $key => $value) {
            $i = $key+1;
            if($key %2 ==0 && $key >= 2){
                $parant++;
            }
            if (!empty($activeUsers[$i])) {
                $treeData[$i]['key'] = $i;
                $treeData[$i]['mobile'] = $activeUsers[$i]['User']['mobile'];
                $treeData[$i]['parant'] = $parant;
                $treeData[$i]['image'] = ABSOLUTE_URL.'/img/user1.png';
            }
        }
        return $treeData;
    }
}
