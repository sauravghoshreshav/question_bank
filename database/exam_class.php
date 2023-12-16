<?php
  $rootpath=$_SERVER["DOCUMENT_ROOT"];
  require_once $rootpath."/sem3/database/database.php";

class exam{

    // public function __construct(){   //constructor query to create table
    //     $db= new database();
    //     $q="create table exam_details
    //     (
    //       ID int AUTO_INCREMENT primary key,
    //       YEAR int(10) not null,
    //       SEMESTER varchar(10) not null,
    //       EXAMINATION VARCHAR(15) not null,
    //       COURSE_CODE varchar(10) not null,
    //       FULL_MARKS int(5) not null,
    //       TIME varchar(10) not null,
    //       FOREIGN KEY (COURSE_CODE) REFERENCES course_details(CODE)
    //     );";
    //     $pq=$db->conn->prepare($q);
    //     try{
    //       $pq->execute();
    //       echo("<br>exam_details table created");
    //     }
    //     catch(Exception $ee)
    //     {
    // //      echo("<br>exam_details not created".$ee->getMessage());
    //     }
    
    // }
// .$details['title'].,
    public function store($details){        // query to insert exam details 
      $db= new database();
      $q="insert into exam_details(YEAR, SEMESTER, EXAMINATION,  COURSE_CODE, FULL_MARKS, TIME)            
      values
      (
        '".$details['year']."',
        '".$details['semester']."',
        '".$details['exam']."', 
        '".$details['code']."',
        '".$details['marks']."', 
        '".$details['time']."'
      );";
      $pq=$db->conn->prepare($q);
      try{
        $pq->execute();
        echo("<br>exam_details value entered");
      }
      catch(Exception $ee)
      {
        echo("<br>exam_details value not inserted".$ee->getMessage());
      }

    }

    public function showInfo(){        //displaying values from exam details in question page
      $db = new database();
      $str = "select YEAR, SEMESTER, EXAMINATION, COURSE_CODE, FULL_MARKS,TIME
      FROM exam_details
      ORDER BY ID DESC
      LIMIT 1;";

      $ps = $db->conn->prepare($str);
      try{
        $ps->execute();
        $view = $ps->fetchAll();
        // echo("<br>exam_details value fetched");
      }
      catch(Exception $ee)
      {
        echo("<br>exam_details value not fetched".$ee->getMessage());
      }

      // $ps -> execute();
      // $view = $ps->fetchAll();
      // print_r($view);
      return $view;       
    }

}

?>