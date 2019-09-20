<?php
defined('BASEPATH') or exit('No direct script access allowed');


$menus = [
	[
		'menu' 		 => 'Dashboard', 
		'icon'		 => 'icon-home5', 
		'controller' => 'admin/home',
		'access'	 => ['administrator', 'user', 'writer'],
		'active'	 => NULL,
	],
	[
		'menu' 		 => 'Posts', 
		'icon' 		 => 'icon-pushpin', 
		'controller' => 'admin/post',
		'access'	 => ['administrator', 'user', 'writer'],
		'active'	 => NULL,
	],
	[
		'menu' 		 => 'Users', 
		'icon' 		 => 'icon-users4', 
		'controller' => 'admin/user',
		'access'	 => ['administrator'],
		'active'	 => NULL,
	],		
];

$config['menu'] = ['administrator' => [], 'user' => [] , 'writer' => [] ];

foreach ($menus as $men => $menu){
	
	if (array_search("administrator", $menu['access']) !== FALSE) {
		$config['menu']['administrator'][] = $menu;
	}
	if (array_search("user", $menu['access']) !== FALSE) {
		$config['menu']['user'][] = $menu;
	}
	if (array_search("writer", $menu['access']) !== FALSE) {
		$config['menu']['writer'][] = $menu;
	}
	// $config['administrator'][sizeof($config['administrator'])] = NULL;
	// $config['user'][sizeof($config['user'])] = NULL;
	// $config['writer'][sizeof($config['writer'])] = NULL;
}
