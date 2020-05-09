<!--
=== source == https://www.youtube.com/watch?v=dsgXzQVGJUE
=== Name == Dependent Drop Down List Using Bootstrap 4, PHP and AJAX BY DCodeMania

-->
<?php

require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Dependent Drop Down List Using PHP and AJAX</title>
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>


<body class="bg-info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 bg-light mt-5 p-4 rounded shadow border border-danger">
                <h5 class="text-center text-info pb-3"> Dynamic Dependent Drop Down List Using PHP and AJAX</h5>
                <form action="" method="POST">

                    <div class="form-group"> 
                        <select name="course" id="course" class="form-control form-control-lg">
                            <option value="" disabled selected>-select Course-</option> 
                            <?php
                             
                             $sql = "SELECT * FROM course ORDER BY c_name";
                             $result = mysqli_query($conn, $sql);
                             while($row = mysqli_fetch_array($result)){  ?>
                             <option value="<?php echo $row['id']; ?>" > <?php echo $row['c_name']; ?> </option> 
                             <?php } ?>
                           
                        </select>
                    </div>

                    <div class="form-group"> 
                        <select name="language" id="language" class="form-control form-control-lg">
                            <option value="" disabled selected>-select Course First-</option>                       
                        </select>
                    </div>

                    <div class="form-group"> 
                         <input type="submit" name="submit" value="SUBMIT" class="btn btn-danger btn-block">
                    </div>

                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

<script>
$(document).ready(function(){
   // alert('hello ok');
   $('#course').on('change', function(){
       var course_id  = $(this).val();

       $.ajax({
           url: 'action.php',
           method: 'POST',
           data: {courseID: course_id},
           success: function(data){
               $('#language').html(data);
           }
       });
   });
});


</script>