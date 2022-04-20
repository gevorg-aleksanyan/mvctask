<?php
include ("DB.php");
class Model
{
    public $connection;
    public $table;
    public $sql;
    public $count;
    public $pageSize;

    public function __construct(){
        if(!$this->table){
            $this->table = lcfirst(get_class($this));
        }
        DB::getInstance();
        $this->connection = DB::$connection;
    }


    public function create($data){

        $fieldsArray = [];
        $valuesArray = [];
        foreach ($data as $key => $value){
            $fieldsArray[] = '`'.$key.'`';
            $valuesArray[] = "'".$value."'";
        }

        $fields = implode(',',$fieldsArray);
        $values = implode(',',$valuesArray);

        $sql = "INSERT INTO `$this->table` ($fields) VALUES ($values)";
        return $this->query($sql);
    }

    function select($what = '*'){
        $fieldsArray = [];

        if(is_array($what)){
            foreach ($what as $value){
                $fieldsArray[] = '`'.$value.'`';
            }
            $what = implode(',',$fieldsArray);
        }
        $this->sql = "SELECT $what FROM `$this->table`";

        $this->count = $this->count($this->sql);
        return $this;
    }

    public function where($conditions = []){
        $whereStr = 1;
        if($conditions){
            foreach ($conditions as $key => $value){
                $whereArray[] = '`'.$key.'`='."'$value'";
            }
            $whereStr = implode(' AND ',$whereArray);
        }

        $this->sql.= " WHERE $whereStr";
        $this->count = $this->count($this->sql);
        return $this;
    }

    public function get(){
        $result = [];
        $data =  $this->query($this->sql);
        while ($row = mysqli_fetch_assoc($data)) {
            $result[] = $row;
        }

        return $result;
    }

    public function first(){
        $data =  $this->query($this->sql);
        $result = mysqli_fetch_assoc($data);
        return $result;
    }


    public function update($what){
        $fieldsArray = [];

        if(is_array($what)){
            foreach ($what as $value => $key){
                $fieldsArray[] = "`".$value."`"." = '".$key."'";
            }
            $what = implode(',',$fieldsArray);
        }
        $this->sql = "UPDATE `$this->table` SET $what";
        return $this;
    }
    public function delete(){
        $this->sql = "DELETE FROM `$this->table`";
        return $this;
    }

    protected function query($sql){

        return $this->connection->query($sql);
    }

    public function paginate($pageSize = 20){
        $this->pageSize = $pageSize;
        $offset = 0;
        $page = 1;
        if(App::request()->get('page')){
            $page = App::request()->get('page');
            $offset = ($page-1)*$pageSize;
        }
        $count = "$offset,$pageSize";
        $this->limit($count);
        return $this->get();
    }

    public function links($ulClass = 'pagination'){

        $page = 1;
        if(App::request()->get('page')){
            $page = App::request()->get('page');
        }
        $pages = ceil($this->count/$this->pageSize);
        $nextPageLink = App::url(Controller::$currentController.'/'.Controller::$currentAction.'/page/'.($page+1));
        $prevPageLink = App::url(Controller::$currentController.'/'.Controller::$currentAction.'/page/'.($page-1));
        if($pages > 1){
            $links = '<nav aria-label="Page navigation example">
          <ul class="'.$ulClass.'">
            <li class="page-item"><a class="page-link" href="'.$prevPageLink.'">Previous</a></li>
            ';
            for($i=1;$i<=$pages;$i++){
                $pageLink = App::url(Controller::$currentController.'/'.Controller::$currentAction.'/page/'.$i);
                $links.='<li class="page-item"><a class="page-link" href="'.$pageLink.'">'.$i.'</a></li>';
            }
            $links.='<li class="page-item"><a class="page-link" href="'.$nextPageLink.'">Next</a></li>
          </ul>
        </nav>';
        }

               return $links;
    }

    public function limit($count){
        $this->sql.= " LIMIT $count";
        return $this;
    }

    public function count($sql){
        $data = $this->query($sql);
        $count = $data->num_rows;
        return $count;
    }

}