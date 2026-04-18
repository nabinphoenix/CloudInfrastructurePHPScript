<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Query Results</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
          <?php
               ini_set('display_errors', 1);
               error_reporting(E_ALL);
               mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

               include 'get-parameters.php';

               try {
                   $conn = new mysqli($ep, $un, $pw, $db);
               } catch (Exception $e) {
                   die("<br><br><h2 style='color:red'>Database Connection Error:</h2> <b>" . $e->getMessage() . "</b><br> Endpoint: $ep<br> Username: $un<br> Check your Parameter Store and Security Groups.");
               }
               
               $_pick = $_POST['selection'] ?? '';

               switch ($_pick) {
                    case "Q1":
                    
                         include 'mobile.php';
                         break;
                         
                    case "Q2":
                         include 'population.php';
                         break;
                         
                    case "Q3":
                         include 'lifeexpectancy.php';
                         break;
                         
                    case "Q4":
                         include 'gdp.php';
                         break;
                         
                    case "Q5":
                         include 'mortality.php';
                         break;
               }
          ?>
          <div id="Copyright" class="center">
               <h5>&copy; 2020, Amazon Web Services, Inc. or its Affiliates. All rights reserved.</h5>
          </div>
     </body>
</html>