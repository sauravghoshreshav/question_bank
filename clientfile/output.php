<!DOCTYPE html>
<?php

$rootpath=$_SERVER["DOCUMENT_ROOT"];
require_once $rootpath."/sem3/database/database.php";
require_once $rootpath."/sem3/database/exam_class.php";
require_once $rootpath."/sem3/database/question_class.php";

$q = new question();
$questionInfo = $q->showInfo();         //$examInfo is used in html to view question details


?>

<html>
    <head>
        
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script src="script.js"></script>
        <title>Thank You</title>
        
    </head>
      
    <body>
        <h2 style="text-align: center;">_____QUESTIONS DISPLAYED _____</h2><br>

                            <!-- Displaying QUESTIONS  -->  
        <div class="container" style="border:solid 1px violet"> 
            <?php

            foreach ($questionInfo as $row): ?>      <!--  start of for each loop  -->
                <p class="data-item">                                                           
                    Question: <span>  <?php echo $row['QUESTION']; ?>      <br><br></span> 
                    Mark:     <span>  <?php echo $row['MARK']; ?>         </span><br><br><br>         
                </p>

            <?php endforeach; ?>                    <!-- end of for each loop  -->                         
        </div>     
    </body>
</html>               