<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Update Queue </title>
  </head>
  <body>

<?php
require 'connect.php';

//$sql_select = 'select * from country order by CountryCode';
//$stmt_s = $conn->prepare($sql_select);
//$stmt_s->execute();
//echo "CustomerID = ".$_GET['CustomerID'];

//if (isset($_GET['CustomerID'])) {
    $sql_select_customer = 'SELECT * FROM tbl_queue WHERE qdate=? and qnumber=?';
    $stmt = $conn->prepare($sql_select_customer);
    $params = array($_GET['qdate'],$_GET['qnumber']);
    $stmt->execute($params);
   // echo "get = ".$_GET['CustomerID'];
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
//}
?>

    
<div class="container">
      <div class="row">
        <div class="col-md-4"> <br>
          <h3>ฟอร์มแก้ไขข้อมูลลูกค้า</h3>
          <form action="updatequeue.php" method="POST">

            
                <label for="name" class="col-sm-2 col-form-label"> วันที่จองเข้ารับการรักษา:  </label>
              
                <input type="text" name="qdate" class="form-control" required value="<?= $result['qdate'];?>">           
           
                <label for="name" class="col-sm-2 col-form-label"> หมายเลขคิว :  </label>
             
                <input type="text" name="qnumber" class="form-control" required value="<?= $result['qnumber'];?>">

                <label for="name" class="col-sm-2 col-form-label"> รหัสบัตรประชาชน :  </label>
             
                <input type="text" name="pid" class="form-control" required value="<?= $result['pid'];?>">

                <br>
                 <label for="cars">status:</label>

                <select name="qstatus" id="qstatus">
                <option value="รักษาเสร็จแล้ว">รักษาเสร็จแล้ว</option>
                <option value="รอเข้ารับการรักษา">รอเข้ารับการรักษา</option>
                </select> 
          <br>
            <br> <button type="submit" class="btn btn-primary" name="submit">แก้ไขข้อมูล</button>
          </form>
        </div>
      </div>
    </div>

  </body>
</html>