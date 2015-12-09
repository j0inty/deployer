<?php

/* (c) Anton Medvedev <anton@elfet.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Deployer\Type;

class Result
{
	/**
	 * Output delimiter used by toArray()
	 * 
	 * @var string
	 */
	private $delim = "\n";

	/**
	 * @var string
	 */
	private $output;

	/**
	 * @param string $output
	 * @param string $delim
	 */
	public function __construct( $output, $delim = NULL )
	{
		if ( $delim !== NULL )
		{
			$this->delim = $delim;
		}
		$this->output = $output;
	}

	/**
	 * Get the raw output string.
	 * 
	 * @return string
	 */
	public function getOutput()
	{
		return $this->output;
	}

	/**
	 * @see Result::__toString()
	 * 
	 * @return string
	 */
	public function toString()
	{
		return (string) $this;
	}

	/**
	 * Get the output string right trimmed.
	 * 
	 * @return string
	 */
	public function __toString()
	{
		return rtrim( $this->output );
	}

	/**
	 * Convert a string to bool.
	 * 
	 * Example: 'TRUE', 'false', 'yEs', 'No', 'On', 'OFF', '1', 0, 1
	 * 
	 * @return boolean
	 */
	public function toBool()
	{
		switch ( strtolower( $this ) )
		{
			case '1':
			case 'true':
			case 'on':
			case 'yes':
			case 'y':
				return true;
			default:
				return false;
		}
	}

	/**
	 * 
	 * @param string $delim
	 * @return array
	 */
	public function toArray()
	{
		return explode( $this->delim, $this );
	}
}