<?php
namespace Components\Stones\Models;

class StoneSetting {
	var $cache_settings = '';
	var $cache_name = '';

	function __construct() {
		/* set cache store settings path */
		$this->cache_settings = 'uploads/cache/storeSettings';
		$this->cache_name = 'storeSetting.cache.json';

		$this->build_path_cache( $this->cache_settings );
	}

	/**
	* build_path_cache
	* @param string $path
	*/
	public function build_path_cache( $path ) {
		/* check path exist */
		if( is_file( $path . '/' . $this->cache_name ) ) return true;
		
		$path_arr = explode( '/', $path );
		$current_path = array();

		foreach( $path_arr as $path_item ) {
			array_push( $current_path, $path_item );
			if( file_exists( implode( '/', $current_path ) ) ) continue;
			
			mkdir( implode( '/', $current_path ), 0777, true);
		}

		$path_handle = fopen( $path . '/' . $this->cache_name, 'w');
		fclose( $path_handle );
	}


	/**
	* get_settings
	*/
	public function get_settings() {
		$file_content = file_get_contents( $this->cache_settings . '/' . $this->cache_name );

		return ( ! empty( $file_content ) ) ? json_decode( $file_content ) : '';
	}

	/**
	* push_settings
	* @param array $atts
	*/
	public function push_settings( $atts = array() ) {
		$json_str = json_encode( $atts );
		
		$path_handle = fopen( $this->cache_settings . '/' . $this->cache_name, 'w');
		fwrite( $path_handle, $json_str );
		fclose( $path_handle );
	}
}

?>