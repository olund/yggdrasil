<?php

class CDatabase {
	private $options;
	private $db = null;
	private $stmt = null;
	private static $nrOfQueries = 0;
	private static $queries = array();
	private static $params = array();

	function __construct($options) {
		$default = array(
			'dsn' => null,
			'username' => null,
			'passowrd' => null,
			'driver_options' => null,
			'fetch_style' => PDO::FETCH_OBJ,
		);
		$this->options = array_merge($default, $options);

		try {
			$this->db = new PDO($this->options['dsn'], $this->options['username'], $this->options['password'], $this->options['driver_options']);

		} catch (Exception $e) {
			// throw $e; // Throws everything
			throw new PDOException("Could not connect to database");
		}

    	$this->db->SetAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $this->options['fetch_style']); 
    }
    

    /**
     * Execute a select-query with arguments and returns the result
     * @param [string]  $query  [The SQL query]
     * @param array   $params [Array which contains the arguments to replace ?]
     * @param boolean $debug  [defaults to false, set to true to print out the sql query]
     * @return array [The result of the SELECT-Query]
     */
    function Select($query, $params = array(), $debug = false) {
    	// Debug
    	self::$queries[] = $query;
    	self::$params[] = $params;
    	self::$nrOfQueries++;
   		if($debug) {
  			echo "<p>Query = <br/><pre>{$query}</pre></p><p>Num query = " . self::$nrOfQueries . "</p><p><pre>".print_r($params, 1)."</pre></p>";
   		}
   		// time to do the actual thing
   		$this->stmt = $this->db->prepare($query);
   		$this->stmt->execute($params);
   		// finally return the result
   		return $this->stmt->fetchAll();
   	}

    
    /**
     * Get a html representation of all queries made, for debugging and analysing purpose
     *
     * @return string [string with the HTML]
     */
   	function DumpSQL() {
   		$html = '<p><i>You have made ' . self::$nrOfQueries . ' database queries.</i></p><pre>';
   		foreach (self::$queries as $key => $val) {
   			$params = empty(self::$params[$key]) ? null : htmlentities(print_r(self::$params[$key], 1)) . '<br><br>';
   			$html .= $val . '<br><br>' . $params;
   		}
   		return $html . '<pre>';
   	}


    function Query($query, $params = array(), $debug = false) {
        self::$queries[] = $query; 
        self::$params[]  = $params; 
        self::$nrOfQueries++;
     
        if($debug) {
          echo "<p>Query = <br/><pre>{$query}</pre></p><p>Num query = " . self::$nrOfQueries . "</p><p><pre>".print_r($params, 1)."</pre></p>";
        }

        // Time to do the actual sql query
        $this->stmt = $this->db->prepare($query);
        return $this->stmt->execute($params);
    }

    /**
     * Last inserted id
     */
    function LastInsertId() {
        return $this->db->LastInsertId();
    }

    function SaveDebug($debug = null) {
        if($debug) {
            self::$queries[] = $debug;
            self::$params[] = null;
        }

        self::$queries[] = 'Saved debuginformation to session.';
        self::$params[] = null;

        $_SESSION['CDatabase']['nrOfQueries'] = self::$nrOfQueries;
        $_SESSION['CDatabase']['queries'] = self::$queries;
        $_SESSION['CDatabase']['params'] = self::$params;
    }

    /**
    * Return rows affected of last INSERT, UPDATE, DELETE
    */
    function RowCount() {
      return is_null($this->stmt) ? $this->stmt : $this->stmt->rowCount();
    }
}