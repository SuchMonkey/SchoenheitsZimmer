<?php

/**
 * The template class renders the appropriate template.php file
 * Copyright (C) 2014  gcarq
 * 
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
 * @since 15.3.2014
 *
 * @package minPHP
 */

class Template {

	protected $_variables = array();
	protected $_viewsFolder;
	protected $_action;

	public function __construct($viewsFolder, $action) {
		$this->_viewsFolder = $viewsFolder;
		$this->_action = $action;
	}

	/** Set Variables **/
	public function set($name, $value) {
		$this->_variables[$name] = $value;
	}

	/** Display Template **/
    public function render($render_header_and_footer, $action_name) {
    	
    	// Extract variables
		extract($this->_variables);
		
		$curViewPath = ROOT . DS . 'application' . DS . 'views' . DS;
		
		include(ROOT . DS . 'library'. DS . 'html.php');
		
		if ($render_header_and_footer) {
			$curViewHeader = $curViewPath . $this->_viewsFolder . DS . 'header.php';
			$curViewFooter = $curViewPath . $this->_viewsFolder . DS . 'footer.php';

			// Include custom header if exists 
			if (file_exists($curViewHeader)) {
				include($curViewHeader);
			} else {
				include ($curViewPath . 'header.php');
			}
		}
		
		// Include action view
		if(is_null($action_name)) {
			$action_name = $this->_action;
		}
		
        include ($curViewPath . $this->_viewsFolder . DS . $action_name . '.php');		 

		if ($render_header_and_footer) {
			// Include custom footer if exists 
			if (file_exists($curViewFooter)) {
				include($curViewFooter);
			} else {
				include ($curViewPath . 'footer.php');
			}
		}
    }

}
