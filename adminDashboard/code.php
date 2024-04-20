<?php
session_start();
    $host = "localhost";
    $user = "root";
    $pass = "";
    $data = "chat";
    $connection = mysqli_connect($host,$user,$pass,$data) OR die("error");


if(isset($_POST['save_btn'])){
    $post_owner = 'post_owner';
    $post_visibility = 1;
	

    $post_date = date("Y-m-d H:i:s");
    // $post_date = date("F d \a\\t Y h:i A",strtotime($post_date));

	$post_edit_date ='null';
    $text_content =$_POST['text_content'];
    $picture_media ='picture_media';
    $video_media ='video_media';
    $post_place  =1;
    $is_shared =0;
    $post_shared_id =0;
   $insert_inquery = "INSERT INTO post 
        (post_owner, post_visibility, post_place, post_date, text_content, picture_media, video_media, is_shared, post_shared_id) 
VALUES ($post_owner, $post_visibility, $post_place, '$post_date', '$text_content','$picture_media', '$video_media',$is_shared , 0)";
        $run = mysqli_query($connection,$insert_inquery);
        if($run){
            $_SESSION['status'] = "insert data successfully";
            header('location: list_users.php');
            // echo $_SESSION['status'];
        }else{

            $_SESSION['status'] = "insert data error";
            header('location: insert.php');
        }
}

if(isset($_POST['delete_btn'])){
$id = $_POST['user_id'];
$delete_query = "DELETE FROM user_info WHERE id=$id";
$delete_run = mysqli_query($connection,$delete_query);
if($delete_run){
    $_SESSION['status'] = "delete data successfully";
    header('location: list_users.php');
}else{
    $_SESSION['status'] = "delete data is failed";
    header('location: list_users.php');
}
}
?>