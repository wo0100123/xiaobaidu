<?php

    class DB
    {
        private $tableName;        // 表名称
        static private $pdo;       // pdo 连接对象
        private $where_arr = [];   // where 条件数组
        private $orderBy = '';     // 排序
        private $limit = '';       // 分页
        
        /*
          功能: 生成pdo的单例
          参数: 无
          返回: 一个pdo连接
        */
        static public function getPdo()
        {
            if (empty(self::$pdo)) {
                self::$pdo = new PDO(DSN, USER, UPWD);
            }
            return self::$pdo;
        }
        
        /*
          功能: 把条件字符串临时放入到一个数组中
          参数: 某个查询条件
          返回: $this 对象自己,为的是连贯操作          
        */
        public function where($str)
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
        private function getWhere()
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
        public function __construct($tblName)
        {
            $this -> tableName = $tblName;

            self::getPdo();
        }
        /*
          功能: 插入记录
          参数: $data 要插入的记录数据
          返回: 受影响行数
        */
        public function insert($data)
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
            return self::$pdo->exec($sql);
        }
    
        
        /*
          功能: 删除记录
          参数: 暂无
          返回: 受影响行数
        */
        public function delete()
        {
            // 准备SQL语句
            $sql = "delete from {$this->tableName} ".$this->getWhere();
            
            $this->clearCondition(); // 清空条件
            
            // 发送执行,返回受影响行数
            return self::$pdo->exec($sql);
        }
        
        
        /*
          功能: 修改记录信息
          参数: $data 修改后的记录数据
          返回: 受影响行数
        */
        public function update($data)
        {
            $str = '';
            foreach($data as $k=>$v){
                $str .= "$k='$v',";
            }
            $str = rtrim($str,',');
            
            // 准备SQL语句
            $sql = "update {$this->tableName} set $str ".$this->getWhere();
            
            $this->clearCondition(); // 清空条件
            
            // 发送执行,返回受影响行数
            return self::$pdo->exec($sql);
        }
        
        /*
          功能: 查询数据
          参数: 暂无
          返回: 成功返回数组对象, 失败返回空数组
        */
        public function select()
        {
            // 准备SQL语句
            $sql = "select * from {$this->tableName} ".$this->getWhere().$this->orderBy.$this->limit;
            
            $this->clearCondition();  // 清空查询条件
            // echo $sql,'<br>';
            // 清空查询条件
            
            // 发送执行,返回预处理对象
            $stmt = self::$pdo->query($sql);
            
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }
        
        /*
          功能: 获取符合条件的总记录数
          参数: 无
          返回: 总记录数
        */
        public function rowCount()
        {
            $sql = "select count(*) cnt from {$this->tableName} ".$this->getWhere();
            $stmt = self::$pdo->query($sql);
            $obj = $stmt->fetch(PDO::FETCH_OBJ);
            return $obj->cnt;
        }
    
    
        /*
          功能: 生成排序子句
          参数: $str   要排序的字段
          返回: 无
        */
        public function orderBy($str)
        {
            $this -> orderBy = ' order By '.$str;
        }
        /*
          功能: 生成 limit 子句
          参数: $skip 要跳过的记录数
                $perPage 每页显示的记录数
          返回: 无
        */
        public function limit($skip, $perPage)
        {
            // 如果调用$db->limit(20,5); 就会生成 limit 20,5
            $this->limit = ' limit '.$skip.','.$perPage;
        }
        
        
        
        /*
          功能: 获取单个记录
          参数: 无
          返回: 单条记录信息(对象形式)
        */
        public function find()
        {
            $sql = "select * from {$this->tableName} ".$this->getWhere().' limit 1 ';
            $this->clearCondition();
            $stmt = self::$pdo->query($sql);
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        
        /*
          功能: 清空所有查询
          参数: 无
          返回: 无
        */
        private function clearCondition()
        {
            $this -> where_arr = [];
            $this -> limit = '';
            $this -> orderBy = '';
        }
        
    }