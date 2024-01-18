<?php include('link.php');

// data for message 
if(isset($_POST['message'])){
    $results = mysqli_query($con,"SELECT * from monal_reserve ");
    $result_arrays=[];
 foreach($results as $rows) 
 {
        array_push($result_arrays,$rows);
 }
 
header('Content-type:application/json');
echo json_encode($result_arrays);
exit();
}
?>