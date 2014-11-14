<?php

/**
 * The SessionManager creates and handles PHP sessions
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
 * 
 * @since 14.4.2014
 *
 * @package minPHP
 */

class SessionManager {
	
	/** Creates new session if there is none,
	 *  if a session already exists it will be refreshed 
	 *  it also check if a session is expired and deletes them if so.
	 *  Additionally it provides some session hijacking based on USER_AGENT comparison
	 **/
	public static function start() {
		session_set_cookie_params (SESS_COOKIE_AGE_SEC, '/', DOMAIN_NAME, isset($_SERVER['HTTPS']), TRUE);	
			
		$result = FALSE;
		if(session_status() == PHP_SESSION_NONE) {
			// Create new session
			$result = session_start();
			
			// Check if session is expired
			if(static::is_expired()) {
				static::destroy();
			}
		} else {
			// Refresh existing session
			if(!static::prevent_hijacking()) {
				throw new NotAuthorizedException("Session hijacking attempt detected");
			}
			$result = static::refresh();
		}
		
		if(!$result) {
			throw new NotAuthorizedException("Unable to create session");
		}	
				
		// Store hashed user agent to prevent session hijacking
		$hashed = md5($_SERVER['HTTP_USER_AGENT']);
		static::set('jak', $hashed);
	}	
	
	/** Refresh current session **/
	public static function refresh($delete_old_session = TRUE) {
		return session_regenerate_id($delete_old_session);
	}
	
	/** Destroy session and delete cookie **/
	public static function destroy() {
		session_destroy();
		session_unset();
		setcookie(session_name(), null, 0, "/");
		
		if(isset($_COOKIE[session_name()])) {
			unset($_COOKIE[session_name()]);
		}
	}
	
	/** Set session variable **/	
	public static function set($key, $value) {
		return $_SESSION[$key] = $value;
	}
	
	/** Get session variable
	 * @return The expected value or FALSE if variable is not set 
	 * **/
	public static function get($key) {
		if(isset($_SESSION[$key])) {
			return $_SESSION[$key];
		}
		return FALSE;
	}
	
	/** Delete session variable **/
	public static function del($key) {
		if(isset($_SESSION[$key])) {
			unset($_SESSION[$key]);
		}		
	}

	/** Check if the current session is expired **/
	private static function is_expired() {
		if(isset($_SESSION['EXPIRES'])) {
			if($_SESSION['EXPIRES'] < time()) {
				return TRUE;
			}
		}
		return FALSE;
	}
	
	/** Check if the user agent is the same to prevent hijacking **/
	private static function prevent_hijacking() {
		// Check if hashed user agent matches 
		$hashed = md5($_SERVER['HTTP_USER_AGENT']);
		if(static::get('jak') != $hashed) {
			return FALSE;
		}
		return TRUE;		
	}
}