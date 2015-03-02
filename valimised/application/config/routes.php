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
$route['kandidaadid/get'] = 'candidates_controller/get';
$route['kandidaadid/get/(:num)/(:num)'] = 'candidates_controller/get/$1/$2';

$route['tulemused'] = 'results_controller';
$route['tulemused/get/(:num)/(:num)'] = 'results_controller/get/$1/$2';

$route['kandideerimine'] = 'apply_controller';
$route['kandideerimine/esita'] = 'apply_controller/apply';

$route['kandidaat'] = 'candidate_controller';
$route['kandidaat/nr/(:num)'] = 'candidate_controller/get/$1';



/* End of file routes.php */
/* Location: ./application/config/routes.php */