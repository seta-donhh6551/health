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
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['default_controller'] = "home/index";
$route['404_override'] = 'home/notfound';
$route['([a-zA-Z0-9-_]+)'] = "home/category/index";
$route['([a-zA-Z0-9-_]+)/(:num)'] = "home/category/index/(:num)";
$route['([a-zA-Z0-9-_]+)/([a-zA-Z0-9-_]+)-(:num)'] = "home/posts/view";
$route['([a-zA-Z0-9-_]+)/([a-zA-Z0-9-_]+)'] = "home/category/categorie/";
$route['([a-zA-Z0-9-_]+)/([a-zA-Z0-9-_]+)/(:num)'] = "home/category/categorie/(:num)";
//$route['([a-zA-Z0-9-_]+)-for-kids/([a-zA-Z0-9-_]+)'] = "home/category/types";
//$route['([a-zA-Z0-9-_]+)-for-kids/([a-zA-Z0-9-_]+)/(:num)'] = "home/category/types/(:num)";
$route['search'] = "home/search";
//$route['quiz-questions'] = "home/question/index";

// admin
$route['admin/index'] = "admin/index";
$route['haanhdon'] = "admin/index";
$route['admin/cate'] = "admin/cate";
$route['admin/user'] = "admin/user";
$route['admin/posts'] = "admin/posts";
$route['admin/categorie'] = "admin/categorie";
$route['admin/intro/index'] = "admin/intro/index";
$route['admin/config'] = "admin/config";
$route['admin/verify'] = "admin/verify";



/* End of file routes.php */
/* Location: ./application/config/routes.php */