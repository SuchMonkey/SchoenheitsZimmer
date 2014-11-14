<?php

/**
 * Base class of each Model
 * provides and handles PDO session
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
 * 
 * @since 15.3.2014
 *
 * @package minPHP
 */

abstract class SQLQuery {
	
	protected $_connectionFactory;
    protected $_pdoHandle;
    protected $_result;


	/** Get a PDO handle from the connection factory **/
	public function __construct(ConnectionFactory $factory = null) {
        if (!$factory) {
            $factory = new ConnectionFactory;
        }
        $this->_connectionFactory = $factory;
		$this->_pdoHandle = $this->_connectionFactory->getConnection();
	}

    /** Destroy PDO Handle **/
    public function disconnect() {
        $this->_pdoHandle = null;
    }
    
	protected function getPDOHandle() {
		return $this->_pdoHandle;
	}
	
    /** Execute prepared statement **/
	public function query($query, $params = null, $singleResult = 0) {
		$stmt = $this->_pdoHandle->prepare($query);
        $this->_result = $stmt->execute($params);
        
		return $stmt;
	}

}
