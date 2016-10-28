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
	public $uses = array('UserBank','GiveHelp','User','GetHelp','PopLead','PinShop','UserProfile');

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
				$data['UserId'] = $login_detail['User']['id'];
				$data['email'] = $login_detail['User']['email'];
				$data['mobile'] = $login_detail['User']['mobile'];
				$data['status'] = $login_detail['User']['status'];
				$data['payment'] = $login_detail['User']['payment'];
				$data['sponcer'] = $login_detail['sponcer'];
				$data['r1'] = $login_detail['User']['r1'];
				$data['name'] = $login_detail['User']['name'];
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
		$city = array('Any','Ahmedabad','Bangalore','Chennai','Delhi','Hyderabad','Kolkata','Mumbai','Pune','Agartala','Agra','Ahmednagar','Aizawal','Ajmer','Aligarh','Allahabad','Ambala','Amritsar','Anand','Ankleshwar','Asansol','Aurangabad','Bahgalpur','Bareilly','Vadodara','Belgaum','Bellary','Bharuch','Bhatinda','Bhavnagar','Bhiwani','Bhopal','Bhubaneshwar','Bhuj','Bidar','Bilaspur','Bokaro','Calicut','Chandigarh','Coimbatore','Cuttack','Dalhousie','Daman','Dehradun','Dhanbad','Dharamshala','Dharwad','Dispur','Durgapur','Ernakulam','Erode','Faizabad','Gandhinagar','Gangtok','Panaji','Gorakhpur','Gulbarga','Guntur','Guwahati','Gwalior','Haldia','Hisar','Hosur','Hubli','Imphal','Indore','Itanagar','Jabalpur','Jaipur','Jaisalmer','Jalandhar','Jalgaon','Jammu','Jamnagar','Jamshedpur','Jodhpur','Kakinada','Kandla','Kannur','Kanpur','Karnal','Kavaratti','Kharagpur','Kochi','Kohima','Kolar','Kolhapur','Kollam','Kota','Kottayam','Kullu Manali','Kurnool','Kurukshetra','Lucknow','Ludhiana','Madurai','Mangalore','Mathura','Meerut','Mohali','Moradabad','Mysore','Nagercoil','Nagpur','Nashik','Nellore','Nizamabad','Ooty','Palakkad','Panipat','Paradeep','Pathankot','Patiala','Patna','Pondicherry','Porbandar','Port Blair','Puri','Quilon','Raipur','Rajahmundry','Rajpur','Ranchi','Rohtak','Roorkee','Rourkela','Salem','Shillong','Shimla','Sholapur','Silchar','Siliguri','Silvassa','Srinagar','Surat','Thanjavur','Thrissur','Trivandrum','Tirunelveli','Tirupati','Trichy','Tuticorin','Udaipur','Ujjain','Valsad','Vapi','Varanasi','Vellore','Vijaywada','Visakhapatnam','Warangal','Other India','Gurgaon','Noida','Greater Noida','Ghaziabad','Faridabad','Bhilwara','Mundra','Tirora','Dahej','Chhindwara','Bhadreshwar','Kawai','Navi Mumbai','Gajraula','Rajkot','India - East','India - West','India - North','India - South','Laxmipur','Neemrana','Hirakud','Wani','Maihar','Gondavali','Wada','Secunderabad','Amravati','Bhiwadi','Taloja','Kamalapuram','Sewa','Vizag','Raigad','Bhadrachalam','Rudrapur','kundanganj','Tadipatri','Ananthpur','Sutrapada','Vadinar','Anpara','Alibaug','Bhognipur','Baddi','Supa','Satara','Dharuhera','Patalganga','Kurkumbh','Sikkim','Rajnandgaon','Sriperumbudur','Ambattur','Patan','Junagarh','Zirakpur','Jabli','Satna','Chanderia','Barh','Raibareilly','Birlapur','Balasore','Angul','Chittorgarh','Jharsugda','Teztur','Saharsa','Sagauli','Jakhal','Bhogat','Zaheerabad','Barmer','Ratnagiri','Vijaynagar','Kutehr','Salboni','Tarkeshwar','Renukoot','Chandrapur','Latur','Bhiwandi','Dewas','Sinnar','Nandurbar','Dhule','Jhansi','Mokochung','Florida','delhi','kerala','kozhikode','Mehsana','Haridwar','Anjar','Kalol','Morbi','Purnia','Motihari','Darbhanga','Mandsaur','Pantnagar','Sambalpur','Karur','Baramati','Sonipat','Chamba','Tamnar','Hoshiarpur','Gandhidham','Bikaner','Kundli','Pithampur','Surendranagar','chalakudy','Arakkonam','Rampur','Hoshangabad','Ratlam','Hinjewadi','Haldwani','Gurdaspur','Gaya','Sanand','Alwar','Veraval','Jhagadia','Kishangarh','Panoli','Manesar','Warora','Anuppur','Hospet','Nagda','Harihar','Khurja','Khurda','Bhagalpur','Bhilai','Shimoga','Korba','Tada','Savli','Tawang','Thane','Sirsa','Kashipur','Kandhar','Godhra','Bhind','Yamuna Nagar','Rewari','Etalin','Bongaigaon','Shahabad','Raigarh','Subansiri','Roing','Tanuku','West Godavari','Bhimavaram','Solapur','Rosa','Sitapur','Burhwal','Tarapur','Parbhani','Morinda','Paonta Sahib','Manipal','Barbil','Kadapa','Chikmagalur','Vadakkencherry','Mudhol','Kathiawad','Tumsar','Kasauli','Alleppey','Churu','Chiplun','Beawar','Jadcherla','Gummidipoondi','Cuddalore','Panchkula','Sonebhadra','Rajganpur','Adilabad','Shaktinagar','Muzaffarnagar','Satharia','Golan','Siwan','Jeypore','Bundi','Pali','Sikar','Dahod','Bargarh','Rudraprayag','Karimnagar','Gondal','Palanpur','Halol','Joda','Chaibasa','Himmatnagar','Hardoi','Tirupur','Banswara','Akola','Unjha','Bardoli','Cheeka','Kapurthala','Duliajan','Fatehabad','Kadi','Khanpur','Konnagar','Phagwara','Samastipur','Newai','Hansi','Piplia Mandi','Mullanpur Dakha','Palwal','Nadiad','Nagaur','Naila Janjgir','Sangrur','Sankagiri','Pichandarkovil','Chingleput','Amreli','Mahendragarh','Davangere','Jorhat','Palsana','Sidhpur','Rishabhdeo','Rajsamand','Bhucho Mandi','Vallabh Vidhyanagar','Sachin','Bodeli','Rajmahal','Sundergarh','Vasai-Virar','Amloh','Bijnor','Shujalpur','Soyagaon','Nathdwara','Navsari','Dahanu','Deesa','Modasa','Saputara','Shirdi','Tiruvannamalai','Bahadurgarh','Amtala','Miryalguda','Rayagada','Farakka','Guntakal','Itarsi','Singrauli','Jamalpur','Proddatur','Lavasa','Mandi','Katra','Leh','Begowal','Sagwara','Pratapgarh','Ramganj','Rishikesh','Digboi','Nalbari','Nazira','Sibsagar','Diphu','Kishanganj','Dalli Rajhara','Churachanpur','Tura','Khliehriat','Darlipali','Bhograi','Badharghat','Kailasahar','Teliamuraanch','Dinhata','Malbazaranch','Arambag','Rupnarayanpur','Egra','Howrah','Hilianch','Kapadvanj','Dharmaj','Dhamnod','Karad','Kumbhoj','Tasgaon','Jath','Kamptee','Govandi','Dombivli','Airoli','Nerul','Kandukur','Palacole','Williamnagar','Mokokchung','Rajapur','Pokhran','Malappuram','Sanchore','Kosi','Nalgonda','Bhongir','Ganganagar','Bawal','Wardha','Khopoli','Roha','Saharanpur','Firozabad','Kanyakumari','Bijapur','Raichur','Jajpur','Udhampur','Parwanoo','Etah','Begusarai','Nawanshahr','Bagalkot','Amarillo','Godda','Dadri','Sangli','Dindigul','Sitarganj','Bazpur','Bhadrak','Surajgarh','Kanchipuram','Khatima','Sri Ganganagar','Sihora','Sidhi','Shrirampur','Tezpur','Dehri','Bhagwanpur','Guna','Palampur','Orai','Kutch','Ballia','Bahraich','Basti','Moga','Faridkot','Keonjhar','Yerraguntla','Tumkur','Kangra','Bathinda','Lakhimpur','Muzaffarpur','Rawatbhata','Nanded','Mahbubnagar','Shahdol','Jaigarh','Katni','Mahasamund','Ambikapur','Jagdalpur','Sikandrabad','Shahpura','Hazaribagh','Armoor','Bashir Bag','Eluru','Hindupur','Moti Nagar','Nandyal','Peddapuram','Arrah','Banka','Bhabua','Katihar','Laheriasarai','Lohardaga','Madhepura','Sindri','Bhatapara','Phulbani','Barpeta','Bomdila','Dibrugarh','Lamphelpat','Naharlagun','Bagnan','Baidyabati','Bansberia','Baruipur','Burdwan','Canning','Chakdaha Bongaon','Domjur','Hugli','Jamuria','Kakdwip','Karimpur','Raigunj','Rajpur Sonarpur','Uluberia','Badgam','Baramulla','Kargil','Pampore','Pulwama','Rajouri','Reasi','Samba','Sopore','Batala','Beas','Bharoli Kalan','Dhuri','Firozpur','Jagraon','Jind','Mojowal','Narnaul','Thoba Dhani','Zira','Chandaulli','Hapur','Arsikere','Chikmadure','Chikodi','Hosekera','Karikere','Kumta','Mirjan','Naganur','Nelhal','Rannibennur','Shirahatti','Balusseri','Kizhoor','Kodivayoor','Kottarakkara','Kumily','Shornur','Mananthavady','Mattannur','Nedumangad','Ottappalam','Palghat','Parassala','Pathanapuram','Triprayar','Vadakkancheri','Vazhuthacaud','Harur','Kallakkuruchi','Oddanchatram','Oragadam','Perundurai','Pollachi','Ulundurpettai','Veerapandi','Villupuram','Candolim','Cansualim','Margao','Mapusa','Chhota Udaipur','Dhoraji','Dungar','Gadag','Mahesana','Navalgadh','Ramnagar','Thangad','Dhamna','Dhar','Mahodiya','Melkheda','Panna','Rajoda','Rajpura','Pipariya','Shamgarh','Sheopur','Umaria','Achalpur','Ambejogai','Ankalkhop','Chalisgaon','Ichalkaranji','Igatpuri','Paranda','Phaltan','Jetpur','Vaishali','Yavatmal','Washim','Rewa','Dimapur','Haflong','Talcher','Shirpur','Hajipur','Namakkal');
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
}