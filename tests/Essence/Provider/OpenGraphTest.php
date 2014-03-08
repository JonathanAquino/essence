<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace Essence\Provider;

use PHPUnit_Framework_TestCase;
use Blunt\Dom\Parser\Native as NativeDomParser;
use Blunt\Http\Client\Native as NativeHttpClient;
use Blunt\Log\Logger\Null as NullLogger;



/**
 *	Test case for OpenGraph.
 */

class OpenGraphTest extends PHPUnit_Framework_TestCase {

	/**
	 *
	 */

	public $OpenGraph = null;



	/**
	 *
	 */

	public function setUp( ) {

		$this->OpenGraph = new OpenGraph(
			new NativeHttpClient( ),
			new NativeDomParser( ),
			new NullLogger( )
		);
	}



	/**
	 *
	 */

	public function testEmbed( ) {

		$this->assertNotNull(
			$this->OpenGraph->embed( 'file://' . ESSENCE_HTTP . 'valid.html' )
		);
	}



	/**
	 *	@todo fix it for travis
	 */
	/*
	public function testEmbedInvalid( ) {

		$this->setExpectedException( '\\Essence\\Exception' );

		$this->OpenGraph->embed( 'file://' . ESSENCE_HTTP . 'invalid.html' );
	}
	*/
}
