<?php	
if ( !class_exists( 'TSP_Easy_Dev_Pro_Tools' ) )
{
	/**
	 * API implementations for TSP Easy Dev Pro's Tools class - Includes very handy functions
	 * @package 	TSP_Easy_Dev_Pro
	 * @author 		sharrondenice, thesoftwarepeople
	 * @author 		Sharron Denice, The Software People
	 * @copyright 	2013 The Software People
	 * @license 	APACHE v2.0 (http://www.apache.org/licenses/LICENSE-2.0)
	 * @version 	1.0.1
	 */
	class TSP_Easy_Dev_Pro_Tools
	{
		/**
		 * Determines if a particular browser is currently being used by the current user
		 *
		 * @since 1.0.1
		 *
		 * @param string $key Required the browser key, (values: IE, Chrome, FireFox, Opera, Safari)
		 * @param integer $version Optional the version of the browser (will match versions equal to and less than)
		 *
		 * @return boolean $matches - If the current browser matches users specs
		 */
	 	public static function this_browser ( $key, $version = null )
	 	{
	 		$match = false;
	 		
	 		$this_browser = $_SERVER['HTTP_USER_AGENT'];
	 		
			if ( strpos( $this_browser, 'MSIE') !== FALSE && $key == 'IE' )
			{
				if ( $version ) 
				{
					preg_match("/MSIE\/(.*) /", $this_browser, $matches);
					
					if ( array_key_exists( '1', $matches ) )
					{
						$this_version = $matches['1'];
						
						if ( intval($version) <= intval( $this_version ))
						{
							$match = true;
						}
					}//endif
				}//end if
				else
				{
					$match = true;
				}//end else
			}//end if
			elseif ( strpos( $this_browser, 'Chrome') !== FALSE && $key == 'Chrome' ) 
			{
				if ( $version ) 
				{
					preg_match("/Chrome\/(.*) /", $this_browser, $matches);
					
					if ( array_key_exists( '1', $matches ) )
					{
						$this_version = $matches['1'];
						
						if ( intval($version) <= intval( $this_version ))
						{
							$match = true;
						}
					}//endif
				}//end if
				else
				{
					$match = true;
				}//end else
			}//end elseif
			elseif ( strpos( $this_browser, 'Firefox') !== FALSE && $key == 'Firefox' ) 
			{
				if ( $version ) 
				{
					preg_match("/Firefox\/(.*) /", $this_browser, $matches);
					
					if ( array_key_exists( '1', $matches ) )
					{
						$this_version = $matches['1'];
						
						if ( intval($version) <= intval( $this_version ))
						{
							$match = true;
						}
					}//endif
				}//end if
				else
				{
					$match = true;
				}//end else
			}//end elseif
			elseif ( strpos( $this_browser, 'Opera') !== FALSE && $key == 'Opera' ) 
			{
				if ( $version ) 
				{
					preg_match("/Opera\/(.*) /", $this_browser, $matches);
					
					if ( array_key_exists( '1', $matches ) )
					{
						$this_version = $matches['1'];
						
						if ( intval($version) <= intval( $this_version ))
						{
							$match = true;
						}
					}//endif
				}//end if
				else
				{
					$match = true;
				}//end else
			}//end elseif
			elseif ( strpos( $this_browser, 'Safari') !== FALSE && $key == 'Safari' ) 
			{
				if ( $version ) 
				{
					preg_match("/Safari\/(.*) /", $this_browser, $matches);
					
					if ( array_key_exists( '1', $matches ) )
					{
						$this_version = $matches['1'];
						
						if ( intval($version) <= intval( $this_version ))
						{
							$match = true;
						}
					}//endif
				}//end if
				else
				{
					$match = true;
				}//end else
			}//end elseif
	 		
	 		return $match;
		}//end this_browser
	}//end TSP_Easy_Dev_Pro_Tools
}//endif	