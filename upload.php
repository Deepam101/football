<?php
include('server.php'); 
if(isset($_POST['upload']))
{
    //storing all necessary data into the respective variables.
$file = $_FILES['file'];
$file_name = $file['name'];
$file_type = $file ['type'];
$file_size = $file ['size'];
$file_path = $file ['tmp_name'];

//Restriction to the image. You can upload any types of file for example video file, mp3 file, .doc or .pdf just mention here in OR condition. 

if($file_name!="" && ($file_type="image/jpeg"||$file_type="image/png"||$file_type="image/gif")&& $file_size<=614400)

if(move_uploaded_file ($file_path,'images/'.$file_name))//"images" is just a folder name here we will load the file.
$query=mysqli_query("insert into posts(image)values('$file_name')");//mysql command to insert file name with extension into the table. Use TEXT datatype for a particular column in table.
 
if($query==true)
{
    echo "File Uploaded";
}
}

//To retrieve uploaded file immediately or write code in separate .php file if you wanna later or by clicking.
$result=  mysql_query("SELECT image FROM posts");
$row=  mysql_fetch_array($result);
echo "<img src='images/".$row['image']."' height = '130px' width = '130px'>";
?>
