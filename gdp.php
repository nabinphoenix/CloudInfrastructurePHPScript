 <a href="query.php">Pick another query</a>
 
 <?php
        if (!isset($conn)) {
             include 'get-parameters.php';
             try {
                 $conn = new mysqli($ep, $un, $pw, $db);
             } catch (Exception $e) {
                 die("<b style='color:red;'>Connection Error:</b> " . $e->getMessage());
             }
        }

        //Query to get the GDP
        $sql = "select name, GDP as gdp from countrydata_final;";
       
        $result = $conn->query($sql);
        
        if ($result && $result->num_rows > 0) {
            
            echo '<table style="width: 80%">';
            echo '<tr>';
            echo '<th style="text-align:left">This is a Country Name</th>';
            echo '<th style="text-align:left">Gross Domestic Product</th>';
            echo '</tr>';
            
            while($row = $result->fetch_assoc()) {
          
            echo '<tr>';
            echo '<td>';
            echo $row["name"];
            echo '</td>';
            echo '<td>';
            echo $row["gdp"];
            echo '</td>';
            echo '</tr>';
            }
            echo '</table>';
        }
                                        
    ?>