<?php
/*
Plugin Name: Wp-banner-remover(20200317)
Plugin URI:
Description: プラグインの説明
Version: 1.0.0
Author: Sako Ryosuke
Author URI:
License: GPLv2 or later
*/

require_once( plugin_dir_path( __FILE__ ) . 'includes/wp-banner-remover-admin-db.php' );

/**
* Base Class
*
*@author  Sako Ryosuke
*@version 1.0.0
*@since   1.0.0
*/
class Banner_remover {
	public function __construct() {
		if( is_admin() === true ) {
			add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		}
	}

	public function admin_menu () {
		add_menu_page(
			'タイトル',
			'メニュー名',
			'manage_options',
			plugin_basename( __FILE__ ),
			array( $this, 'list_page_render' )
		);

		add_submenu_page(
			__FILE__,
			'リスト',
			'リスト',
			'manage_options',
			plugin_basename( __FILE__ ),
			array( $this, 'list_page_render' )
		);

		add_submenu_page(
			__FILE__,
			'サブタイトル2',
			'サブメニュー名2',
			'manage_options',
			plugin_dir_path( __FILE__ ) . 'includes/wp-banner-remover-post.php',
			array( $this, 'post_page_render' )
		);
	}

	public function list_page_render () {
		require_once( plugin_dir_path( __FILE__ ) . 'includes/wp-banner-remover-list.php' );
		new Banner_remover_List();
	}

	public function post_page_render () {
		require_once( plugin_dir_path( __FILE__ ) . 'includes/wp-banner-remover-post.php' );
		new Banner_remover_Post();
	}
}

new Banner_remover();
