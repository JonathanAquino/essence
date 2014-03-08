<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

use Blunt\Utility\Autoload;

require_once dirname( dirname( __FILE__ ))
	. DIRECTORY_SEPARATOR . 'vendor'
	. DIRECTORY_SEPARATOR . 'autoload.php';



/**
 *	Definitions
 */

defined( 'ESSENCE_LIB' )
or define( 'ESSENCE_LIB', dirname( __FILE__ ) . DIRECTORY_SEPARATOR );

defined( 'ESSENCE_DEFAULT_PROVIDERS' )
or define( 'ESSENCE_DEFAULT_PROVIDERS', ESSENCE_LIB . 'providers.php' );



/**
 *	Autoload.
 */

Autoload::setup( ESSENCE_LIB );
