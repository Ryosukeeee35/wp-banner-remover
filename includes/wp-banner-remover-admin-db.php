<?php
class Banner_remover_Admin_Db {
	private $table_name;

	public function __construct() {
		global $wpdb;
		$this->table_name = $wpdb->prefix . 'banner_remover';

		$this->create_table();
	}

	private function create_table() {
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		$prepare      = $wpdb->prepare( "SHOW TABLES LIKE %s", $this->table_name );
		$is_db_exists = $wpdb->get_var( $prepare );
		var_dump( $is_db_exists );

		$query  = "";
		$query .= "CREATE TABLE " . $this->table_name . " (";
		$query .= "id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,";
		$query .= "name TEXT NOT NULL,";
		$query .= "registration_date DATETIME NOT NULL,";
		$query .= "category TEXT NOT NULL,";
		$query .= "img_name TEXT NOT NULL,";
		$query .= "img_url TEXT NOT NULL,";
		$query .= "period DATETIME NOT NULL";
		$query .= ");";

		// dbDelta( $query );
	}
}
