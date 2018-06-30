<?php

    class DB
    {
        public $tableName;
        public $pdo;
        public $where_arr = [];
        public $limit = '';
        
        /*
          功能: 把条件字符串临时放入到一个数组中
          参数: 某个查询条件
          返回: $this 对象自己,为的是连贯操作          
        */
        function where($str)
        {
            $this->where_arr[] = $str;
            return $this;
        }
        
        /*
          功能: 判断where_arr数组中是否有查询条件,如果有就生成并返回条件字符串
                如果没有就返回空字符串
          参数: 无
          返回: 条件字符串
        */
        function getWhere()
        {
            if (!empty($this->where_arr)) {
                return ' where '.implode(' and ', $this->where_arr);
            }
            
            return '';
        }
        
        /*
          功能: 构造方法,指定要操作的对象(表名称)
          参数: $tblName 表名称
          返回: 无
        */
        function __construct($tblName)
        {
            $this -> tableName = $tblName;
            $this->pdo = new PDO(DSN, USER, UPWD);
        }
        /*
          功能: 插入记录
          参数: $data 要插入的记录数据
          返回: 受影响行数
        */
        function insert($data)
        {
            $fields  = '';
            $values  = '';
            foreach($data as $k=>$v){
                $fields .= "$k,";
                $values .= "'$v',";
            }
            $fields = rtrim($fields,',');
            $values = rtrim($values,',');
            
            // 准备SQL语句
            $sql = "insert into {$this->tableName}($fields) values($values)";
            
            // 发送执行
            return $this->pdo->exec($sql);
        }
    
        
        /*
          功能: 删除记录
          参数: 暂无
          返回: 受影响行数
        */
        function delete()
        {
            // 准备SQL语句
            $sql = "delete from {$this->tableName} ".$this->getWhere();
            
            // 发送执行,返回受影响行数
            return $this->pdo->exec($sql);
        }
        
        
        /*
          功能: 修改记录信息
          参数: $data 修改后的记录数据
          返回: 受影响行数
        */
        function update($data)
        {
            $str = '';
            foreach($data as $k=>$v){
                $str .= "$k='$v',";
            }
            $str = rtrim($str,',');
            
            // 准备SQL语句
            $sql = "update {$this->tableName} set $str ".$this->getWhere();
            
            // 发送执行,返回受影响行数
            return $this->pdo->exec($sql);
        }
        
        /*
          功能: 查询数据
          参数: 暂无
          返回: 成功返回数组对象, 失败返回空数组
        */
        function select()
        {
            // 准备SQL语句
            $sql = "select * from {$this->tableName} ".$this->getWhere().$this->limit;
            
            // echo $sql,'<br>';
            // 清空查询条件
            
            // 发送执行,返回预处理对象
            $stmt = $this->pdo->query($sql);
            
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }
        
        /*
          功能: 获取符合条件的总记录数
          参数: 无
          返回: 总记录数
        */
        function rowCount()
        {
            $sql = "select count(*) cnt from {$this->tableName} ".$this->getWhere();
            $stmt = $this->pdo->query($sql);
            $obj = $stmt->fetch(PDO::FETCH_OBJ);
            return $obj->cnt;
        }
    
        /*
          功能: 生成 limit 子句
          参数: $skip 要跳过的记录数
                $perPage 每页显示的记录数
          返回: 无
        */
        function limit($skip, $perPage)
        {
            // 如果调用$db->limit(20,5); 就会生成 limit 20,5
            $this->limit = ' limit '.$skip.','.$perPage;
        }
        
        
        
        /*
          功能: 获取单个记录
          参数: 无
          返回: 单条记录信息(对象形式)
        */
        function find()
        {
            $sql = "select * from {$this->tableName} ".$this->getWhere().' limit 1 ';
            $stmt = $this->pdo->query($sql);
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        
    }