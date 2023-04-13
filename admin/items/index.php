<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<style>
	.item-img{
		width:3em;
		height:3em;
		object-fit:cover;
		object-position:center center;
	}
</style>
<div class="card card-outline rounded-0 card-blue">
	<div class="card-header">
		<h3 class="card-title">List of Items</h3>
		<div class="card-tools">
		<button onclick="window.print()" id="print" class="btn btn-success btn-flat bg-gradient-success btn-sm" type="button"><i class="fa fa-print"></i> Print</button>
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div>
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-hover table-striped table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="5%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="5%">
					<col width="5%">
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						<th>Date Created</th>
						<th>Item Name</th>
						<th>Unit</th>
						<th>Batch Number</th>
						<th>Description</th>
						<th>Price</th>
						<th>Manufacturer</th>
						<th>Distributor</th>
						<th>Packaging</th>
						<th>Available</th>
						<th>Manufactured Date</th>
						<th>Expiration Date</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT i.*, c.name as `category`,
						m.name as 'manuf', d.name as 'dist', p.name as 'pack', ( COALESCE((SELECT SUM(quantity) FROM `stockin_list`
						where item_id = i.id),0) - COALESCE((SELECT SUM(quantity) FROM `stockout_list` where item_id = i.id),0)
						- COALESCE((SELECT SUM(quantity) FROM `waste_list` where item_id = i.id),0) ) as `available` from `item_list` i 
						inner join category_list c on i.category_id = c.id
						inner join manufacturer_list m on i.manufacturer_id = m.id
						inner join distributor_list d on i.distributor_id = d.id
						inner join packaging_list p on i.packaging_id = p.id
						where i.delete_flag = 0 order by i.`id` asc ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
							<td class="">
								<div style="line-height:1em">
									<div><?= $row['name'] ?> [<?= $row['unit'] ?>]</div>
									<div><small class="text-muted"><?= $row['category'] ?></small></div>
								</div>
							</td>
							<td class="text-center"><?= $row['unit'] ?></td>
							<td class="text-center"><?= $row['batch_id'] ?></td>
							<td class=""><p class="mb-0 truncate-1"><?= strip_tags(htmlspecialchars_decode($row['description'])) ?></p></td>
							<td class="text-center"><?= $row['price'] ?></td>
							<td class="text-center"><?= $row['manuf'] ?></td>
							<td class="text-center"><?= $row['dist'] ?></td>
							<td class="text-center"><?= $row['pack'] ?></td>
							<td class="text-center"><?= $row['available'] ?></td>
							<td class="text-center"><?= $row['manufactured_date'] ?></td>
							<td class="text-center"><?= $row['expiration_date'] ?></td>
							<td class="text-center">
                                <?php if($row['status'] == 1): ?>
                                    <span class="badge badge-success px-3 rounded-pill">Active</span>
                                <?php else: ?>
                                    <span class="badge badge-danger px-3 rounded-pill">Inactive</span>
                                <?php endif; ?>
                            </td>
							<td align="center">
								 <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item view-data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-eye text-dark"></span> View</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item edit-data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item btn btn-flat btn-sm btn-light bg-gradient-light border" href="./?page=stocks/view_stock&id=<?php echo $row['id'] ?>"><span class="fas fa-bars text-dark"></span> Stock Manager</a>
				                  </div>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this Item permanently?","delete_item",[$(this).attr('data-id')])
		})
		$('#create_new').click(function(){
			uni_modal("<i class='far fa-plus-square'></i> Add New Item ","items/manage_item.php")
		})
		$('.edit-data').click(function(){
			uni_modal("<i class='fa fa-edit'></i> Add New Item ","items/manage_item.php?id="+$(this).attr('data-id'))
		})
		$('.view-data').click(function(){
			uni_modal("<i class='fa fa-th-list'></i> Item Details ","items/view_item.php?id="+$(this).attr('data-id'))
		})
		$('.table').dataTable({
			columnDefs: [
					{ orderable: false, targets: [5] }
			],
			order:[0,'asc']
		});
		$('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
	})
	function delete_item($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_item",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>