<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//API
$route['api/create']      = "cApi/createForm";
$route['api/delete/(:any)']   = "cApi/delete/$1";
$route['api/read']            = "cApi/customerRead";

// Homepage
$route['default_controller'] = 'cHome/index';
$route['home']      = 'cHome/index';

// Account Signing & Signout
$route['register']  = 'cRegister/index';
$route['create']    = 'cRegister/createUser';
$route['logscreen'] = 'cLogin/index';
$route['login']     = 'cLogin/signIn';
$route['logout']    = 'cLogout/index';
$route['account']   = 'cMyaccount/index';
// $route['order']     = 'cOrder/index';

// cart
$route['cart']      = 'cCart/index';
$route['user_cart'] = 'cCart/usercart';
$route['addtocart'] = 'cCart/addtocart';
$route['remove_cartitem/(:any)'] = 'cCart/removeitem/$1';
$route['remove_allitem'] = 'cCart/remove_allitem';

// Checkout
$route['checkout'] = 'cCheckout/index';
$route['saveorder1/(:num)'] = 'cOrder/saveorder1/$1';
$route['saveorder2/(:num)'] = 'cOrder/saveorder2/$1';
$route['shipping']  = 'cShippingAddress/index';
$route['shippingAddress']  = 'cShippingAddress/shippingAddress';

// Payment
$route['payment'] = 'cPayment/index';
$route['credit']  = 'cPayment/paymentCreditcard';
$route['cpaypal']  = 'cPayment/paymentPaypal';
$route['receipt/(:num)']  = 'cPayment/receipt/$1';

// Product & Catalog
$route['product']   = 'cProduct/index';
$route['product_by_catalog/(:any)/(:any)']   = 'cProduct/ProductByCatalog/$1/$2';
$route['catalog']   = 'cCatalog/index';
$route['catalog_detail/(:any)']   = 'cCatalog_detail/index/$1';
$route['search'] = 'cSearch/index';

// Add, Remove, Edit user
$route['user']      = 'cUser/index';
$route['report']    = 'cReport/index';
$route['user_list'] = 'cUser/userlist';
$route['save']      = 'cUser/save';
$route['save2']     = 'cUser/save2';
$route['remove']    = 'cUser/remove';
$route['update']    = 'cUser/update';

// Other
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

?>
