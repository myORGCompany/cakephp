 <?php

App::uses('AppModel', 'Model');

class WithdrawalRequests extends AppModel {

    var $name = 'WithdrawalRequests';
    
    var $assocs = array();
    function getWithdrawalRequiest($id,$status = 0){
    	$widrols = $this->find('all', array('conditions' => array('user_id' => $id ,'is_paid' => $status)
        ));
        $withdrawZoneWise = array();
        foreach ($widrols as $key => $value) {
            //echo '<pre>';print_r($value);
            $withdrawZoneWise['active'] = $withdrawZoneWise['active'] + $value['WithdrawalRequests']['active'];
            $withdrawZoneWise['working'] = $withdrawZoneWise['working'] + $value['WithdrawalRequests']['working'];
            $withdrawZoneWise['safe'] = $withdrawZoneWise['safe'] + $value['WithdrawalRequests']['safe'];
            $withdrawZoneWise['other'] = $withdrawZoneWise['other'] + $value['WithdrawalRequests']['other'];
            $withdrawZoneWise['pin'] = $withdrawZoneWise['pin'] + $value['WithdrawalRequests']['pin'];
            $withdrawZoneWise['total'] = $withdrawZoneWise['total'] + $value['WithdrawalRequests']['total'];
        }
        return $withdrawZoneWise;
    }
}
