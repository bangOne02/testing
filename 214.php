<?php


class DBOperations{

      public $host = '172.16.0.69';
      public $user = 'admin';
      public $db = 'dms';
      public $pass = 'admin';
      public $conn;
    public $host2 = '172.16.0.225';
      public $user2 = 'admin';
      public $db2 = 'dms';
      public $pass2 = 'admin';
      public $conn2;

     // public $host = 'localhost';
     // public $user = 'root';
     // public $db = 'ceklist';
     // public $pass = '';
     // public $conn;

    public function __construct() {
      $this -> conn = new PDO("mysql:host=".$this -> host.";dbname=".$this -> db, $this -> user, $this -> pass);
  //  $this -> conn2 = new PDO("mysql:host=".$this -> host2.";dbname=".$this -> db2, $this -> user2, $this -> pass2);
    }

   
}


   

    $db = new DBOperations(); 
    $sql2 = 'SELECT u.nid,u.id,w.hierarchy_id
              FROM  users u
              LEFT JOIN working_history w ON u.id = w.user_id AND w.is_active = 1 
              WHERE w.hierarchy_id IS NOT NULL and u.nid = :nid
              GROUP BY nid';

    $query2 = $db -> conn -> prepare($sql2);
    $query2 -> execute(array(':nid' => 99999999999));
    $data = $query2 -> fetchObject();

    // echo $data;

    if ($data)
    {
      echo "a";
    } else
    {
      echo "b";
    }



    // $proses = $data -> hierarchy_id;

    // echo $proses;
    // foreach ($asset as $value) {

    // $sql = 'REPLACE INTO opnames (asset_code,sno,asset_condition,explanation,user_id,month,years) values ("'.$asset.'",0,"'.$kondisi.'","'.$keterangan.'","'.$id.'","'.$month.'","'.$years.'")';

    //  //print_r($sql);
    // $query = $db -> conn -> prepare($sql);
    // $query -> execute();
    
    // if($query){
    //       $response["result"] = "success";
    //       $response["message"] = "Proses Successfully";
    //       echo json_encode($response);
    //   } else {
    //       $response["result"] = "failure";
    //       $response["message"] = "Proses Gagal";
    //       echo json_encode($response);
    //   }

