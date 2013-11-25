<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace Essence;

use PHPUnit_Framework_TestCase;
use Essence\Log\Logger\Null as NullLogger;



/**
 *	Test case for Provider.
 */

class ProviderTest extends PHPUnit_Framework_TestCase {

	/**
	 *
	 */

	public $Provider = null;



	/**
	 *
	 */

	public function setup( ) {

		$Media = new Media( array( 'title' => 'Title' ));

		$this->Provider = $this->getMockForAbstractClass(
			'\\Essence\\Provider',
			array( new NullLogger( ))
		);

		$this->Provider
			->expects( $this->any( ))
			->method( '_embed' )
			->will( $this->returnValue( $Media ));
	}



	/**
	 *
	 */

	public function testEmbed( ) {

		$Media = new Media( array(
			'title' => 'Title',
			'url' => 'http://foo.bar'
		));

		$Media->complete( );
		$this->assertEquals( $Media, $this->Provider->embed( '  http://foo.bar  ' ));
	}
}
