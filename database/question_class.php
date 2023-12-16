<?php
$rootpath=$_SERVER["DOCUMENT_ROOT"];
require_once $rootpath."/sem3/database/database.php";
require_once $rootpath."/sem3/database/exam_class.php";

class question{
    //   public function __construct(){    //creating question_details table
    //       $db= new database();
    //       $q="create table question_details
    //       (
    //       Q_ID int AUTO_INCREMENT primary key,  
    //       QUESTION LONGTEXT not null,
    //       MARK int(10) not null         
    //       );";
    //       $pq=$db->conn->prepare($q);
    //       try{
    //         $pq->execute();
    //         echo("<br>question table created");
    //       }
    //       catch(Exception $ee)
    //       {
    //  //       echo("<br>Couldn't create question table.".$ee->getMessage());
    //       }

    // }

      public function store($details){        // query to insert questions 
        $db= new database();
        $q="insert into question_details(QUESTION, MARK)            
        values
        (
            '".$details['question']."', 
            '".$details['mark']."'
        );";

        $pq=$db->conn->prepare($q);
        try{
            $pq->execute();
            echo("<br>name & location value entered");
        } 
        catch(Exception $ee)
        {
            echo("<br>name & location value not inserted".$ee->getMessage());
        }

        header("Location: output.php");     //redirecting to new page
    
    } 

    public function showInfo(){        //displaying questions in output page
      $db = new database();
      $str = "SELECT ID, COURSE_CODE
             FROM exam_details
             ORDER BY ID DESC
             LIMIT 1;";
      $ps = $db->conn->prepare($str);
      $ps -> execute();
      $data = $ps->fetch();

      $cmd = "SELECT QUESTION , MARK
              FROM question_details
              ORDER BY Q_ID DESC
              ;";
      $ps = $db->conn->prepare($cmd);
      $ps -> execute();
      $view = $ps->fetchAll();

  return $view;       
}
}   


?>              


