<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace fg\Essence\Http;

use fg\Essence\Http;



/**
 *	Handles HTTP related operations.
 *
 *	@package fg.Essence.Http
 */

class FileGetContents implements Http {

	/**
	 *	The default HTTP status code to assume if headers cannot be parsed.
	 *
	 *	@var int
	 */

	const defaultHttpCode = 404;



	/**
	 *	Retrieves contents from the given URL.
	 *	Thanks to Diije for the hint on $http_response_header
	 *	(http://www.felix-girault.fr/astuces/recuperer-une-page-web-en-php/#comment-1029).
	 *
	 *	@param string $url The URL fo fetch contents from.
	 *	@return string The fetched contents.
	 *	@throws fg\Essence\Http\Exception
	 */

	public function get( $url ) {

		$reporting = error_reporting( 0 );
		$contents = file_get_contents( $url );
		error_reporting( $reporting );

		if ( $contents === false ) {
			$code = self::defaultHttpCode;

			if ( isset( $http_response_header )) {
				preg_match(
					'#^HTTP/[0-9\\.]+\s(?P<code>[0-9]+)#i',
					$http_response_header[ 0 ],
					$matches
				);

				if ( isset( $matches['code'])) {
					$code = $matches['code'];
				}
			}

			// let's assume the file doesn't exists
			throw new Exception( $code, $url );
		}

		return $contents;
	}
}
