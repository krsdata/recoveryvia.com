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

$route['default_controller'] = "sharemarket";
$route['404_override'] = '';

$route['pricing'] = 'sharemarket/pricing';
$route['services'] = 'sharemarket/services';
$route['contact'] = 'sharemarket/contactus';
$route['company-profile'] = 'sharemarket/companyProfile';
$route['payment'] = 'sharemarket/payment';
$route['free-trial'] = 'sharemarket/freeTrial';
$route['past-performance'] = 'sharemarket/pastRecord';
$route['startTrial'] = 'sharemarket/startTrial'; 
$route['service-details/(:any)'] = 'sharemarket/serviceDetails'; 

 $route['special-recommendation'] = 'sharemarket/specialRecommendation'; 
 $route['risk-analysis'] = 'sharemarket/riskAnalysis'; 
 $route['complaint-suggestion'] = 'sharemarket/complaintSuggestion'; 
 $route['complain-box'] = 'sharemarket/complaintSuggestion';
 $route['kyc'] = 'sharemarket/kyc';

$route['contact-us'] = 'sharemarket/contactUs';
	$route['term-of-use'] = 'sharemarket/termOfUse';
	$route['privacy-policy'] = 'sharemarket/privacyPolicy';
	$route['disclaimer-policy'] = 'sharemarket/disclaimerPolicy';
	$route['refund-and-cancellation-policy'] = 'sharemarket/refundCancellationPolicy';

/* End of file routes.php */
/* Location: ./application/config/routes.php */