<?php

/**
 * The Model handles the database exchange and input validation
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

abstract class Model extends SQLQuery {
	protected $_modelClassName;

	public function __construct() {
		parent::__construct();
		$this->_modelClassName = get_class($this);
	}

}
