<?php
/* phpPowerhouseMuseumAPI Class 1.0
 * Written by Ryan Donahue (ryan@ryandonahue.net)
 * Spirtually influenced by Dan Coulter / phpFlickr
 * Project Home Page: http://ryandonahue.net/phpPHM/
 *
 * Released under GNU Lesser General Public License (http://www.gnu.org/copyleft/lgpl.html)
 * For more information about the class and upcoming tools and toys using it,
 * visit http://ryandonahue.net/phpPHM/
 *
 *	 For installation instructions, open the README.txt file packaged with this
 *	 class. If you don't have a copy, you can see it at:
 *	 http://ryandonahue.net/phpPHM/README.txt
 *
 *	 Please submit all problems or questions to the Help Forum on my Google Code project page:
 *		 http://code.google.com/p/phpflickr/issues/list
 *
 */ 
 
if ( !class_exists('phpPHM') ) {

	class phpPHM {
		var $api_key;
		var $limit = 100;
		var $rest_endpoint = 'http://api.powerhousemuseum.com/api/v1/';
		var $req;
		var $response;
		var $parsed_response;

		var $error_code;
		Var $error_msg;
		var $token;
		var $php_version;

		/* constructor, supply API key. */
		function phpPHM($api_key) {
			//The API Key must be set before any calls can be made.  You can
			//get your own at http://api.powerhousemuseum.org
			
			$this->api_key = $api_key;

		}
	
		/* appends args from array syntax $args['ARGUMENT']=VALUE */
		function appendArgs($requestURL, $args = null){
			if ($args != null){
				foreach ($args as $k => $v){
					$argstring .= "&" . $k . "=" . $v;
				}
				return $requestURL . "?api_key=" . $this->api_key . $argstring;
			} else {
				return $requestURL . "?api_key=" . $this->api_key;
			}
		}
		
		/* Make API request */
		function request($method, $args = null){
			$ch = curl_init($rest_endpoint);
			
			$requestURL = $this->rest_endpoint . $method;
			$requestURL = $this->appendArgs($requestURL, $args);
					
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_URL, $requestURL);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			$response = curl_exec($ch);
			curl_close($ch);

			return $response;
			
		} 
		
		function getErrorCode() {
			// Returns the error code of the last call.  If the last call did not
			// return an error. This will return a false boolean.
			return $this->error_code;
		}

		function getErrorMsg() {
			// Returns the error message of the last call.  If the last call did not
			// return an error. This will return a false boolean.
			return $this->error_msg;
		}

		/* These functions are front ends for the flickr calls */



		function itemSearch($args){
			$x = json_decode($this->request("item/",$args));
			
			if ($x->status == 200){
				return $x->items;
			} else {
				return $x->status;
			}
		}

		function items($args){
			$x = json_decode($this->request("item/",$args));
			
			if ($x->status == 200){
				return $x->items;
			} else {
				return $x->status;
			}
		}

		function item($photo_id) {
			/* http://api.powerhousemuseum.com/api/v1/item/{item_id}/ */
			$x = json_decode($this->request("item/$photo_id/",null));
			
			if ($x->status == 200){
				return $x->item;
			} else {
				return $x->status;
			}
		}
		
		function multimediaSearch($args) {
			/* http://api.powerhousemuseum.com/api/v1/item/{item_id}/ */
			$x =  $this->request("multimedia/",$args);
			
			if ($x->status == 200){
				return $x->item;
			} else {
				return $x->status;
			}
		}

		function multimedia($photo_id) {
			/* http://api.powerhousemuseum.com/api/v1/multimedia/{item_id}/ */
			$x = json_decode($this->request("multimedia/$photo_id/",null));
			if ($x->status == 200){
				return $this->parseMultimedia($x->multimedia);
			} else {
				return $x->status;
			}
		}

		function parseMultimedia($x) {
			if ($x->flickr_id != null){
				$x->flickr_url = 'http://flic.kr/p/' . $this->base58_encode($x->flickr_id);
			}
			return $x;
		}

		function photos_search($args = array()) {
			/* This function strays from the method of arguments that I've
			 * used in the other functions for the fact that there are just
			 * so many arguments to this API method. What you'll need to do
			 * is pass an associative array to the function containing the
			 * arguments you want to pass to the API.  For example:
			 *   $photos = $f->photos_search(array("tags"=>"brown,cow", "tag_mode"=>"any"));
			 * This will return photos tagged with either "brown" or "cow"
			 * or both. See the API documentation (link below) for a full
			 * list of arguments.
			 */

		}

		function base58_encode($num) {
		$alphabet = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
		$base_count = strlen($alphabet);
		$encoded = '';
	 
		while ($num >= $base_count) {
			$div = $num / $base_count;
			$mod = ($num - ($base_count * intval($div)));
			$encoded = $alphabet[$mod] . $encoded;
			$num = intval($div);
		}
	 	
		if ($num) {
			$encoded = $alphabet[$num] . $encoded;
		}
	 
		return $encoded;
	}
 

	}
}
?>