<?php 


?>


<div class="container">
<?php 
      new vendor\widgets\menu\Menu();
    ?>
<button class="btn btn-info" onClick="send()" id="send">Send</button>
    <div class="panel panel-default">
    <?php 
    foreach($posts as $post){
    ?>
        <div class="panel-heading">
            <?php  echo $post['title'];?>
        </div>
        <div class="panel-body">
            <?php  echo $post['excerpt'];?>
        </div>
         <hr>   
    
       
    <?php }
    ?>

    </div>

</div>
<script src="/js/test.js"></script>
