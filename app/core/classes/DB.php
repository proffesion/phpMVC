<?php

class DB
{
	private static $_instance = null;
	private $_pdo,
			$_query,
			$_error = false,
			$_results,
			$_select = '*', // this will be used to select elements in tha data
			$_count = 0;









	private function __construct() {
		try {
			$this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
		} catch(PDOException $e) {
			die($e->getMessage());
		}
	}





/*
*****************************************************
**		THE THE CONNECTION INSTANCE	
*****************************************************
**  The getInstance will hepl us to connect to the database 
**  once
*/

	public static function getInstance() {
		if (!isset(self::$_instance)) {
			self::$_instance = new DB();
		}
		return self::$_instance;
	}





/*
*****************************************************
**		THE THE CONNECTION INSTANCE	
*****************************************************
**  The getInstance will hepl us to connect to the database 
**  once
*/

	public function query($sql, $params = array()) {
		$this->_error = false;
		if ($this->_query = $this->_pdo->prepare($sql)) {
			$x = 1;
			if (count($params)) {
				foreach ($params as $param) {
					$this->_query->bindValue($x, $param);
					$x++;
				}
			}

			if ($this->_query->execute()) {
				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count   = $this->_query->rowCount();
			} else {
				$this->_error = true;
			}
		}

		
		return $this;
	}












/*
*****************************************************
**		THE ACTION
*****************************************************
**  The action function allows us to peform requests to the query function esly 
**  it is also used by others function in this class
*/


	public function action($action, $table, $where = array()) 
	{
		if (count($where) === 3) {
			$operators = array('=', '>', '<', '>=', '<=', '!=');

			$field    = $where[0];
			$operator = $where[1];
			$value    = $where[2];

			if (in_array($operator, $operators)) { // check if the perator in inside the operator array
				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

				if (!$this->query($sql, array($value))->error()) {
					return $this;
				}
			}
		}
		return false;
	}






	public function select($fields = array()) {

		// Form a query
		if (count($fields)) { // check if there is some data to insert
			$keys = array_keys($fields); // retrieve the keys
			$values = '';
			$x = 1;

			foreach ($fields as $field) { // form backbone of data prepare
				
				// set the value to the select array
				$values .= $field;
				if ($x < count($fields)) { // prevent a commer "," at the end
					$values .= ', ';
				}


				$x++;
			}

			// set them to the select array
			$this->_select = $values;
			
		}

	}




	/*
	*****************************************************
	**		THE GET METHOD
	*****************************************************
	**  this will help to select data the database 
	*/

	public function get($table, $where) {
		return $this->action('SELECT '. $this->_select , $table, $where);
	}


	// public function allData() {
	// 	$sql = "SELECT * FROM `users`";
	// 	$params = [];
	// 	return $this->query($sql, $params);
	// }

	public function test() {
		echo 'hahahah this was a test from DB class <br>';
	}


	public function def_Query($sql, $values = array()) 
	{

			// if (in_array($operator, $operators)) { // check if the perator in inside the operator array
				// $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

				if (!$this->query($sql, $values)->error()) {
					return $this;
				}
			// }
	
		return false;
	}


	/*
	*****************************************************
	**		THE DELETE METHOD
	*****************************************************
	**  this will help to delete from the database 
	*/
	
	public function delete($table, $where) {
		return $this->action('DELETE', $table, $where);
	}













	/*
	*****************************************************
	**		THE INSERT METHOD
	*****************************************************
	**  this will help to insert data into the database 
	**  the data which has been sent from the database
	*/

	public function insert($table, $fields = array()) {
		
		// Form a query
		if (count($fields)) { // check if there is some data to insert
			$keys = array_keys($fields); // retrieve the keys
			$values = '';
			$x = 1;

			foreach ($fields as $field) { // form backbone of data prepare
				$values .= '?';
				if ($x < count($fields)) { // prevent a commer "," at the end
					$values .= ', ';
				}
				$x++;
			}

			$sql = "INSERT INTO $table (`" . implode('`, `', $keys) . "`) VALUES ({$values})";
			
			// peform a query
			if (!$this->query($sql, $fields)->error()) {
				return true;
			}
		}
	}













	/*
	*****************************************************
	**		THE UPDATE METHOD
	*****************************************************
	**  this will help to update data into the database 
	**  the data which has been sent from the database
	*/

	public function update($table, $id, $fields) {
		$set = '';
		$x = 1;

		foreach ($fields as $name => $value) {
			$set .= "{$name} = ?";
			if ($x < count($fields)) { // prevent the commer "," to the last line
			 	$set .= ',';
			}
			$x++; 
		}

		$sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
		
		// peform a query
		if (!$this->query($sql, $fields)->error()) {
			return true;
		}

		return false;
	}





	/*
	*****************************************************
	**		THE RESULTS
	*****************************************************
	**  this method will store all the results came form the query peformed 
	**  the data which has been sent from the database
	*/

	public function results() {
		return $this->_results;
	}











	/*
	*****************************************************
	**		THE FIRST RESULT
	*****************************************************
	**  this method will store the first result came form the query peformed 
	**  the data which has been sent from the database
	*/

	public function first() {
		return $this->results()[0];
	}









	/*
	*****************************************************
	**		THE COUNT
	*****************************************************
	**  this method will return the number of  
	**  the data which has been sent from the database
	*/

	public function count() {
		return $this->_count;
	}





	/*
	*****************************************************
	**		THE ERROR
	*****************************************************
	**  this method will store all the error came form the query peformed 
	**  the data which has been sent from the database
	*/

	public function error() {
		return $this->_error;
	} 


}
