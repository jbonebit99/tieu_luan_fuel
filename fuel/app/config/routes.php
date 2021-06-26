<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.8.2
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

return array(
	/**
	 * -------------------------------------------------------------------------
	 *  Default route
	 * -------------------------------------------------------------------------
	 *
	 */

	'_root_' => 'frontend/welcome/index',

	/**
	 * -------------------------------------------------------------------------
	 *  Page not found
	 * -------------------------------------------------------------------------
	 *
	 */

	'_404_' => 'frontend/welcome/404',

	/**
	 * -------------------------------------------------------------------------
	 *  Example for Presenter
	 * -------------------------------------------------------------------------
	 *
	 *  A route for showing page using Presenter
	 *
	 */

	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
	'submit-property'=>'frontend/submit/property/index',
    'submit-property/delete'=>'frontend/submit/property/delete',
	'contact'=>'frontend/contact/index',
	'contact/post'=>'frontend/contact/create',
	'authen/login'=>'frontend/authen/login',
	'authen/register'=>'frontend/authen/register',
    'authen/logout'=>'frontend/authen/logout',
	'authen/change-password'=>'frontend/authen/change_password',
	'blog'=>'frontend/blog/index',
	'blog/comment'=>'frontend/blog/comment',
	'blog/view/(:id)'=>'frontend/blog/view',
	'blog/search'=>'frontend/blog/search',
	'account'=>'frontend/account/index',
	'account/my-profile'=>'frontend/account/index',
	'account/my-properties'=>'frontend/account/my_properties',
	'account/my-properties/delete/:id'=>'frontend/submit/property/delete',
	'account/my-properties/hide/:id'=>'frontend/submit/property/hide',
	'account/my-properties/show/:id'=>'frontend/submit/property/show',
	'account/change-password'=>'frontend/account/change_password',
	'account/my-bookmarks'=>'frontend/account/my_bookmarks',
	'pricing-tables'=>'frontend/pricing/tables/index',
	'compare-properties'=>'frontend/compare/properties/index',
	'sale/lands'=>'frontend/sale/lands_for_sale',
	'sale'=>'frontend/sale/index',
    '(:shape)/details/(:id)'=>'frontend/$1/detail',
	'(:shape)/preview/(:id)'=>'frontend/$1/detail_preview',
	'sale/houses'=>'frontend/sale/houses_for_sale',
	'rent'=>'frontend/rent/index',
	'rent/ware-housing'=>'frontend/rent/ware_housing_for_rent',
	'rent/office'=>'frontend/rent/office_for_rent',
	'tag/(:keyword)'=>'frontend/welcome/tag',
	'submit-property/post'=>'frontend/submit/property/create',
	'admin'=>'backend/admin/index',
    'admin/login'=>'backend/admin/login',
    'admin/logout'=>'backend/admin/logout',
    'admin/profile'=>'backend/admin/profile',
    'admin/manage-property/detail'=>'backend/admin/detail',
    'admin/approve-properties'=>'backend/admin/approve_properties',
	'admin/list-property'=>'backend/admin/list_property',
    'admin/users'=>'backend/admin/users',
	'admin/blogs'=>'backend/admin/blogs',
	'admin/create-blog'=>'backend/admin/create_blog',
	'admin/delete-blog/:id'=>'backend/admin/delete_blog',
	'admin/hide-blog/:id'=>'backend/admin/hide_blog',
	'admin/approve-properties/accept/(:id)'=>'frontend/submit/property/accept_property',
	'admin/approve-properties/delete/(:id)'=>'frontend/submit/property/delete_property',
	'admin/property/hide/(:id)'=>'frontend/submit/property/hide_property',
	'admin/property/show/(:id)'=>'frontend/submit/property/show_property',
	'admin/property/delete/(:id)'=>'frontend/submit/property/property_delete',
	'admin/contacts'=>'backend/admin/contact',
	'admin/contacts/delete/(:id)'=>'frontend/contact/delete',
	'admin/edit-blog/(:id)'=>'backend/admin/edit_blog',
	'search'=>'frontend/search/index'

);
