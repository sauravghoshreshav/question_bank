<!DOCTYPE html>

<?php
    $rootpath=$_SERVER["DOCUMENT_ROOT"];
    require_once $rootpath."/sem3/database/database.php";
    require_once $rootpath."/sem3/database/exam_class.php";
    require_once $rootpath."/sem3/database/question_class.php";
    $db_table=new database();
    $db_table->course_table();
    $db_table->exam_table();
    $db_table->question_table();
    $db_table->add_courses();
    
 //   if(isset($_POST['course_title']) && isset($_POST['course_code']))
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $exm=new exam();    //create objects of exam and question class 
        $exam=$_POST['Exam_type'];
        $semester=$_POST['Semester'];
        $year=$_POST['year'];
        $title=$_POST['course_title'];
        $code=$_POST['course_code'];
        $marks=$_POST['full_marks'];
        $duration=$_POST['time'];

        if($title!='')
        {
        $details=[                          //creating array to store values
            "year"=>$year,
            "semester"=>$semester,
            "exam"=>$exam,
            "code"=>$code,
            "marks"=>$marks,
            "time"=>$duration];

        $exm->store($details);
        }

        header("Location: question.php");     //redirecting to new page
    
  
    }
?>


<html lang="en">

    <head>
            <!-- meta tags -->
        <meta charset="utf-8">
        <!-- <meta name="viewport" content="width=device-width, initial-scaled=1"> -->
        <title>Examination</title>  
        <!-- bootstrap link -->
        <link href="/sem3/CSS/bootstrap/css/bootstrap.min.css"  rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script src="\sem3\CSS\bootstrap\js\bootstrap.bundle.min.js"></script>
        <script src="\sem3\jQuery\jquery.js"></script>
        <script src="exam.js"></script>   
    </head>

    <body>
        
    <h1 class="page-title">Give the exam details for creating question paper:</h1>

        <form id="examDetails" action="examDetails.php" method="POST">
        
                <label for="Exam_type">Exam Type:</label>            
                <select name="Exam_type" id="Exam_type">
                    <option value="">--Select a Examnation Type--</option>
                    <option value="Sessional-I"> Sessional I Exam</option>
                    <option value="Mid Term"> Mid-Term Exam</option>
                    <option value="Sessional-II"> Sessional II Exam</option>
                    <option value="End Term"> End-Term Exam</option>
                </select>
          
                <br>
                <label for="Semester">Semester:</label>                             
                <input type="radio" id="Spring" name="Semester" value="Spring" >&nbsp; Spring
                    &nbsp;&emsp;&emsp;&emsp;&emsp;                     
                <input type="radio" id="autumn" name="Semester" value="Autumn" >&nbsp; Autumn
    

            <!-- added year element newly -->
            <p>
               
            <label for="btnyear">Select a Year:</label>
            <select id="btnyear" name="year">    
                <option>available from 2020</option>
             </select> 
             
             </p>

            <label for="btncourse"> Select a Course:</label>
            <select id="btncourse" name="course_title">
                <option id="">------MCA course options---------</option>
            </select>
            <br>

           <!-- <label for="coursetitle">Course Title:</label>
            <input type="text" id="coursetitle" name="course_title" required><br> -->
            <br>
            <label for="btncode">Course Code:</label>
            <input type="text" id="btncode" name="course_code" required><br>
            
            <label  for="fullmarks">Full Marks:</label>
            <input type="text" id="fullmarks" name="full_marks" required><br>

            <label for="time">Time (in mins):</label>
            <input type="text" id="time" name="time" required><br>
        
            <input class="sub" type="submit" id="btncreate" value="Create" >
          
        </form>

    </body>


<div>
    <!-- <body>
        
    <h1>Give the exam details for creating question paper:</h1>
        <div>
            <form action="home.php" method="POST">
                
                <label for="semester">Semester Type:</label>
                <input type="text" id="semester" name="semester_type" required><br>
                
                <label for="year">Year:</label>
                <input type="text" id="year" name="year" required><br>

                <label for="coursetitle">Course Title:</label>
                <input type="text" id="coursetitle" name="course_title" required><br>

                <label for="course">Course Code:</label>
                <input type="text" id="course" name="course_code" required><br>
                
                <label  for="fmarks">Full Marks:</label>
                <input type="text" id="fullmarks" name="full_marks" required><br>

                <label for="time">Time:</label>
                <input type="text" id="time" name="time" required><br>
            
                <input type="submit" id="btncreate" value="Create" >
            </form>
        </div>
    </body> -->
</div>
</html>