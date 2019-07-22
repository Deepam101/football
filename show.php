

<div style="display: none;" ><?php include('partials/header.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$img = $_GET['img']; 
$username=$_GET['username'];
$content = $_GET['content'];
$nm = $_GET['nm'];
$query1="SELECT * FROM comment WHERE post='$nm'";
$result=mysqli_query($db,$query1);

?></div>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>



<script>
function getVote(int) {
  if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("poll").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","poll_vote.php?vote="+int,true);
  xmlhttp.send();
}
</script>


<div class="container col">
  <img class="img-responsive" src="<?php echo $img ?>" alt="image" width="100%">
  <br>
  <div style="text-align:center;"><h1><b><?php echo $nm ?></b> </h1></div>
  <br>
  <div style="font-size: 2em;"><?php echo $content ?></div>
</div>



<div class="container" style="font-size: 1.4em;">
  <div class="page-header">
            <h3 class="reviews">Comments</h3>
        </div>

  <?php 
    while ($rows=mysqli_fetch_assoc($result)) { 
      $author = $rows['author'];
      $text=$rows['text'];
      $upvote=$rows['upvote'];
      $downvote=$rows['downvote'];
      $image=$rows['image']; ?>
      <div class="row">
    <div class="col-sm-10 col-sm-offset-1" id="logout">
                <div  class="tab-content">           
            <div class="tab-pane active" id="comments-logout">
                <div>                
                    <ul class="media-list">
                      <li class="media">
                        <a class="pull-left" href="#">
                          <img class="media-object img-circle" src="<?php echo $image; ?>" alt="profile" width="100px;">
                        </a>
                        <div class="media-body">
                          <div class="well well-lg">
                              <h4 class="media-heading text-uppercase reviews"><b><?php echo $author;?></b></h4>
                              <div class="media-date text-uppercase reviews list-inline" style="font-size: .7em; float: right;">
                                22 . 09 . 2019
                              </div>
                              <p class="media-comment">
                                <?php echo $text;?>
                              </p>
                             
                             
                             
                              <?php if($username==$author){ ?>
                            <form method="post" action="show.php">

                              <input type="hidden" name="username" value="<?php echo "$author" ?>">
                              <input type="hidden" name="text" value="<?php echo "$text" ?>">
                             <button type="submit" name="del" style="float: right;top: -20px;position: relative;padding: 0;
                                                                                                                  border: none;
                                                                                                                  background: none;">
                              <i class="fas fa-trash-alt" style="color: red;float: right;"></i></a>
                            </button>
                            </form>
                            <?php } ?>
                          </div>              
                        </div>
                      </li>
                    </ul>      
              </div>
            </div>
          </div>
           
        </div>
      </div><?php } ?>
       <div style="font-size: 1.4em;">Add Your Opinion</div><br>
      <form method="post" action="index.php">
        <textarea class="form-control" rows="3"  name="comment"></textarea><br> 
        <input type="hidden" name="post"  value="<?php echo "$nm";?>">
        <input type="hidden" name="username"  value="<?php echo "$username";?>">
        <button type="submit" name="show" class="btn btn-success">Post</button>
      </form>
    </div>
<?php include('partials/footer.php'); ?>                     
        