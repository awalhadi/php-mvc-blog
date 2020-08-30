
        
        


<?php foreach ($user as $admin) {
    if(Session::get('user_id') == $admin['id']){
    ?>

    <h3 class="text-center">Welcome Mr. <strong> <?php echo $admin['name']; ?> </strong> to admin panel....</h3>
    
<?php } }?>
    