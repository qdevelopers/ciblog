<?php
defined('BASEPATH') or exit('No direct script access allowed');

$menus = [
	[
		'menu' 		 => 'Dashboard', 
		'icon'		 => 'icon-home2', 
		'controller' => 'admin/Dashboard',
		'method'	 => 'index',
		'access'	 => ['administrator', 'user', 'writer'],
		'active'	 => NULL,
	],
	[
		'menu' 		 => 'Posts', 
		'icon' 		 => 'icon-pushpin', 
		'controller' => 'admin/posts',
		'method'	 => 'index',
		'access'	 => ['administrator', 'user', 'writer'],
		'actions'	 => [
							'create' => ['icon' => 'icon-pencil7', 'name' => 'Create New Post', 'method' => 'new_post', 'command' => 'href'],
							'post_trash' => ['icon' => 'icon-trash', 'name' => 'Post Trash', 'method' => 'trash_post', 'command' => 'href'],
						],
		'children'	 => [
							'read' => [
								'menu' 			=> 'All Posts', 
								'icon' 			=> 'icon-stack', 
								'controller' 	=> 'Posts', 
								'prefix' 		=> 'admin',
								'method' 		=> 'index',
							],
							'create' => [
								'menu' 			=> 'Create New Post', 
								'icon' 			=> 'icon-pencil7', 
								'controller' 	=> 'Posts', 
								'prefix' 		=> 'admin', 
								'method' 		=> 'new_post',
							],
							'categories' => [
								'menu' 			=> 'Categories', 
								'icon' 			=> 'icon-stack2', 
								'controller' 	=> 'Categories',
								'prefix' 		=> 'admin',  
								'method' 		=> 'index',
							],
							'tags' => [
								'menu'			=> 'Tags', 
								'icon' 			=> 'icon-price-tag2', 
								'controller' 	=> 'Tags', 
								'prefix' 		=> 'admin', 
								'method' 		=> 'index',
							],
						]
	],
	[
		'menu' 		 => 'Comments',
		'icon'		 => 'icon-comment-discussion',
		'controller' => 'admin/Comments',
		'method'	 => 'index',
		'access'	 => ['administrator', 'user', 'writer'],
		'active'	 => NULL,
	],
	[
		'menu' 		 => 'Users', 
		'icon' 		 => 'icon-users4', 
		'controller' => 'admin/user',
		'method'	 => 'index',
		'access'	 => ['administrator'],
		'active'	 => NULL,
		'children'	 => []
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
