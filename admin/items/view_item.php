<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    // $qry = $conn->query("SELECT i.*, c.name as `category` from `item_list` i inner join category_list c on i.category_id = c.id where i.id = '{$_GET['id']}' and i.delete_flag = 0 ");

	$qry = $conn->query("SELECT i.*, c.name as `category`,
						m.name as 'manuf', d.name as 'dist', p.name as 'pack'from `item_list` i 
						inner join category_list c on i.category_id = c.id
						inner join manufacturer_list m on i.manufacturer_id = m.id
						inner join distributor_list d on i.distributor_id = d.id
						inner join packaging_list p on i.packaging_id = p.id
						where i.delete_flag = 0 order by i.`id` asc ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }else{
		echo '<script>alert("item ID is not valid."); location.replace("./?page=items")</script>';
	}
}else{
	echo '<script>alert("item ID is Required."); location.replace("./?page=items")</script>';
}
?>
<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>
<div class="container-fluid">
	<dl>
		<dt class="text-muted">Category</dt>
		<dd class="pl-4"><?= isset($category) ? $category : "" ?></dd>
		<dt class="text-muted">Manufacturer</dt>
		<dd class="pl-4"><?= isset($manuf) ? $manuf : "" ?></dd>
		<dt class="text-muted">Distributor</dt>
		<dd class="pl-4"><?= isset($dist) ? $dist : "" ?></dd>
		<dt class="text-muted">Name</dt>
		<dd class="pl-4"><?= isset($name) ? $name : "" ?></dd>
		<dt class="text-muted">Batch No.</dt>
		<dd class="pl-4"><?= isset($batch_id) ? $batch_id : "" ?></dd>
		<dt class="text-muted">Unit</dt>
		<dd class="pl-4"><?= isset($unit) ? $unit : "" ?></dd>
		<dt class="text-muted">Description</dt>
		<dd class="pl-4"><?= isset($description) ? str_replace(["\n\r", "\n", "\r"],"<br>", htmlspecialchars_decode($description)) : '' ?></dd>
		<dt class="text-muted">Manufactured Date</dt>
		<dd class="pl-4"><?= isset($manufactured_date) ? $manufactured_date : "" ?></dd>
		<dt class="text-muted">Expiration Date</dt>
		<dd class="pl-4"><?= isset($expiration_date) ? $expiration_date : "" ?></dd>
		<dt class="text-muted">Status</dt>
		<dd class="pl-4">
			<?php if($status == 1): ?>
				<span class="badge badge-success px-3 rounded-pill">Active</span>
			<?php else: ?>
				<span class="badge badge-danger px-3 rounded-pill">Inactive</span>
			<?php endif; ?>
		</dd>
	</dl>
</div>
<hr class="mx-n3">
<div class="text-right pt-1">
	<button class="btn btn-sm btn-flat btn-light bg-gradient-light border" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>