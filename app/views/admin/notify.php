<?php if(isset($notify)) {?>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/include/css/iziToast.min.css">
<script src="<?php echo BASE_URL; ?>/include/js/iziToast.min.js"></script>
    <script>
        iziToast.<?php echo $notify[0]; ?>({
            position: "topRight",
            message: "<?php echo $notify[1]; ?>",
        });
    </script>
<?php } ?>


<!-- start with urlencode Notification message -->
<?php
if (!empty($_GET['msg'])) {
  $notify = unserialize(urldecode($_GET['msg']));
?>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/include/css/iziToast.min.css">
<script src="<?php echo BASE_URL; ?>/include/js/iziToast.min.js"></script>
<script>
  iziToast.<?php echo $notify[0]; ?>({
      position: "topRight",
      message: "<?php echo $notify[1]; ?>",
  });

</script>
<?php }?>
<!-- end Notification message -->