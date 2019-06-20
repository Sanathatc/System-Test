<?php //include 'header.php';
      include'config.php';
      $sql_gallery    = "select * from gallery_image where type='1'";
      $row_gallery 	= $conn->query($sql_gallery);
        if(isset($_FILES['upload_banner']['name'])){
       
            if(isset($_POST['update'])){
                
                foreach($_POST['update_id'] as $key => $updateId){
                $update_id = $updateId;
                $sql_check    = "select * from gallery_image where id='$update_id'";
                $row_check 	= $conn->query($sql_check);
                $lastRec 	= mysqli_fetch_array($row_check);
                $lastRec_img = $lastRec['image_name'];
                
                $imgname1 = $_FILES['upload_banner']['name'][$key];
                    if($imgname1 !=""){
                        $sql_update    = "update gallery_image set image_name='".$imgname1."',type='1' where id='".$update_id."'";
                        $row_update 	= $conn->query($sql_update);
                        move_uploaded_file($_FILES['upload_banner']['tmp_name'][$key],"images/" . $imgname1); 
                    }
                }
                echo "<script>window.location='settings.php'; </script>"; 
     
            }
             
        }
        if(isset($_FILES['upload_img']['name'])){
                $imgname1 = $_FILES['upload_img']['name'];
                $sql_update    = "insert into gallery_image (image_name,type) values('".$imgname1."',1)";
                $row_update 	= $conn->query($sql_update);
                move_uploaded_file($_FILES['upload_img']['tmp_name'],"images/" . $imgname1); 
              echo "<script>window.location='settings.php'; </script>";    
            }
        
// //Home Page Images
        $sql_home_page    = "select * from gallery_image where type=2";
        $home_page_conn   = $conn->query($sql_home_page);
        if(isset($_POST['home_update']))
        {
             foreach($_POST['update_id_home'] as $key => $updateId){
                $update_id = $updateId;
                $sql_check    = "select * from gallery_image where id='$update_id'";
                $row_check 	= $conn->query($sql_check);
                $lastRec 	= mysqli_fetch_array($row_check);
                $lastRec_img = $lastRec['image_name'];
                
                $imgname1 = $_FILES['upload_banner_home']['name'][$key];
                    if($imgname1 !=""){
                        $sql_update    = "update gallery_image set image_name='".$imgname1."',type='2' where id='".$update_id."'";
                        $row_update 	= $conn->query($sql_update);
                        move_uploaded_file($_FILES['upload_banner']['tmp_name'][$key],"images/" . $imgname1); 
                    }
                }
                echo "<script>window.location='settings.php'; </script>"; 
        }
         if(isset($_FILES['upload_home_img']['name'])){
                $imgname1 = $_FILES['upload_home_img']['name'];
                $sql_update    = "insert into gallery_image (image_name,type) values('".$imgname1."',2)";
                $row_update 	= $conn->query($sql_update);
                move_uploaded_file($_FILES['upload_img']['tmp_name'],"images/" . $imgname1); 
              echo "<script>window.location='settings.php'; </script>";    
            }
?>

 <?php 
if(isset($_POST['news_events'])){
    $heading1=$_POST['heading1'];
    $heading2=$_POST['heading2'];
    $heading4=$_POST['description'];
    $sql_insert="update news_content set heading2='$heading1',heading3='$heading2',heading4='$heading4' where page='news_events'";
    $sql_insert =$conn->query($sql_insert);
    echo "<script>window.location='settings.php'; </script>";  
}
 $sql_new_event    = "select * from news_content  where page='news_events'";
 $new_event_conn   = $conn->query($sql_new_event);
 $row_events=mysqli_fetch_array($new_event_conn);
 
 if(isset($_POST['home_page_content']))
 {
    $heading1=$_POST['home_page_heading'];
    $heading4=$_POST['home_page_description'];
    $sql_insert="update news_content set heading1='$heading1',heading4='$heading4' where page='home_page_content'";
    $sql_insert =$conn->query($sql_insert);
    echo "<script>window.location='settings.php'; </script>"; 
  
 }
 $sql_home_page    = "select * from news_content  where page='home_page_content'";
 $home_page_co   = $conn->query($sql_home_page);
 $row_home_page=mysqli_fetch_array($home_page_co);
?>
<?php
 $sql_home_page_slide    = "select * from gallery_image where type=3";
 $home_page_conn_slide   = $conn->query($sql_home_page_slide);
 
 if(isset($_POST['home_slide_update']))
 {
     
      foreach($_POST['update_slide_home_id'] as $key => $updateId){
                $update_id = $updateId;
                
                $imgname1 = $_FILES['upload_slide_home']['name'][$key];
                    if($imgname1 !=""){
                        $sql_update    = "update gallery_image set image_name='".$imgname1."',type='3' where id='".$update_id."'";
                        $row_update 	= $conn->query($sql_update);
                        move_uploaded_file($_FILES['upload_slide_home']['tmp_name'][$key],"images/" . $imgname1); 
                    }
                }
              
                echo "<script>window.location='settings.php'; </script>"; 
     
 }
 
 if(isset($_POST['upload_slide_btn'])){
       $imgname1 = $_FILES['upload_slide_save']['name'];
                $sql_update    = "insert into gallery_image (image_name,type) values('".$imgname1."',3)";
                $row_update 	= $conn->query($sql_update);
                move_uploaded_file($_FILES['upload_slide_save']['tmp_name'],"images/" . $imgname1); 
               
              echo "<script>window.location='settings.php'; </script>"; 
 }
    
?>
