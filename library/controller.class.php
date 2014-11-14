<?php

/**
 * The Controller calls the appropriate template for an action
 * additionally it creates an instance of the corresponding model
 * 
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
 * @since 15.3.2014
 *
 * @package minPHP
 */


abstract class Controller {

	protected $_templateInstance;

	public function __construct($model, $viewsFolder, $action) {
		// Create a model instance with the class name
		$this->$model = new $model;
		
		$this->_templateInstance = new Template($viewsFolder, $action);
	}

	abstract public function default_action();

	public function set($name, $value) {
		$this->_templateInstance->set($name, $value);
	}

	public function render($render_header_and_footer = TRUE, $action_name = NULL) {
		$this->_templateInstance->render($render_header_and_footer, $action_name);
	}
	
	public function __destruct() {
		exit();
	}

}
