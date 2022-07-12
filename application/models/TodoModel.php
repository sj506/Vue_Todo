<?php

namespace application\models;
use PDO;

class TodoModel extends Model {
    public function insTodo(&$param) {
        $sql = "INSERT INTO t_todo
                (todo)
                value
                (:todo)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':todo', $param['todo']);
    $stmt->execute();
    return $stmt->rowCount();        
    }


    public function selTodoList() {
        $sql = "SELECT * FROM t_todo";
    $stmt = $this->pdo->prepare($sql);
    // $stmt->bindValue(':todo', $param['todo']);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function delTodo(&$param) {
        $sql = "DELETE FROM t_todo";
                if($param['itodo'] > 0) {
                    $itodo = $param['itodo'];
                    $sql .= "WHERE itodo = {$itodo}";
                }
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();  
    }    
}