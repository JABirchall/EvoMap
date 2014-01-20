<?php

class init
{
	function __construct()
	{
		require_once('classes/database.class.php');
		require_once('classes/map.class.php');
		require_once('kendo/lib/Kendo/Autoload.php');
		require_once('kendo/include/header.php');
		$this::build_menu();
	}

	private static function build_menu()
	{
		$menu = new \Kendo\UI\Menu('menu');

		$home = new \Kendo\UI\MenuItem('Home');
		$menu->addItem($home);

		$service = new \Kendo\UI\MenuItem('Service');
		$service->addItem(
			new \Kendo\UI\MenuItem('Map'),
			new \Kendo\UI\MenuItem('Market'),
			new \Kendo\UI\MenuItem('Captures'),
			new \Kendo\UI\MenuItem('Chat'));

		$menu->addItem($service);
		echo $menu->render(),"<div id=\"example\" class=\"k-content\">";

	}

}
$i = NEW init();
$DB = NEW database('127.0.0.1', 'evomap','root', '');
$map = NEW map();
if (@$map->error) echo $map->error;
