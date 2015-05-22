<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
*/

$route['default_controller'] = "home_controller";
$route['404_override'] = 'error_controller';

$route['kandidaadid'] = 'candidates_controller';
$route['kandidaadid/(:num)'] = 'candidates_controller/candidates/$1';
$route['kandidaadid/get'] = 'candidates_controller/get';
$route['kandidaadid/get/(:num)/(:num)/(:num)'] = 'candidates_controller/get/$1/$2/$3';
$route['kandidaadid/search/(:num)/(:num)/(:any)'] = 'candidates_controller/get/$1/$2/$3';
$route['kandidaadid/getJSON/(:num)'] = 'candidate_controller/getJSON/$1';

$route['tulemused'] = 'results_controller';
$route['tulemused/get/(:num)/(:num)'] = 'results_controller/get/$1/$2';
$route['tulemused/getGeneralResults'] = 'results_controller/getGeneralResults';
$route['tulemused/getGeneralPartyResults'] = 'results_controller/getGeneralPartyResults';
$route['tulemused/getPartyResults/(:num)'] = 'results_controller/getPartyResults/$1';
$route['tulemused/getGeneralCandidateResults'] = 'results_controller/getGeneralCandidateResults';
$route['tulemused/getCandidateResults/(:num)'] = 'results_controller/getCandidateResults/$1';
$route['tulemused/getCandidatePartyResults/(:num)'] = 'results_controller/getCandidatePartyResults/$1';


$route['kandideerimine'] = 'apply_controller';
$route['kandideerimine/esita'] = 'apply_controller/apply/';

$route['kandidaat'] = 'candidate_controller';
$route['kandidaat/nr/(:num)'] = 'candidate_controller/get/$1';

$route['haaletamine'] = 'voting_controller';
$route['haaleta/(:num)'] = 'voting_controller/vote/$1';
$route['haaleta'] = 'voting_controller/vote/-1';


$route['login'] = 'login_controller/login';
$route['login/modal'] = 'login_controller/modal';
$route['logout'] = 'home_controller/index/logout';
$route['logged/redirect/(:any)'] = 'logged_controller/redirect/$1';
$route['index.php/logged/redirect/(:any)'] = 'logged_controller/redirect/$1';
$route['index.php/logged/(:any)'] = 'logged_controller/redirect/index.php';
$route['logged/(:any)'] = 'logged_controller/redirect/';

$route['testid'] = 'tests_controller';

/* End of file routes.php */
/* Location: ./application/config/routes.php */