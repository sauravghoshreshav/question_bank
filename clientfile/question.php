<!DOCTYPE html>

<?php                                  
    $rootpath=$_SERVER["DOCUMENT_ROOT"];
    require_once $rootpath."/sem3/database/database.php";
    require_once $rootpath."/sem3/database/exam_class.php";
    require_once $rootpath."/sem3/database/question_class.php";
    

    $e = new exam();
    $examInfo = $e->showInfo();         //$examInfo is used in html to view exam details
    
    // $code=$examInfo.[3];
    // $db= new database();
    // $str="SELECT title
    //       FROM course_details                //trying to fetch title
    //       WHERE code = '.$code.';";

    // $t=$db->conn->prepare($str);
    // $t=$t->execute();
    // $title=$t->fetch();
    // print_r($title);

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $q = new question();                            
    $question=$_POST['questions'];
    $mark= $_POST['marks'];   
    if (isset($question) && isset($mark)) {
        
                         // Insert each question & mark into the 'info' table
        if(count($question)==count($mark)){     //can replace count () function in the count side using  JS  array
        for($i=0;$i<count($question); $i++){//can use either count($question) or count($mark)
                
                $details=[
                    "question"=>$question[$i],
                    "mark"=>$mark[$i]
                ];
                $q->store($details);

                echo("<br><br>QUESTION: ".$question[$i]." ");
                echo("<br>MARK: ".$mark[$i]." <br>");
            }
        }
    }    

    else{
           echo "QUESTION NOT INSERTED";
        }
    }
?>

<html>
    <head>
        
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script src="question.js"></script>
        <title>Q_Paper</title>
        <script src="/sem3/jQuery/jquery.js"></script>
    </head>
      
    <body>
       
        <h2 style="text-align: center;">_-_-_-_Exam details displayed below_-_-_-_</h2><br>
        <P style="text-align: center;">COURSE TITLE EXPECTED HERE
            <?php

            ?>
        </P>
                              <!-- Displaying exam info  -->  
        <div class="container" style="background:#3333ff"> 
            <?php foreach ($examInfo as $row): ?>      <!--  start of for each loop  -->
                <p class="data-item">
                                                                                &nbsp&nbsp
                    YEAR:         <span>  <?php echo $row['YEAR']; ?>           &nbsp&nbsp</span> 
                    SEMESTER:     <span>  <?php echo $row['SEMESTER']; ?>           &nbsp&nbsp</span>
                    EXAM: <span>  <?php echo $row['EXAMINATION']; ?>          &nbsp&nbsp</span>
                    COURSE_CODE:  <span>  <?php echo $row['COURSE_CODE']; ?>    &nbsp&nbsp</span>
                    FULL_MARKS:   <span>  <?php echo $row['FULL_MARKS']; ?>     &nbsp&nbsp</span>
                    TIME:         <span>  <?php echo $row['TIME']; ?>           </span>
            
                </p>

            <?php endforeach; ?>                    <!-- end of for each loop  -->                         
        </div>        

                        <!-- Displaying question input box with Marks box  -->

            <form method="POST" action="question.php">

                <p>Enter the Questions for the exam:</p>

                <div id="questionContainer" style="">    <!-- parent div -->

                    <label for="type">select question type:</label>            
                    <select name="type" id="type">
                        <option value="type">--Type--</option>
                        <option  value="objective">Objective</option>
                        <option value="subjectivegit">Subjective</option>
                    </select><br>
                    <!-- <label>Question:</label>
                    <textarea rows="2" cols="60" name="questions[]" placeholder="Type here..."  oninput="adjustTextarea(this)"></textarea><br>

                    <span style="padding-right:35px">Mark:</span>

                    <input type="text" name="marks[]" placeholder="Marks"><br> -->

                    <!-- <button type="button" onclick="removeQuestion(this)">Remove</button> -->
                    <br><br>

                </div>      

                <button style="display: block; margin: 0 auto;" type="button" onclick="addQuestion()">Add Question</button><br>
                <input style="display: block; margin: 0 auto;" type="submit" value="Submit">

            </form>
    <!--</div><br>       -->

    </body>
</html>




