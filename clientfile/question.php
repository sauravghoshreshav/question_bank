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

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scaled=1">
    <title>Examination</title>
    <!-- bootstrap link -->
    <link rel="stylesheet" href="/sem3/CSS/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="/sem3/CSS/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src=/sem3/jQuery/jquery.js></script>
    <script src="question.js"></script>
    <title>Q_Paper</title>
</head>

<body>

    <h2 style="text-align: center;">_-_-_-_Exam details displayed below_-_-_-_</h2><br>
    <P style="text-align: center;">COURSE TITLE EXPECTED HERE
        <?php

            ?>
    </P>
    <!-- Displaying exam info  -->
    <div class="container" style="background:#3333ff">
        <?php foreach ($examInfo as $row): ?>
        <!--  start of for each loop  -->
        <p class="data-item">
            &nbsp&nbsp
            YEAR: <span> <?php echo $row['YEAR']; ?> &nbsp&nbsp</span>
            SEMESTER: <span> <?php echo $row['SEMESTER']; ?> &nbsp&nbsp</span>
            EXAM: <span> <?php echo $row['EXAMINATION']; ?> &nbsp&nbsp</span>
            COURSE_CODE: <span> <?php echo $row['COURSE_CODE']; ?> &nbsp&nbsp</span>
            FULL_MARKS: <span> <?php echo $row['FULL_MARKS']; ?> &nbsp&nbsp</span>
            TIME: <span> <?php echo $row['TIME']; ?> </span>

        </p>

        <?php endforeach; ?>
        <!-- end of for each loop  -->
    </div>

    <!-- Displaying question input box with Marks box  -->

    <form id="questionForm" method="POST" action="question.php">

        <p>Enter the Questions for the exam:</p>

        <div id="questionContainer" style="">
            <!-- parent div -->
            
        </div>

        <button style="display: block; margin: 0 auto;" type="button" onclick="addQuestion()">Add Question</button><br>
        <input type="submit" value="Submit" style="display: block; margin: 0 auto;">

    </form>
</body>

</html>