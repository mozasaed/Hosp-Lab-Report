<?php
session_start();
require_once('dbconfig.php');
define('SALT_LENGTH', 9);
class DBHelper{

    private $conn;
    public function __construct(){
        
       $database = new Database();
        $conn = $database->dbConnection();
        $this->conn = $conn;
    }

    public function runQuery($sql)
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }
    

    public function PwdHash($pwd, $salt = null)
    {
        if ($salt === null)
        {
            $salt = substr(md5(uniqid(rand(), true)), 0, SALT_LENGTH);
        }
        else 
        {
            $salt = substr($salt, 0, SALT_LENGTH);
        }
        return $salt . sha1($pwd . $salt);
    }

    public function generate_password($length = 20){
        $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
            '0123456789=!@#$%&*';

        $str = '';
        $max = strlen($chars) - 1;

        for ($i=0; $i < $length; $i++)
            $str .= $chars[random_int(6, $max)];

        return $str;
    }

    /*
     * Returns rows from the database based on the conditions
     * @param string name of the table
     * @param array select, where, order_by, limit and return_type conditions
     */
    public function getRows($table, $conditions = []) {
        try {

            $sql = 'SELECT ';
            $sql .= array_key_exists("select", $conditions)? $conditions['select']:'*';
            $sql .= ' FROM '.$table;

            // final my code for minimization...
            if(array_key_exists("table_combination", $conditions) || array_key_exists("where", $conditions) || array_key_exists("complex", $conditions)){
                $sql .= ' WHERE ';

                if(array_key_exists("table_combination",$conditions)){
                    $i = 0;
                    foreach($conditions['table_combination'] as $key => $value){
                        $pre = ($i > 0)?' AND ':'';
                        $sql .= $pre.$key." = ".$value;
                        $i++;
                    }
                }

                $sql .= array_key_exists("table_combination", $conditions) && array_key_exists("where", $conditions) ? " AND ": "";

                if(array_key_exists("where", $conditions)){
                    $i = 0;
                    foreach($conditions['where'] as $key => $value){
                        $pre = ($i > 0)?' AND ':'';
                        $sql .= $pre.$key." = '".$value."'";
                        $i++;
                    }
                }

                $sql .= array_key_exists("table_combination", $conditions) || array_key_exists("where", $conditions) ? (array_key_exists("complex", $conditions) ? " AND ": "" ): "";

                $sql .= array_key_exists("complex", $conditions) ? $conditions['complex'] : "";

            }

            if(array_key_exists("order_by", $conditions)){
                $sql .= ' ORDER BY '.$conditions['order_by']; 
            }

            if(array_key_exists("group_by", $conditions)){
                $sql .= ' GROUP BY '.$conditions['group_by']; 
            }
            
            if(array_key_exists("start", $conditions) && array_key_exists("limit", $conditions)){
                $sql .= ' LIMIT '.$conditions['start'].','.$conditions['limit']; 
            }elseif(!array_key_exists("start", $conditions) && array_key_exists("limit", $conditions)){
                $sql .= ' LIMIT '.$conditions['limit']; 
            }
            
            $query = $this->conn->prepare($sql);
            $query->execute();
            
            if(array_key_exists("return_type", $conditions) && $conditions['return_type'] != 'all'){
                switch($conditions['return_type']){
                    case 'count':
                        $data = $query->rowCount();
                        break;
                    case 'single':
                        $data = $query->fetch(PDO::FETCH_ASSOC);
                        break;
                    default:
                        $data = '';
                }
            }else{
                if($query->rowCount() > 0){
                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                }
            }
            return !empty($data)?$data:false;

        }catch(PDOException $e) {
            echo $e;
        }
    }
    
    public function getDistinctRows($table, $conditions = []) {
        try {

            $sql = 'SELECT';
            $sql .= array_key_exists("select", $conditions)? $conditions['select']:'*';
            $sql .= ' FROM '.$table;

            // final my code for minimization...
            if(array_key_exists("table_combination", $conditions) || array_key_exists("where", $conditions) || array_key_exists("complex", $conditions)){
                $sql .= ' WHERE ';

                if(array_key_exists("table_combination",$conditions)){
                    $i = 0;
                    foreach($conditions['table_combination'] as $key => $value){
                        $pre = ($i > 0)?' AND ':'';
                        $sql .= $pre.$key." = ".$value;
                        $i++;
                    }
                }

                $sql .= array_key_exists("table_combination", $conditions) && array_key_exists("where", $conditions) ? " AND ": "";

                if(array_key_exists("where", $conditions)){
                    $i = 0;
                    foreach($conditions['where'] as $key => $value){
                        $pre = ($i > 0)?' AND ':'';
                        $sql .= $pre.$key." = '".$value."'";
                        $i++;
                    }
                }

                $sql .= array_key_exists("table_combination", $conditions) || array_key_exists("where", $conditions) ? (array_key_exists("complex", $conditions) ? " AND ": "" ): "";

                $sql .= array_key_exists("complex", $conditions) ? $conditions['complex'] : "";

            }

            if(array_key_exists("order_by", $conditions)){
                $sql .= ' ORDER BY '.$conditions['order_by']; 
            }

            if(array_key_exists("group_by", $conditions)){
                $sql .= ' GROUP BY '.$conditions['group_by']; 
            }
            
            if(array_key_exists("start", $conditions) && array_key_exists("limit", $conditions)){
                $sql .= ' LIMIT '.$conditions['start'].','.$conditions['limit']; 
            }elseif(!array_key_exists("start", $conditions) && array_key_exists("limit", $conditions)){
                $sql .= ' LIMIT '.$conditions['limit']; 
            }
            
            $query = $this->conn->prepare($sql);
            $query->execute();
            
            if(array_key_exists("return_type", $conditions) && $conditions['return_type'] != 'all'){
                switch($conditions['return_type']){
                    case 'count':
                        $data = $query->rowCount();
                        break;
                    case 'single':
                        $data = $query->fetch(PDO::FETCH_ASSOC);
                        break;
                    default:
                        $data = '';
                }
            }else{
                if($query->rowCount() > 0){
                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                }
            }
            return !empty($data)?$data:false;

        }catch(PDOException $e) {
            echo $e;
        }
    }
    /*
     * Insert data into the database
     * @param string name of the table
     * @param array the data for inserting into the table
     */
    public function insert($table,$data){
        try {
            if (!empty($data) && is_array($data)) {
                $columns = '';
                $values = '';
                $i = 0;
                if (!array_key_exists('createdDate', $data)) {
                    $data['createdDate'] = date("Y-m-d H:i:s");
                }
                if (!array_key_exists('modifiedDate', $data)) {
                    $data['modifiedDate'] = date("Y-m-d H:i:s");
                }

                if (!array_key_exists('createdBy', $data)) {
                    $data['createdBy'] = $_SESSION['id_session'];
                }

                if (!array_key_exists('modifiedBy', $data)) {
                    $data['modifiedBy'] = $_SESSION['id_session'];
                }

                $columnString = implode(',', array_keys($data));
                $valueString = ":" . implode(',:', array_keys($data));
                $sql = "INSERT INTO " . $table . " (" . $columnString . ") VALUES (" . $valueString . ")";
                $query = $this->conn->prepare($sql);
                foreach ($data as $key => $val) {
                    $query->bindValue(':' . $key, $val);
                }
                $insert = $query->execute();
                return $insert ? $this->conn->lastInsertId() : false;
            } else {
                return false;
            }
        }catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    
    /*
     * Update data into the database
     * @param string name of the table
     * @param array the data for updating into the table
     * @param array where condition on updating data
     */
    public function update($table,$data,$conditions){
        $_SESSION['id_session'] = 0;
        try {
            if (!empty($data) && is_array($data)) {
                $colvalSet = '';
                $whereSql = '';
                $i = 0;
                if (!array_key_exists('modifiedDate', $data)) {
                    $data['modifiedDate'] = date("Y-m-d H:i:s");
                }
                if (!array_key_exists('modifiedBy', $data)) {
                    $data['modifiedBy'] = $_SESSION['id_session'];
                }
                foreach ($data as $key => $val) {
                    $pre = ($i > 0) ? ', ' : '';
                    $colvalSet .= $pre . $key . "='" . $val . "'";
                    $i++;
                }
                if (!empty($conditions) && is_array($conditions)) {
                    $whereSql .= ' WHERE ';
                    $i = 0;
                    foreach ($conditions as $key => $value) {
                        $pre = ($i > 0) ? ' AND ' : '';
                        $whereSql .= $pre . $key . " = '" . $value . "'";
                        $i++;
                    }
                }
                $sql = "UPDATE " . $table . " SET " . $colvalSet . $whereSql;
                $query = $this->conn->prepare($sql);
                $update = $query->execute();
                return $update ? $query->rowCount() : false;
            } else {
                return false;
            }
        }catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    
    /*
     * Delete data from the database
     * @param string name of the table
     * @param array where condition on deleting data
     */
    public function delete($table,$conditions){
        $whereSql = '';
        if(!empty($conditions)&& is_array($conditions)){
            $whereSql .= ' WHERE ';
            $i = 0;
            foreach($conditions as $key => $value){
                $pre = ($i > 0)?' AND ':'';
                $whereSql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }
        $sql = "DELETE FROM ".$table.$whereSql;
        $delete = $this->conn->exec($sql);
        return $delete?$delete:false;
    }



    public function doLogin($uname, $upass)
    {
        try {
            $stmt = $this->conn->prepare('SELECT * FROM hlr_users  WHERE email=:email');
            $stmt->execute(array(':email' => $uname));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['status'] = $userRow['status'];
       
            if ($stmt->rowCount() > 0) {
                if ($userRow['status'] == 1) {
        
                    if ($userRow['password'] === $this->PwdHash($upass, substr($userRow['password'], 0, 9))) {
                        echo "wrong pass";
                        $_SESSION['username'] = $userRow['userName'];
                        $_SESSION['id_session'] = $userRow['userId'];
                        return true;
                    }
                  
               
                } else {
                    return false;
                
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    
 
   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
 
   public function redirect($url)
   {
       header("Location: $url");
   }
 
   public function doLogout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }

    public function getData($table,$attrName,$id,$id2)
    {
        $query = $this->getRows($table,array('where'=>array($id=>$id2),' order_by'=>' courseID ASC'));
        if(!empty($query))
        {
            foreach ($query as  $q) {
                $attrName=$q[$attrName];
                return $attrName;
            }
        }
        else
        {
            return null;
        }
    }

    public function getDataArray($table, $attrName, $conditions = array())
    {
        try {
            $query = $this->getRows($table, array('where' => $conditions, ' order_by' => $attrName . '  ASC'));
            if (!empty($query)) {
                foreach ($query as  $q) {
                    $attrName = $q[$attrName];
                }
                return $attrName;
            }
        } catch (PDOException $exception) {
            echo 'Getting Data error: ' . $exception->getMessage();
        }
    }


    public function isFieldExist($table,$field,$field2)
    {
        $query=$this->getRows($table,array('where'=>array($field=>$field2),'order_by'=>$field.' ASC'));
        if(!empty($query))
        {
            return true;
        }
        else
        {
            return false;
        }
    }



    public function getAllData($query, $params = []){
		try {
			$stmt = $this->conn->prepare($query);
			$stmt->execute($params);
			return $stmt->fetchAll();
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}
	}


}
?>
