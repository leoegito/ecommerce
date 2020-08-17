<?php

namespace Hcode;

class Model {

	private $values = [];

	public function __call($name, $args){

		$method = substr($name, 0, 3);//nome padrao do setalgumacoisa e getalgumacoisa
		$fieldName = substr($name, 3, strlen($name));
		switch ($method) {
			case "get":
				return $this->values[$fieldName];
			break;
			
			case "set":
				return $this->values[$fieldName] = $args[0];
			break;
		}
		exit;

	}

	public function setData($data = array()){

		foreach ($data as $key => $value) {
			//criando dinamicamente {string.$var}
			$this->{"set".$key}($value);
		}

	}

	public function getValues(){
		return $this->values;
	}

}


?>