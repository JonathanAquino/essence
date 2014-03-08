<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace Essence\Provider;

use PHPUnit_Framework_TestCase;
use Blunt\Di\Container;
use Blunt\Log\Logger\Null as NullLogger;
use Essence\Provider;
use Essence\Provider\OEmbed;



/**
 *
 */

class ProviderImplementation extends Provider {

	/**
	 *
	 */

	protected function _embed( $url, array $options ) { }

}



/**
 *	Test case for Collection.
 */

class CollectionTest extends PHPUnit_Framework_TestCase {

	/**
	 *
	 */

	public $Provider = null;



	/**
	 *
	 */

	public $Collection = null;



	/**
	 *
	 */

	public function setUp( ) {

		$this->Provider = new ProviderImplementation( new NullLogger( ));

		$Container = new Container( );
		$Container->set( 'OEmbed', $this->Provider );

		$this->Collection = new Collection( $Container );
		$this->Collection->setProperties([
			'Foo' => [
				'class' => 'OEmbed',
				'filter' => '#^foo$#'
			],
			'Bar' => [
				'class' => 'OpenGraph',
				'filter' => function ( $url ) {
					return ( $url === 'bar' );
				}
			]
		]);
	}



	/**
	 *
	 */

	public function testHasProvider( ) {

		$this->assertTrue( $this->Collection->hasProvider( 'foo' ));
		$this->assertTrue( $this->Collection->hasProvider( 'bar' ));
		$this->assertFalse( $this->Collection->hasProvider( 'baz' ));
	}



	/**
	 *
	 */

	public function testProviders( ) {

		$providers = [ ];
		$generator = $this->Collection->providers( 'foo' );

		foreach ( $generator as $provider ) {
			$providers[ ] = $provider;
		}

		$this->assertEquals([ $this->Provider ], $providers );
	}
}
