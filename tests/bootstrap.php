<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

use fg\Essence\Utility\ClassLoader;

require_once dirname( dirname( __FILE__ ))
	. DIRECTORY_SEPARATOR . 'lib'
	. DIRECTORY_SEPARATOR . 'bootstrap.php';



/**
 *	Definitions
 */

if ( !defined( 'ESSENCE_TEST' )) {
	define( 'ESSENCE_TEST', dirname( __FILE__ ) . DIRECTORY_SEPARATOR );
}

if ( !defined( 'ESSENCE_RESOURCES' )) {
	define( 'ESSENCE_RESOURCES', ESSENCE_TEST . 'resources' . DIRECTORY_SEPARATOR );
}

if ( !defined( 'ESSENCE_HTTP' )) {
	define( 'ESSENCE_HTTP', ESSENCE_RESOURCES . 'http' . DIRECTORY_SEPARATOR );
}

if ( !defined( 'ESSENCE_PACKAGE' )) {
	define(
		'ESSENCE_PACKAGE',
		ESSENCE_RESOURCES . 'fg'
			. DIRECTORY_SEPARATOR . 'Essence'
			. DIRECTORY_SEPARATOR . 'Provider'
	);
}



/**
 *	Autoload
 */

$ResourcesClassLoader = new ClassLoader( ESSENCE_RESOURCES );
$ResourcesClassLoader->register( );
