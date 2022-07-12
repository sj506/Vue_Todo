<?php

namespace application\controllers;


class TodoController extends Controller {
    public function index() {
        switch(getMethod()) {
            case _GET:
        return $this->model->selTodoList();

            case _POST:
                $param = [
                    'todo' => $_POST['todo'],
                ];
                $list = $this->model->insTodo($param);
                return [_RESULT => $list];

            case _DELETE:
                $urlPaths = getUrlPaths();

                $param = [
                    "itodo" => 0,
                ];

                if(isset($urlPaths[2])){   
                    $param = [
                        'itodo' => intval($urlPaths[2]),
                    ];
                }
                return [_RESULT => $this->model->delTodo($param)];
        }
    }
}