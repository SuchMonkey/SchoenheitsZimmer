<?php

/**
 * The Logger offers same basic logging features
 * Copyright (C) 2014  gcarq
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *     
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *   
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 
 * @since 20.4.2014
 *
 * @package minPHP
 */

class Logger {
	
	private static function write($text) {
		//TODO: implement me
	}
	
	/*public static function info($text) {
		static::write('[INFO] ' . $text);
	}
	
	public static function warn($text) {
		static::write('[WARN] ' . $text);
	}*/

	private static function getIPAddress() {
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		    $ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
		    $ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;	
	}
		
	public static function error($text) {	
		//FIXME: error message gets not logged to page if its DEV_ENV
		if(Dispatcher::isDevEnvironment()) {
			echo $text;
		} else {
			$ip = static::getIPAddress();
			error_log('[ERROR] [' . $ip . " - " . $_SERVER['HTTP_USER_AGENT'] . "] URI: " . $_SERVER['REQUEST_URI'] . " - " . $text);
		}
	}
}