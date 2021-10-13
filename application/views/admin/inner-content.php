<?php include ('sidebar.php') ?>
<div class="page-body">
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
        	<?php $this->load->view($content);?>
        </div>
    </div>
</div>
</div><!-- end page body -->
<?php include ('footer.php') ?>