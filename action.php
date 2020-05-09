<?php
include('config.php');

if(isset($_POST['courseID'])) {
      $courseID = $_POST['courseID'];
$output   = '';

$sql = "SELECT * FROM sub_course WHERE c_id ='$courseID' ORDER BY sub_course_name";
$result = mysqli_query($conn, $sql);


if($result->num_rows > 0) {
    $output   .='<option value="" disabled selected>Select Course   </option>';
while($row =mysqli_fetch_array($result)){
    $output  .= '<option value="'.$row["id"] .'" > '. $row["sub_course_name"]. '</option>';
}

}else {
    echo '<option value=""> Sub Course(s) not available </option>';
}


echo $output;


}

?>