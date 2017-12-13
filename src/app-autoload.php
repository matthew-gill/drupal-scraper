<?php
spl_autoload_register( 'my_autoload_register' );

function my_autoload_register( $class_name ) {

	$class_name = end(explode('\\', $class_name));

	/**
	 * Note we are just looking for a PHP file with the same name as the class in question.
	 * actual usage may require some string operations to specify the filename
	 */
	$file_name = './src/classes/'.$class_name . '.php';
	if( file_exists( $file_name ) ) {
		require $file_name;
	}
}