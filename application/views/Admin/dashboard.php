<?php include('header.php'); ?>

<script>
$(function(){
   $("#cont").fadeToggle(5000);
});
</script>

<div class="container" style="margin-top:50px;">
<div class="row">
<?=   anchor('admin/adduser','Add Articles',['class'=>'btn btn-lg btn-primary'])  ?>
</div>



<div class="container" style="margin-top:50px;">
<div id="cont">
<?php  if($msg=$this->session->flashdata('msg')): 

$msg_class=$this->session->flashdata('msg_class')

?>
<div class="row">
<div class="col-lg-6">
<div class="alert <?= $msg_class ?>">
<?= $msg; ?>
</div>
</div>
</div>
<?php // $this->session->sess_destroy();  // and this line is tells us that it destroy all the session ?>
<?php $this->session->unset_userdata('msg');    // this is used for perticular flashdata unset ?>  
<?php //$this->session->unset_flashdata(); // and this code is destroyed all the flashdata means unset all the flashdata ?>
<?php endif; ?>
</div>
</div>



<div class="container">
<div class="table"  >

<table style="background-color : #e6ffe6;" id="postsList">
<thead>
<tr>
<th>S.no</th>
<th>Article  Title</th>
<th>Article Body</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>
<tbody>
<?php if(count($articles)):  
	$count=$this->uri->segment(3);  // this line is used for page serial number in pagination it detects the pagination numver according to them we can get the page number in our page  
	?> 

<?php foreach ($articles as $art): ?>
<tr>
	  
		<td><?= ++$count ;?></td>
		<td><?= $art->article_title; ?></td>
		<td><?=  $art->article_body; ?></td>
	<!-- <td><a href="#" class="btn btn-primary">Edit</td> -->
		<td><?=  anchor("admin/edituser/{$art->id}",'Edit',['class'=>'btn btn-default']);  ?></td>
		<td>
        <?=
        form_open('admin/delarticles'),
        form_hidden('id',$art->id),
        form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
        form_close();
		 ?>
      </td>	
	</tr>
	<?php endforeach; ?>
<?php else: ?>
	<tr>
	<td colspan="3">Not data available</td>
	</tr>
   <?php endif; ?>
</tbody>
</table>

<div id="pagination">
<?php  echo $this->pagination->create_links();   ?> 
</div>

</div>

</div>

<!-- 
<script>
function showUser(str) {
	// console.log('hello');
  if (str=="") {
    document.getElementById("tab").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("tab").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
}
</script> -->

<!-- 
<script type='text/javascript'>
   $(document).ready(function(){
 
     $('#pagination').on('click','a',function(e){
       e.preventDefault(); 
       var pageno = $(this).attr('data-ci-pagination-page');
       loadPagination(pageno);
     });
 
     loadPagination(0);
 
     function loadPagination(pagno){
       $.ajax({
         url: '/admin/welcome/'+pagno,
         type: 'post',
         dataType: 'json',
         success: function(response){
            $('#pagination').html(response.pagination);
            createTable(response.result,response.row);
         }
       });
     }

     
     function createTable(result,sno){
       sno = Number(sno);
       $('#postsList tbody').empty();
       for(index in result){
          var id = result[index].id;
          var title = result[index].title;
          var content = result[index].slug;
          content = content.substr(0, 60) + " ...";
          var link = result[index].slug;
          sno+=1;
 
          var tr = "<tr>";
          tr += "<td>"+ sno +"</td>";
          tr += "<td><a href='"+ link +"' target='_blank' >"+ title +"</a></td>";
          tr += "</tr>";
          $('#postsList tbody').append(tr);
  
        }
      }
 
       
    });
    </script> -->


<?php include('footer.php'); ?>