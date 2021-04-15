<?php

function fetch_data()  
 {  
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "root", "information_schema");  
      $sql = "SELECT * FROM TABLES WHERE TABLE_SCHEMA = '". $_GET["id_schema"] ."'";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= "";  
      }  
      return $output;  
 }  
 if(isset($_POST["generate_pdf"]))  
 {  
      require_once('library/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  

      
      
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('report2.pdf', 'I');  
 }  
 

include __DIR__ . "/database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>prova</title>
</head>
<body>

<div class="container">  
                <h4 align="center"> Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP</h4><br />  
                <div class="table-responsive">  
                    <div class="col-md-12" align="right">
                     <form method="post">  
                          <input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" action="index.php?id_schema=' . $_GET["id_schema"] . '" />  
                     </form>  
                     </div>
                     <br/>
                     <br/>
                     <table class="table table-bordered">  
                          <tr>  
                               <!-- <th width="5%">
                               
                               <?php foreach ($studente as $key => $value) { 

                                   echo  "<td>" . $value . "</td>";

                              } ?>

                               </th>     -->
                          </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>  
                </div>  
           </div>

 <table class="table">
    <thead>

<?php foreach ($database as $studente) { ?>
      <tr>
        <?php foreach ($studente as $key => $value) { ?>

          <th> <?php echo $key ?> </th>

    <?php } ?>
      </tr>

    <?php 
    break;
    } ?>

        <!-- <tr>

        <?php foreach ($database as $key) { 

          var_dump($key);

          foreach ($key2 as $value) {

  

            if($key2 == "TABLE_NAME"){
              
              echo "<th>" . "<a href=\"index.php?id.schema=".$_GET["id_schema"]."&id.table=".$value."\">   </a>" . "</th>";

            }
               
          }
          
       } ?>

        </tr> -->
    </thead>
       
   
    <tbody>
    
    <?php foreach ($database as $studente) { ?>
      <tr>
        <?php foreach ($studente as $key => $value) { 

          if($key == "TABLE_NAME"){
              
              echo "<td>" . "<a href=\"indexdettaglio.php?id_schema=".$_GET["id_schema"]."&id_table=".$value."\">  $value </a>" . "</td>";

            }else{
            echo  "<td>" . $value . "</td>";
            }

        } ?>
      </tr>
    <?php } ?>
    </tbody>

 </table>
  
</body>
</html>

// STAMPA IN PDF E IMPLEMENTA BOOTSTRAP