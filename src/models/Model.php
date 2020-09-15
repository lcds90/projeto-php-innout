<?php 

class Model {
    // Responsabilidade para apontar para tabela de BD
    protected static $tableName = '';
    protected static $columns = [];
    protected $values = []; // não é estatica, pois cada istancia tem seu próprio

    // a partir do construtor passa o array feito na construção da instancia, e assim após passar os valores
    // as funções get e set servem para manipular-los
    function __construct($arr){
        $this->loadFromArray($arr);
    }

    public function loadFromArray($arr){
        if($arr){
            foreach($arr as $key => $value){
                $this->$key = $value;
            }
        }
    }
    public function __get($key){
        return $this->values[$key];
    }

    public function __set($key, $value){
        $this->values[$key] = $value;
    }

    // função para gerar select de determinado modelo
    public static function getSelect($filters = [],$columns = '*'){
        $sql = "SELECT ${columns} FROM "
        . static::$tableName;
        return $sql;
    }

    

}