<?php 

include('partials/header.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 
$query="select * from posts";
$result=mysqli_query($db,$query);
?>


<!--====================== image slider=======================================-->
<div class="container-fluid">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://i.ibb.co/T2KNRdc/5294432524-8548a775c0-o-1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://i.ibb.co/F04TyPW/45749610404-455dc773c7-o-1.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://i.ibb.co/1T95DMN/4986684901-a28c48b44c-o-1.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div> 
<br>
<!--=========================cards=================================================-->
<div class="container-fluid padding">
	<div class="row padding">
	  <?php 
	  while ($rows=mysqli_fetch_assoc($result)) { 
	  	$img = $rows['image'];
	  	$nm = $rows['heading'];
	  	$content =$rows['content'];
	  	?>
		<div class="col-md-3">
			    <div class="card">
    				<a href="show.php?img=<?php echo urlencode($img);?>&nm=<?php echo urlencode($nm); ?>&content=<?php echo urlencode($content); ?>&username=<?php echo urlencode($_SESSION['username']); ?>">
              <img class="card-img-top" src="<?php echo $img; ?>"></a>
    				<a href="show.php?img=<?php echo $img ?>&nm=<?php echo $nm ?>&content=<?php echo $content ?>&username=<?php echo urlencode($_SESSION['username']); ?>">
  					<div class="card-body">
  						<h3 class="card-title"><?php echo $nm; ?></h3>
              
              <div style="color: black;text-decoration: none;"><?php 
                      $count=0;
                      $array_of_words = explode(" ", $content);
                      while($count<8)
                      {
                        
                        echo($array_of_words[$count]." ");
                        $count++;
                      }?>
                     <?php echo("..."); ?>
                      </div>
  					</div>
				    </a><br>
				    <div class="card-footer" >
                        <span class="float-right">Created 0 mins ago</span>
                        <span><i class=""></i>0 comments</span>
            		</div>
				</div>
    </div>
	<?php  } ?>	
		
	</div>
</div><br>

<!-- =============================create post=========================-->

<div class="container">
  <h2>Add a post</h2><br>
  <!-- display errors here-->
    <?php include('errors.php'); ?><br>
  <form method="post" action="index.php">
      <label>Heading:</label>
      <input type="text" class="form-control form-control-lg" name="heading">
      <label>Post:</label>
      <textarea class="form-control" rows="5"  name="content"></textarea>
      <label>Image:</label><br>
      <input type="text"  name="image" placeholder="Place the image link here" class="form-control form-control-lg" ><br>
     <div class="input-group">
           <button type="submit" name="indexes" class="btn btn-success">Post</button>
          </div>
  </form>
</div>
<?php include('partials/footer.php'); ?>