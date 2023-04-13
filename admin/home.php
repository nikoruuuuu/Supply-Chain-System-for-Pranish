<style>
  #system-cover{
    width:100%;
    height:45em;
    object-fit:cover;
    object-position:center center;
  }
</style>
<!-- <h1 class="">Dashboard, <?php echo $_settings->userdata('firstname')." ".$_settings->userdata('lastname') ?>!</h1> -->
<hr>
<h1>Dashboard</h1>
<div class="row">
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-blue elevation-1"><i class="fas fa-th-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Categories</span>
        <span class="info-box-number text-right h5">
          <?php 
            $category = $conn->query("SELECT * FROM category_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($category);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-blue elevation-1"><i class="fas fa-th-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Product</span>
        <span class="info-box-number text-right h5">
          <?php 
            $category = $conn->query("SELECT * FROM product_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($category);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-blue elevation-1"><i class="fas fa-th-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Packaging</span>
        <span class="info-box-number text-right h5">
          <?php 
            $category = $conn->query("SELECT * FROM packaging_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($category);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-blue elevation-1"><i class="fas fa-th-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Distributor</span>
        <span class="info-box-number text-right h5">
          <?php 
            $category = $conn->query("SELECT * FROM distributor_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($category);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-blue elevation-1"><i class="fas fa-th-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Manufacturer</span>
        <span class="info-box-number text-right h5">
          <?php 
            $category = $conn->query("SELECT * FROM manufacturer_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($category);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-blue elevation-1"><i class="fas fa-box"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Items</span>
        <span class="info-box-number text-right h5">
          <?php 
            $items = $conn->query("SELECT id FROM item_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($items);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>

<div class="row">
<div class="col-12 col-sm-4 col-md-4">
<div class="card rounded-0 card-blue">
	<div class="card-header">
		<h3 class="card-title">Recently In Stocks</h3>
		<!-- <div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div> -->
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-hover table-striped table-bordered" id="list">
				<!-- <colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="35%">
					<col width="10%">
					<col width="10%">
				</colgroup> -->
				<thead>
					<tr>
						<th>Date of Stock-In</th>
						<th>Item</th>
						<th>Quantity</th>
						<th>Remarks</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT * from `stockin_list` ORDER BY id DESC LIMIT 3");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class=""><?= $row['date'] ?></td>
							<td class=""><?= $row['item_id'] ?></td>
							<td class=""><?= $row['quantity'] ?></td>
              <td class=""><?= $row['remarks'] ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
            </div>

<div class="col-12 col-sm-4 col-md-4">
<div class="card rounded-0 card-blue">
	<div class="card-header">
		<h3 class="card-title">Recently Out Stocks</h3>
		<!-- <div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div> -->
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-hover table-striped table-bordered" id="list">
				<!-- <colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="35%">
					<col width="10%">
					<col width="10%">
				</colgroup> -->
				<thead>
					<tr>
						<th>Date of Stock-Out</th>
						<th>Item</th>
						<th>Quantity</th>
						<th>Remarks</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
          $qry = $conn->query("SELECT * from `stockout_list` ORDER BY id DESC LIMIT 3");
          while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class=""><?= $row['date'] ?></td>
							<td class=""><?= $row['item_id'] ?></td>
							<td class=""><?= $row['quantity'] ?></td>
              <td class=""><?= $row['remarks'] ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
          </div>

<div class="col-12 col-sm-4 col-md-4">
<div class="card rounded-0 card-blue">
	<div class="card-header">
		<h3 class="card-title">Recently Waste Stocks</h3>
		<!-- <div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div> -->
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-hover table-striped table-bordered" id="list">
				<!-- <colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="35%">
					<col width="10%">
					<col width="10%">
				</colgroup> -->
				<thead>
					<tr>
						<th>Date of Waste Stocks</th>
						<th>Item</th>
						<th>Quantity</th>
						<th>Remarks</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
          $qry = $conn->query("SELECT * from `waste_list` ORDER BY id DESC LIMIT 3");
          while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class=""><?= $row['date'] ?></td>
							<td class=""><?= $row['item_id'] ?></td>
							<td class=""><?= $row['quantity'] ?></td>
              <td class=""><?= $row['remarks'] ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


          </div>
          </div>


          <!-- <div class="col-12 col-sm-4 col-md-4">
<div class="card rounded-0 card-red">
	<div class="card-header">
		<h3 class="card-title">Expired Stocks</h3> -->
		<!-- <div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div> -->
	<!-- </div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-hover table-striped table-bordered" id="list"> -->
				<!-- <colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="35%">
					<col width="10%">
					<col width="10%">
				</colgroup> -->
				<!-- <thead>
					<tr>
						<th>Date Expiration</th>
            <th>Name</th>
            <th>Batch ID</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
          $qry = $conn->query("SELECT * FROM `item_list` WHERE `expiration_date` > UTC_TIMESTAMP() LIMIT 3");
          while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class=""><?= $row['expiration_date'] ?></td>
							<td class=""><?= $row['name'] ?></td>
              <td class=""><?= $row['batch_id'] ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


          </div>
          </div> -->







          <div class="row">
<div class="col-12 col-sm-4 col-md-4">
<div class="card rounded-0 card-blue">
	<div class="card-header">
		<h3 class="card-title">Dead Stock For a Week</h3>
		<!-- <div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div> -->
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-hover table-striped table-bordered" id="list">
				<!-- <colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="35%">
					<col width="10%">
					<col width="10%">
				</colgroup> -->
				<thead>
        <tr>
						<th>Stock-in Date</th>
            <th>Item ID</th>
            <th>Remarks</th>
					</tr>
				</thead>
				<tbody>
        <?php 
					$i = 1;
          $qry = $conn->query("SELECT * FROM `stockin_list` WHERE DATE_ADD(`date`,INTERVAL 1 WEEK) between NOW() and  DATE(NOW() + INTERVAL 1 WEEK) AND 'available' > 0 ORDER BY `date` ASC LIMIT 3");
          while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class=""><?= $row['date'] ?></td>
							<td class=""><?= $row['item_id'] ?></td>
              <td class=""><?= $row['remarks'] ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
            </div>

<div class="col-12 col-sm-4 col-md-4">
<div class="card rounded-0 card-blue">
	<div class="card-header">
		<h3 class="card-title">Dead Stock For a Month</h3>
		<!-- <div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div> -->
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-hover table-striped table-bordered" id="list">
				<!-- <colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="35%">
					<col width="10%">
					<col width="10%">
				</colgroup> -->
				<thead>
        <tr>
						<th>Stock-in Date</th>
            <th>Item ID</th>
            <th>Remarks</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$i = 1;
          $qry = $conn->query("SELECT * FROM `stockin_list` WHERE DATE_ADD(`date`,INTERVAL 1 MONTH) between NOW() and  DATE(NOW() + INTERVAL 1 MONTH) AND 'available' > 0 ORDER BY `date` ASC LIMIT 3");
          while($row = $qry->fetch_assoc()):
					?>
							<td class=""><?= $row['date'] ?></td>
							<td class=""><?= $row['item_id'] ?></td>
              <td class=""><?= $row['remarks'] ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
          </div>

<div class="col-12 col-sm-4 col-md-4">
<div class="card rounded-0 card-blue">
	<div class="card-header">
		<h3 class="card-title">Expired Product</h3>
		<!-- <div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div> -->
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-hover table-striped table-bordered" id="list">
				<!-- <colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="35%">
					<col width="10%">
					<col width="10%">
				</colgroup> -->
				<thead>
        <tr>
						<th>Date Expiration</th>
            <th>Name</th>
            <th>Batch ID</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$i = 1;
						$qry = $conn->query("SELECT i.*, c.name as `category`,( COALESCE((SELECT SUM(quantity) FROM `stockin_list` where item_id = i.id),0)
						- COALESCE((SELECT SUM(quantity) FROM `stockout_list` where item_id = i.id),0)
						- COALESCE((SELECT SUM(quantity) FROM `waste_list` where item_id = i.id),0) )
						as `available` from `item_list` i 
						inner join category_list c on i.category_id = c.id where i.delete_flag = 0 
						AND `expiration_date` < NOW() AND 'available' > 0 order by i.`id` asc ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class=""><?= $row['expiration_date'] ?></td>
							<td class=""><?= $row['name'] ?></td>
              <td class=""><?= $row['batch_id'] ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


          </div>
          </div>

<?php

$i = 1;
$qry = $conn->query("SELECT DATE_FORMAT(date, '%M') AS Month, SUM(quantity) AS Amount FROM stockin_list GROUP BY DATE_FORMAT(date, '%M')");
foreach($qry as $data){
	$Month[] = $data['Month'];
	$Amount[] = $data['Amount'];
 }
?>

<?php

$i = 1;
$qry = $conn->query("SELECT DATE_FORMAT(date, '%M') AS Month, SUM(quantity) AS Amount FROM stockout_list GROUP BY DATE_FORMAT(date, '%M')");
foreach($qry as $data){
	$Months[] = $data['Month'];
	$Amounts[] = $data['Amount'];
 }
?>

<?php

$i = 1;
$qry = $conn->query("SELECT DATE_FORMAT(date, '%M') AS Month, SUM(quantity) AS Amount FROM waste_list GROUP BY DATE_FORMAT(date, '%M')");
foreach($qry as $data){
	$Monthss[] = $data['Month'];
	$Amountss[] = $data['Amount'];
 }
?>

<div>
<canvas id="myChart" width="100%" height="30%" ></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($Month) ?>,
      datasets: [{
        label: 'Total Number of Stock-In Per Month',
        data: <?php echo json_encode($Amount) ?>,
        borderWidth: 1
      },
	  {
        label: 'Total Number of Stock-out Per Month',
        data: <?php echo json_encode($Amounts) ?>,
        borderWidth: 1
      },
	  {
        label: 'Total Number of Waste Per Month',
        data: <?php echo json_encode($Amountss) ?>,
        borderWidth: 1
      }
	]
    },
	
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  
</script>
