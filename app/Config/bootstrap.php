<?php
/**
 * This file is loaded automatically by the app/webroot/index.php file after core.php
 *
 * This file should load/create any application wide configuration settings, such as
 * Caching, Logging, loading additional configuration files.
 *
 * You should also use this file to include any files that provide global functions/constants
 * that your application uses.
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));

/**
 * The settings below can be used to set additional paths to models, views and controllers.
 *
 * App::build(array(
 *     'Model'                     => array('/path/to/models/', '/next/path/to/models/'),
 *     'Model/Behavior'            => array('/path/to/behaviors/', '/next/path/to/behaviors/'),
 *     'Model/Datasource'          => array('/path/to/datasources/', '/next/path/to/datasources/'),
 *     'Model/Datasource/Database' => array('/path/to/databases/', '/next/path/to/database/'),
 *     'Model/Datasource/Session'  => array('/path/to/sessions/', '/next/path/to/sessions/'),
 *     'Controller'                => array('/path/to/controllers/', '/next/path/to/controllers/'),
 *     'Controller/Component'      => array('/path/to/components/', '/next/path/to/components/'),
 *     'Controller/Component/Auth' => array('/path/to/auths/', '/next/path/to/auths/'),
 *     'Controller/Component/Acl'  => array('/path/to/acls/', '/next/path/to/acls/'),
 *     'View'                      => array('/path/to/views/', '/next/path/to/views/'),
 *     'View/Helper'               => array('/path/to/helpers/', '/next/path/to/helpers/'),
 *     'Console'                   => array('/path/to/consoles/', '/next/path/to/consoles/'),
 *     'Console/Command'           => array('/path/to/commands/', '/next/path/to/commands/'),
 *     'Console/Command/Task'      => array('/path/to/tasks/', '/next/path/to/tasks/'),
 *     'Lib'                       => array('/path/to/libs/', '/next/path/to/libs/'),
 *     'Locale'                    => array('/path/to/locales/', '/next/path/to/locales/'),
 *     'Vendor'                    => array('/path/to/vendors/', '/next/path/to/vendors/'),
 *     'Plugin'                    => array('/path/to/plugins/', '/next/path/to/plugins/'),
 * ));
 */

/**
 * Custom Inflector rules can be set to correctly pluralize or singularize table, model, controller names or whatever other
 * string is passed to the inflection functions
 *
 * Inflector::rules('singular', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 * Inflector::rules('plural', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 */

/**
 * Plugins need to be loaded manually, you can either load them one by one or all of them in a single call
 * Uncomment one of the lines below, as you need. Make sure you read the documentation on CakePlugin to use more
 * advanced ways of loading plugins
 *
 * CakePlugin::loadAll(); // Loads all plugins at once
 * CakePlugin::load('DebugKit'); // Loads a single plugin named DebugKit
  
 */

/**
 * To prefer app translation over plugin translation, you can set
 *
 * Configure::write('I18n.preferApp', true);
 */

/**
 * You can attach event listeners to the request lifecycle as Dispatcher Filter. By default CakePHP bundles two filters:
 *
 * - AssetDispatcher filter will serve your asset files (css, images, js, etc) from your themes and plugins
 * - CacheDispatcher filter will read the Cache.check configure variable and try to serve cached content generated from controllers
 *
 * Feel free to remove or add filters as you see fit for your application. A few examples:
 *
 * Configure::write('Dispatcher.filters', array(
 *		'MyCacheFilter', //  will use MyCacheFilter class from the Routing/Filter package in your app.
 *		'MyCacheFilter' => array('prefix' => 'my_cache_'), //  will use MyCacheFilter class from the Routing/Filter package in your app with settings array.
 *		'MyPlugin.MyFilter', // will use MyFilter class from the Routing/Filter package in MyPlugin plugin.
 *		array('callable' => $aFunction, 'on' => 'before', 'priority' => 9), // A valid PHP callback type to be called on beforeDispatch
 *		array('callable' => $anotherMethod, 'on' => 'after'), // A valid PHP callback type to be called on afterDispatch
 *
 * ));
 */
Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
	'engine' => 'File',
	'types' => array('notice', 'info', 'debug'),
	'file' => 'debug',
));
CakeLog::config('error', array(
	'engine' => 'File',
	'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
	'file' => 'error',
));
Configure::write('default_css_jobseeker', array('bootstrap', 'hh-theme'));
Configure::write('incomeGlobleArray', array(1 => '250',2 => '175',3 => '150',4 => '50',5 => '50',6 => '50',7 => '100',8 => '300',9 => '400'));
Configure::write('AWARDSPRICE', array(3 => 'Smart Phone',5 => 'Laptop',7 => 'Bike',8 => 'Nano Car',9 => 'Honda City'));
define('PIN_PRICE',200);
Configure::write('cityArray', array('Any','Ahmedabad','Bangalore','Chennai','Delhi','Hyderabad','Kolkata','Mumbai','Pune','Agartala','Agra','Ahmednagar','Aizawal','Ajmer','Aligarh','Allahabad','Ambala','Amritsar','Anand','Ankleshwar','Asansol','Aurangabad','Bahgalpur','Bareilly','Vadodara','Belgaum','Bellary','Bharuch','Bhatinda','Bhavnagar','Bhiwani','Bhopal','Bhubaneshwar','Bhuj','Bidar','Bilaspur','Bokaro','Calicut','Chandigarh','Coimbatore','Cuttack','Dalhousie','Daman','Dehradun','Dhanbad','Dharamshala','Dharwad','Dispur','Durgapur','Ernakulam','Erode','Faizabad','Gandhinagar','Gangtok','Panaji','Gorakhpur','Gulbarga','Guntur','Guwahati','Gwalior','Haldia','Hisar','Hosur','Hubli','Imphal','Indore','Itanagar','Jabalpur','Jaipur','Jaisalmer','Jalandhar','Jalgaon','Jammu','Jamnagar','Jamshedpur','Jodhpur','Kakinada','Kandla','Kannur','Kanpur','Karnal','Kavaratti','Kharagpur','Kochi','Kohima','Kolar','Kolhapur','Kollam','Kota','Kottayam','Kullu Manali','Kurnool','Kurukshetra','Lucknow','Ludhiana','Madurai','Mangalore','Mathura','Meerut','Mohali','Moradabad','Mysore','Nagercoil','Nagpur','Nashik','Nellore','Nizamabad','Ooty','Palakkad','Panipat','Paradeep','Pathankot','Patiala','Patna','Pondicherry','Porbandar','Port Blair','Puri','Quilon','Raipur','Rajahmundry','Rajpur','Ranchi','Rohtak','Roorkee','Rourkela','Salem','Shillong','Shimla','Sholapur','Silchar','Siliguri','Silvassa','Srinagar','Surat','Thanjavur','Thrissur','Trivandrum','Tirunelveli','Tirupati','Trichy','Tuticorin','Udaipur','Ujjain','Valsad','Vapi','Varanasi','Vellore','Vijaywada','Visakhapatnam','Warangal','Other India','Gurgaon','Noida','Greater Noida','Ghaziabad','Faridabad','Bhilwara','Mundra','Tirora','Dahej','Chhindwara','Bhadreshwar','Kawai','Navi Mumbai','Gajraula','Rajkot','India - East','India - West','India - North','India - South','Laxmipur','Neemrana','Hirakud','Wani','Maihar','Gondavali','Wada','Secunderabad','Amravati','Bhiwadi','Taloja','Kamalapuram','Sewa','Vizag','Raigad','Bhadrachalam','Rudrapur','kundanganj','Tadipatri','Ananthpur','Sutrapada','Vadinar','Anpara','Alibaug','Bhognipur','Baddi','Supa','Satara','Dharuhera','Patalganga','Kurkumbh','Sikkim','Rajnandgaon','Sriperumbudur','Ambattur','Patan','Junagarh','Zirakpur','Jabli','Satna','Chanderia','Barh','Raibareilly','Birlapur','Balasore','Angul','Chittorgarh','Jharsugda','Teztur','Saharsa','Sagauli','Jakhal','Bhogat','Zaheerabad','Barmer','Ratnagiri','Vijaynagar','Kutehr','Salboni','Tarkeshwar','Renukoot','Chandrapur','Latur','Bhiwandi','Dewas','Sinnar','Nandurbar','Dhule','Jhansi','Mokochung','Florida','delhi','kerala','kozhikode','Mehsana','Haridwar','Anjar','Kalol','Morbi','Purnia','Motihari','Darbhanga','Mandsaur','Pantnagar','Sambalpur','Karur','Baramati','Sonipat','Chamba','Tamnar','Hoshiarpur','Gandhidham','Bikaner','Kundli','Pithampur','Surendranagar','chalakudy','Arakkonam','Rampur','Hoshangabad','Ratlam','Hinjewadi','Haldwani','Gurdaspur','Gaya','Sanand','Alwar','Veraval','Jhagadia','Kishangarh','Panoli','Manesar','Warora','Anuppur','Hospet','Nagda','Harihar','Khurja','Khurda','Bhagalpur','Bhilai','Shimoga','Korba','Tada','Savli','Tawang','Thane','Sirsa','Kashipur','Kandhar','Godhra','Bhind','Yamuna Nagar','Rewari','Etalin','Bongaigaon','Shahabad','Raigarh','Subansiri','Roing','Tanuku','West Godavari','Bhimavaram','Solapur','Rosa','Sitapur','Burhwal','Tarapur','Parbhani','Morinda','Paonta Sahib','Manipal','Barbil','Kadapa','Chikmagalur','Vadakkencherry','Mudhol','Kathiawad','Tumsar','Kasauli','Alleppey','Churu','Chiplun','Beawar','Jadcherla','Gummidipoondi','Cuddalore','Panchkula','Sonebhadra','Rajganpur','Adilabad','Shaktinagar','Muzaffarnagar','Satharia','Golan','Siwan','Jeypore','Bundi','Pali','Sikar','Dahod','Bargarh','Rudraprayag','Karimnagar','Gondal','Palanpur','Halol','Joda','Chaibasa','Himmatnagar','Hardoi','Tirupur','Banswara','Akola','Unjha','Bardoli','Cheeka','Kapurthala','Duliajan','Fatehabad','Kadi','Khanpur','Konnagar','Phagwara','Samastipur','Newai','Hansi','Piplia Mandi','Mullanpur Dakha','Palwal','Nadiad','Nagaur','Naila Janjgir','Sangrur','Sankagiri','Pichandarkovil','Chingleput','Amreli','Mahendragarh','Davangere','Jorhat','Palsana','Sidhpur','Rishabhdeo','Rajsamand','Bhucho Mandi','Vallabh Vidhyanagar','Sachin','Bodeli','Rajmahal','Sundergarh','Vasai-Virar','Amloh','Bijnor','Shujalpur','Soyagaon','Nathdwara','Navsari','Dahanu','Deesa','Modasa','Saputara','Shirdi','Tiruvannamalai','Bahadurgarh','Amtala','Miryalguda','Rayagada','Farakka','Guntakal','Itarsi','Singrauli','Jamalpur','Proddatur','Lavasa','Mandi','Katra','Leh','Begowal','Sagwara','Pratapgarh','Ramganj','Rishikesh','Digboi','Nalbari','Nazira','Sibsagar','Diphu','Kishanganj','Dalli Rajhara','Churachanpur','Tura','Khliehriat','Darlipali','Bhograi','Badharghat','Kailasahar','Teliamuraanch','Dinhata','Malbazaranch','Arambag','Rupnarayanpur','Egra','Howrah','Hilianch','Kapadvanj','Dharmaj','Dhamnod','Karad','Kumbhoj','Tasgaon','Jath','Kamptee','Govandi','Dombivli','Airoli','Nerul','Kandukur','Palacole','Williamnagar','Mokokchung','Rajapur','Pokhran','Malappuram','Sanchore','Kosi','Nalgonda','Bhongir','Ganganagar','Bawal','Wardha','Khopoli','Roha','Saharanpur','Firozabad','Kanyakumari','Bijapur','Raichur','Jajpur','Udhampur','Parwanoo','Etah','Begusarai','Nawanshahr','Bagalkot','Amarillo','Godda','Dadri','Sangli','Dindigul','Sitarganj','Bazpur','Bhadrak','Surajgarh','Kanchipuram','Khatima','Sri Ganganagar','Sihora','Sidhi','Shrirampur','Tezpur','Dehri','Bhagwanpur','Guna','Palampur','Orai','Kutch','Ballia','Bahraich','Basti','Moga','Faridkot','Keonjhar','Yerraguntla','Tumkur','Kangra','Bathinda','Lakhimpur','Muzaffarpur','Rawatbhata','Nanded','Mahbubnagar','Shahdol','Jaigarh','Katni','Mahasamund','Ambikapur','Jagdalpur','Sikandrabad','Shahpura','Hazaribagh','Armoor','Bashir Bag','Eluru','Hindupur','Moti Nagar','Nandyal','Peddapuram','Arrah','Banka','Bhabua','Katihar','Laheriasarai','Lohardaga','Madhepura','Sindri','Bhatapara','Phulbani','Barpeta','Bomdila','Dibrugarh','Lamphelpat','Naharlagun','Bagnan','Baidyabati','Bansberia','Baruipur','Burdwan','Canning','Chakdaha Bongaon','Domjur','Hugli','Jamuria','Kakdwip','Karimpur','Raigunj','Rajpur Sonarpur','Uluberia','Badgam','Baramulla','Kargil','Pampore','Pulwama','Rajouri','Reasi','Samba','Sopore','Batala','Beas','Bharoli Kalan','Dhuri','Firozpur','Jagraon','Jind','Mojowal','Narnaul','Thoba Dhani','Zira','Chandaulli','Hapur','Arsikere','Chikmadure','Chikodi','Hosekera','Karikere','Kumta','Mirjan','Naganur','Nelhal','Rannibennur','Shirahatti','Balusseri','Kizhoor','Kodivayoor','Kottarakkara','Kumily','Shornur','Mananthavady','Mattannur','Nedumangad','Ottappalam','Palghat','Parassala','Pathanapuram','Triprayar','Vadakkancheri','Vazhuthacaud','Harur','Kallakkuruchi','Oddanchatram','Oragadam','Perundurai','Pollachi','Ulundurpettai','Veerapandi','Villupuram','Candolim','Cansualim','Margao','Mapusa','Chhota Udaipur','Dhoraji','Dungar','Gadag','Mahesana','Navalgadh','Ramnagar','Thangad','Dhamna','Dhar','Mahodiya','Melkheda','Panna','Rajoda','Rajpura','Pipariya','Shamgarh','Sheopur','Umaria','Achalpur','Ambejogai','Ankalkhop','Chalisgaon','Ichalkaranji','Igatpuri','Paranda','Phaltan','Jetpur','Vaishali','Yavatmal','Washim','Rewa','Dimapur','Haflong','Talcher','Shirpur','Hajipur','Namakkal'));