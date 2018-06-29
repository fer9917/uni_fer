<?php
class Connection {
	public $connection;
	public $affectedRows = 0;

// DB connected
	private function connect() {
		require ("models/configuracion.php");

		if (!$this -> connection = mysqli_connect($servidor, $usuariobd, $clavebd, $bd)) {
			echo "Error al tratar de conectar";
		}
	
	// Prevent UTF8 errors
		$this -> connection -> set_charset('utf8');
	}

// Close connection
	private function close() {
		$this -> connection -> close();
	}

// Basic query
	public function query($query) {
		$this -> connect();
		$result = $this -> connection -> query($query) or die("Error en la consulta" . $this -> connection -> error . "Error:" . $query);

		$this -> close();
		return $result;
	}

//Return the insert ID
	public function insert_id($query) {
		$this -> connect();
		if (stristr($query, 'insert')) {
			$this -> connection -> query($query) or die("<b style='color:red;'>Error en la consulta.</b><br /><br />" . $this -> connection -> error . "<be>Error:<br>" . $query);

			return $this -> connection -> insert_id;
			$this -> close();
		} else {
			$this -> close();
			return "La consulta no tiene un INSERT.";
		}
	}

// Return array with the rows
	public function query_array($sql, $relational = true) {
		try {
			if (empty($sql)) {
				throw new Exception("empty SQL");
			}
			$this -> sql = $sql;
			$this -> connect();

			$result = $this -> connection -> query($sql) or die("Error en la consulta." . $this -> connection -> error . "Error:" . $sql);

			$this -> affectedRows = mysqli_num_rows($result);

			$fields = array();
			while ($finfo = mysqli_fetch_field($result)) {
				$fields[] = $finfo -> name;
			}

			$rows = array();

			if ($relational) {
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					$rows[] = $row;
				}
			} else {
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
					foreach ($row as $key => $value) {
						$rows[$key][] = $value;
					}
				}
			}
			$this -> close();
			return array("status" => true, "total" => $this -> affectedRows, "fields" => $fields, "rows" => $rows);

		} catch(Exception $e) {
			$this -> close();
			return array("status" => false, "msg" => $e -> getMessage());
		}
	}
}
?>