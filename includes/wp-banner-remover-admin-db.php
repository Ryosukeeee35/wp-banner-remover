<?php
class Banner_remover_Admin_Db {
	private $table_name;

	public function __construct() {
		global $wpdb;
		$this->table_name = $wpdb->prefix . 'banner_remover';
	}
}
