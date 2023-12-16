<?php
//Database connection code here:
class database{
    private $servername = "localhost";
    public $username = "root";
    private $password = "";
    private $dbname="question_db";
    public $conn='';                 //conn => connection 

    public function __construct()    //constructor function for connection
    {
        try
        {
            $this->conn=new PDO("mysql:host=$this->servername;dbname=$this->dbname",$this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //set PDO error mode to exception
            // echo " connection successfull<br>";
        }

        catch(PDOException $e)
        {
               echo "Connection failed:<br>"."<br><br>". $e->getMessage();  
        }

    }

    public function course_table(){    //creating course_details table
//        $db= new database();
        $q="create table course_details
        (
        ID int AUTO_INCREMENT primary key,  
        TITLE VARCHAR(255) not null,
        CODE VARCHAR (10) UNIQUE        
        );";
        $pq=$this->conn->prepare($q);
        try{
          $pq->execute();
          // echo("<br>course table created");
        }
        catch(Exception $ee)
        {
        //  echo("<br>Couldn't create course table.".$ee->getMessage());
        }

  }

    public function exam_table(){   //constructor to create EXAM DETAILS table
 //       $db= new database();
        $q="create table exam_details
        (
          ID int AUTO_INCREMENT primary key,
          YEAR int(10) not null,
          SEMESTER varchar(10) not null,
          EXAMINATION VARCHAR(15) not null,
          COURSE_CODE varchar(10) not null,
          FULL_MARKS int(5) not null,
          TIME varchar(10) not null,
          FOREIGN KEY (COURSE_CODE) REFERENCES course_details(CODE)
        );";
        $pq=$this->conn->prepare($q);
        try{
          $pq->execute();
          echo("<br>exam_details table created");
        }
        catch(Exception $ee)
        {
          // echo("<br>exam_details not created".$ee->getMessage());
        }

    }

    public function question_table(){    //creating question_details table
//              $db= new database();
              $q="create table question_details
              (
              COURSE_CODE VARCHAR(10),
              EXAM_ID int,
              QUESTION LONGTEXT,
              MARK VARCHAR(10),
              Q_TYPE VARCHAR(10),
              FOREIGN KEY (COURSE_CODE) REFERENCES course_details(CODE), 
              FOREIGN KEY (EXAM_ID) REFERENCES exam_details(ID)      
              );";
              $pq=$this->conn->prepare($q);
              try{
                $pq->execute();
                // echo("<br>question table created");
              }
              catch(Exception $ee)
              {
                // echo("<br>Couldn't create question table.".$ee->getMessage());
              }
    
    }

    public function add_courses(){        // query to insert course list 
//      $db= new database();
      $q="insert into course_details(CODE, TITLE) 
      values 
      ('CO103', 'Introductory Computing' ),
      ('CO104', 'Computing Lab '),
      ('CO202', 'Digital Logic Design '),
      ('CO209', 'Computing Workshop '),
      ('CO208', 'Object Oriented Programming'),
      ('CO214', 'Computer Architecture and Organization '),
      ('CO215', 'Computer Organization Lab '),
      ('CO218', 'Data Communication '),
      ('CS305', 'Internet Concepts and Web Technology'),
      ('EF103', 'Communicative English '),
      ('CS405', 'Discrete Mathematics'),
      ('CS412', 'Data Structures '),
      ('CS416', 'OO programming and data Structures Lab'),
      ('IC361', 'Accounting and Financial Management '),
      ('CS413', 'Database Management System '),
      ('CS414', 'Database Management System Lab'),
      ('CS417', 'Operating Systems'),
      ('CS418', 'Operating Systems Lab '),
      ('CS513', 'Software Engineering '),
      ('CS518', 'Software Engineering Lab'),
      ('CS519', 'Computer Networks '),
      ('CS520', 'Computer Networks Lab'),
      ('CS510', 'Minor Project '),
      ('CS515', 'Major Project '),
      ('CS421', 'Graph Theory'),
      ('CS422', 'Numerical Methods'),
      ('CS424', 'Formal Language and Automata '),
      ('CO423', 'Web Technology '),
      ('CO504', 'Natural Language Processing '),
      ('CO505', 'Advanced Database Management System '),
      ('CO513', 'Fundamentals of Speech Processing'),
      ('CO517', 'Virtual and Augmented Reality '),
      ('IT504', 'E-Commerce '),
      ('IT509', 'Data Mining & Data Warehousing'),
      ('IT507', 'Computer Security & Cryptography' ),
      ('IT517', 'Pattern Recognition'),
      ('CS522', 'Computer Graphics '),
      ('CS524', 'Theory of Computation' ),
      ('CS525', 'Artificial Intelligence'),
      ('CS532', 'Compiler Design'),
      ('CS541', 'Mathematical Foundation for Computer Science '),
      ('CS530', 'Data Analytics and Visualization'),
      ('CS538', 'Computational Geometry'),
      ('CS529', 'Embedded Systems '),
      ('CS601', 'Design & Analysis of Algorithms'),
      ('CS602', 'Image Processing '),
      ('CS606', 'Computer Architecture and Parallel Processing '),
      ('CS609', 'Geographic Information Systems'),
      ('CS610', 'Bioinformatics '),
      ('IT611', 'Distributed Systems'),
      ('CS621', 'Mobile Computing'),
      ('CS638', 'Software Defined Networking & Network Function Virtualization')
      ;";

      $pq=$this->conn->prepare($q);
      try{
          $pq->execute();
          // echo("<br>course list entered");
      } 
      catch(Exception $ee)
      {
          // echo("<br>course list not inserted".$ee->getMessage());
      }

    }  

}

// Close the database connection
//$conn->close();
?>
