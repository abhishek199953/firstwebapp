<?php include('header.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<style>
.container{
	margin-top:50px; 
	background-color:#FAFAE7 ;
	border-radius: 2.5%;
	
}
p.b {
    font-family:Georgia;
}
body {
  background-image: url('https://www.gstatic.com/webp/gallery/1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  /* filter: blur(10px); */
}
img {
  border-radius: 50%;

}




.flip-card {
  background-color: transparent;
  width: 300px;
  height: 300px;
  perspective: 1000px;
  margin: 0 auto;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
  color: black;
}

.flip-card-back {
  background-color: #2980b9;
  color: white;
  transform: rotateY(180deg);
}


</style>


<script>
$(document).ready(function(){
 $("#div1").fadeIn(4000);
 });

</script>
<body >


<div class="container" >

<h1 class="text-center"><?=  ($articles->article_title); ?> </h1><br>


<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="<?php echo $articles->image_path ?>" alt="Avatar" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
		<br><br>
      <h4>This article is about <?=  ($articles->article_title); ?></h4> 
	  <h5>You can get detail knoweledge about this article.</h5>
   
    </div>
  </div>
</div>


<br>
<br>


<p class="b" id="div1" style="display: none;"><?= ($articles->article_body);   ?> </p>




</div>

</body>
<?php include('footer.php'); ?>