<?php
class map {

	public function select_server($sid)
	{
		$DB->query("SELECT * FROM `everything` WHERE `servers_id` = :sid", ['sid' => $sid]);
		if ($DB->count() >= 1)
			return $DB->statement->fetchall(PDO::FETCH_OBJ);
		else
			return $this->error = "No results.";
	}

	public function server_form()
	{
		global $DB;
		$input = new \Kendo\UI\ComboBox('Servers');
		$input->dataSource($this::get_servers())
		      ->dataTextField('name')
		      ->dataValueField('servers_id')
		      ->filter('contains')
		      ->placeholder('Select server ...')
		      ->suggest(true)
		      ->index($DB->count());
		
		$textButton = new \Kendo\UI\Button('Submit');
		$textButton->attr('type', 'Submit')
				   ->content('Submit');

		return "<form action=\"" . basename($_SERVER['PHP_SELF']) . "\" method=\"GET\">\n" . $input->render() . "\n " . $textButton->render() . "</form>";
	}

	public function search_form()
	{
		global $DB;
		$input = new \Kendo\UI\ComboBox('Servers');
		$input->dataSource($this::get_servers())
		      ->dataTextField('name')
		      ->dataValueField('servers_id')
		      ->filter('contains')
		      ->placeholder('Select server ...')
		      ->suggest(true)
		      ->index($DB->count());
		
		$textButton = new \Kendo\UI\Button('Submit');
		$textButton->attr('type', 'Submit')
				   ->content('Submit');

		return "<form action=\"" . basename($_SERVER['PHP_SELF']) . "\" method=\"GET\">\n" . $input->render() . "\n " . $textButton->render() . "</form>";
	}

	static public function get_servers()
	{
		global $DB;
		$DB->query("SELECT * FROM `servers`");
		if ($DB->count() >= 1)
			return $DB->statement->fetchall(PDO::FETCH_ASSOC);
		else
			return $this->error = "No results.";
	}

	static public function list_coords($sid, $lord = '', $city = '', $alliance = '')
	{
		global $DB;
		$DB->query("SELECT * FROM `everything` WHERE `servers_id` =:sid AND `city_name` LIKE :city AND `lord_name` LIKE :lord AND `alliance` LIKE :alliance AND `flag` LIKE :flag",
			[':sid' => $sid, ':lord' => '%' .$lord. '%', ':city' => '%' .$city. '%', ':alliance' => '%' .$alliance. '%']);
		return $DB->statement->fetchall(PDO::FETCH_ASSOC);
	}
}

