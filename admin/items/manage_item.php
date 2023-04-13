<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `item_list` where id = '{$_GET['id']}' and `delete_flag` = 0 ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="container-fluid">
	<form action="" id="item-form">
		<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div class="form-group">
			<label for="category_id" class="control-label">Category</label>
			<select name="category_id" id="category_id" class="form-control form-control-sm rounded-0" required="required">
				<option value="" <?= isset($category_id) ? 'selected' : '' ?>></option>
				<?php 
				$items = $conn->query("SELECT * FROM `category_list` where delete_flag = 0 and `status` = 1 ");
				while($row= $items->fetch_assoc()):
				?>
				<option value="<?= $row['id'] ?>" <?= isset($category_id) && $category_id == $row['id'] ? 'selected' : '' ?>><?= $row['name'] ?></option>
				<?php endwhile; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="product_id" class="control-label">Product</label>
			<select name="product_id" id="product_id" class="form-control form-control-sm rounded-0" required="required">
				<option value="" <?= isset($category_id) ? 'selected' : '' ?>></option>
				<?php 
				$items = $conn->query("SELECT * FROM `product_list` where delete_flag = 0 and `status` = 1 ");
				while($row= $items->fetch_assoc()):
				?>
				<option value="<?= $row['id'] ?>" <?= isset($product_id) && $product_id == $row['id'] ? 'selected' : '' ?>><?= $row['name'] ?></option>
				<?php endwhile; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="manufacturer_id" class="control-label">Manufacturer</label>
			<select name="manufacturer_id" id="manufacturer_id" class="form-control form-control-sm rounded-0" required="required">
				<option value="" <?= isset($category_id) ? 'selected' : '' ?>></option>
				<?php 
				$items = $conn->query("SELECT * FROM `manufacturer_list` where delete_flag = 0 and `status` = 1 ");
				while($row= $items->fetch_assoc()):
				?>
				<option value="<?= $row['id'] ?>" <?= isset($category_id) && $category_id == $row['id'] ? 'selected' : '' ?>><?= $row['name'] ?></option>
				<?php endwhile; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="distributor_id" class="control-label">Distributor</label>
			<select name="distributor_id" id="distributor_id" class="form-control form-control-sm rounded-0" required="required">
				<option value="" <?= isset($distributor_id) ? 'selected' : '' ?>></option>
				<?php 
				$items = $conn->query("SELECT * FROM `distributor_list` where delete_flag = 0 and `status` = 1 ");
				while($row= $items->fetch_assoc()):
				?>
				<option value="<?= $row['id'] ?>" <?= isset($distributor_id) && $distributor_id == $row['id'] ? 'selected' : '' ?>><?= $row['name'] ?></option>
				<?php endwhile; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="packaging_id" class="control-label">Packaging</label>
			<select name="packaging_id" id="packaging_id" class="form-control form-control-sm rounded-0" required="required">
				<option value="" <?= isset($distributor_id) ? 'selected' : '' ?>></option>
				<?php 
				$items = $conn->query("SELECT * FROM `packaging_list` where delete_flag = 0 and `status` = 1 ");
				while($row= $items->fetch_assoc()):
				?>
				<option value="<?= $row['id'] ?>" <?= isset($packaging_id) && $packaging_id == $row['id'] ? 'selected' : '' ?>><?= $row['name'] ?></option>
				<?php endwhile; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="name" class="control-label">Name</label>
			<input type="text" name="name" id="name" class="form-control form-control-sm rounded-0" value="<?php echo isset($name) ? $name : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="unit" class="control-label">Unit</label>
			<input type="text" name="unit" id="unit" class="form-control form-control-sm rounded-0" value="<?php echo isset($unit) ? $unit : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="unit" class="control-label">Batch No.</label>
			<input type="text" name="batch_id" id="batch_id" class="form-control form-control-sm rounded-0" value="<?php echo isset($batch_id) ? $batch_id : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="unit" class="control-label">Price</label>
			<input type="text" name="price" id="price" class="form-control form-control-sm rounded-0" value="<?php echo isset($price) ? $price : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="description" class="control-label">Description</label>
			<textarea rows="3" name="description" id="description" class="form-control form-control-sm rounded-0" required><?php echo isset($description) ? $description : ''; ?></textarea>
		</div>
		<div class="form-group">
            <label for="date" class="control-label">Manufactured Date</label>
            <input type="date" name="manufactured_date" id="manufactured_date" class="form-control form-control-sm rounded-0" value="<?= isset($manufactured_date) ? $manufactured_date : '' ?><?= date("Y-m-d") ?>" required>
        </div>
		<div class="form-group">
            <label for="date" class="control-label">Expiration Date</label>
            <input type="date" name="expiration_date" id="expiration_date" class="form-control form-control-sm rounded-0" value="<?= isset($expiration_date) ? $expiration_date : '' ?><?= date("Y-m-d") ?>" required>
        </div>
		<div class="form-group">
			<label for="status" class="control-label">Status</label>
			<select name="status" id="status" class="form-control form-control-sm rounded-0" required="required">
				<option value="1" <?= isset($status) && $status == 1 ? 'selected' : '' ?>>Active</option>
				<option value="0" <?= isset($status) && $status == 0 ? 'selected' : '' ?>>Inactive</option>
			</select>
		</div>
	</form>
</div>
<script>
	$(document).ready(function(){
		$('#uni_modal').on('shown.bs.modal', function(){
			$('#category_id').select2({
				placeholder:"Select Category Here",
				width:'100%',
				containerCssClass:'form-control form-control-sm rounded-0',
				dropdownParent:$('#uni_modal')
			})
		})
		$('#item-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_item",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						// location.reload()
						alert_toast(resp.msg, 'success')
						uni_modal("<i class='fa fa-th-list'></i> item Details ","items/view_item.php?id="+resp.iid)
						$('#uni_modal').on('hide.bs.modal', function(){
							location.reload()
						})
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body").scrollTop(0);
                            end_loader()
                    }else{
						alert_toast("An error occured",'error');
						end_loader();
                        console.log(resp)
					}
				}
			})
		})

	})
</script>