<?php 
require "lib.php";
userverifikasi();
$daftarBooking = daftarBooking();
$daftarBookingMessage= daftarBookingMessage();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php include __DIR__.'/head.php'; ?>
</head>

<body>

	<div id="wrapper">
		<?php include __DIR__.'/layout/navbar.php'; ?>
		<?php include __DIR__.'/layout/sidebar.php'; ?>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Dashboard</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-comments fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge"><?php echo mysqli_num_rows($daftarBookingMessage) ?></div>
									<div>New Comments!</div>
								</div>
							</div>
						</div>
						<a href="#BookingList">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-green">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-tasks fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge">12</div>
									<div>New Tasks!</div>
								</div>
							</div>
						</div>
						<a href="">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-yellow">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-shopping-cart fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge"><?php echo mysqli_num_rows($daftarBooking) ?></div>
									<div>New Orders!</div>
								</div>
							</div>
						</div>
						<a href="#BookingList">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-red">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-support fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge">13</div>
									<div>Support Tickets!</div>
								</div>
							</div>
						</div>
						<a href="">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<!-- /.row -->
			<div class="panel panel-default" id="BookingList">
				<div class="panel-heading">
					<i class="fa fa-shopping-cart fa-fw"></i> Order List
					<div class="btn-group pull-right">
						<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-chevron-down"></i>
						</button>
						<ul class="dropdown-menu slidedown">
							<li>
								<a href="">
									<i class="fa fa-refresh fa-fw"></i> Refresh
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body" id="">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<table class="table table-striped table-bordered table-hover" id="myTables" width="100%">
										<thead>
											<tr style="text-align: center;">
												<td width="35px">No</td>
												<td width="75px">Order ID</td>
												<td width="100px">Username</td>
												<td width="100px">Email</td>
												<td width="100px">Phone</td>
												<td width="80px">Service</td>
												<td width="100px">Date Booking</td>
												<td>Time Booking</td>
												<td>Message</td>
												<td>Time Stamp</td>
												<td width="125px">Action</td>
											</tr>
										</thead>
										<tbody>
											<?php
											$x = 1;
											foreach ($daftarBooking as $key => $daftarBooking) {
												?>
												<tr>
													<td align="center"><?php echo $x; ?></td>
													<td align="center"><?php echo $daftarBooking['id']; ?></td>
													<td><?php echo $daftarBooking['username']; ?></td>
													<td><?php echo $daftarBooking['email']; ?></td>
													<td><?php echo $daftarBooking['phone']; ?></td>
													<td><?php echo $daftarBooking['subjek']; ?></td>
													<td><?php echo $daftarBooking['datebooking']; ?></td>
													<td><?php echo $daftarBooking['timebooking']; ?></td>
													<td><?php echo $daftarBooking['message']; ?></td>
													<td><?php echo $daftarBooking['timestamp']; ?></td>
													<td>
														<a type="button" href="#" class='btn btn-warning btn-sm open_modal_orderlist' id='<?php echo  $daftarBooking['id']; ?>'>Edit</a>
														<a type="button" class="btn btn-success btn-sm" onclick="confirm_complete('completeorder.php?&id=<?php echo  $daftarBooking['id']; ?>');">Complete</a>
													</td>
												</tr>
												<?php
												$x++;
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							HAIRCUT
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Username</th>
											<th>Email</th>
											<th>Phone</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$x = 1;
										$sql=mysqli_query($db, "SELECT * FROM custorder WHERE subjek='haircut'");
										while($haircut=mysqli_fetch_array($sql)){
											?>
											<tr>
												<td align="center"><?php echo $x; ?></td>
												<td align="center"><?php echo $haircut['username']; ?></td>
												<td><?php echo $haircut['email']; ?></td>
												<td><?php echo $haircut['phone']; ?></td>
											</tr>
											<?php
											$x++;
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							HAIR COLOR
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Username</th>
											<th>Email</th>
											<th>Phone</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$x = 1;
										$sql=mysqli_query($db, "SELECT * FROM custorder WHERE subjek='hair color'");
										while($haircolor=mysqli_fetch_array($sql)){
											?>
											<tr>
												<td align="center"><?php echo $x; ?></td>
												<td align="center"><?php echo $haircolor['username']; ?></td>
												<td><?php echo $haircolor['email']; ?></td>
												<td><?php echo $haircolor['phone']; ?></td>
											</tr>
											<?php
											$x++;
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							SHAVE
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Username</th>
											<th>Email</th>
											<th>Phone</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$x = 1;
										$sql=mysqli_query($db, "SELECT * FROM custorder WHERE subjek='shave'");
										while($shave=mysqli_fetch_array($sql)){
											?>
											<tr>
												<td align="center"><?php echo $x; ?></td>
												<td align="center"><?php echo $shave['username']; ?></td>
												<td><?php echo $shave['email']; ?></td>
												<td><?php echo $shave['phone']; ?></td>
											</tr>
											<?php
											$x++;
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div>
			<?php include __DIR__.'/layout/footer.php'; ?>
		</div>
	</div>
	<!-- /.wrapper -->


	<!-- modal complete -->
	<div class="modal fade" id="modal_complete" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title" id="bookingModalLabel"> Order Complete</h1>
				</div>
				<div class="modal-body">
					<p>Anda Yakin Ingin Menyelesaikan Order Ini?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<a href="#" type="button" class="btn btn-danger btn-ok" id="complete_link">Completed</a>
				</div>
			</div>
		</div>
	</div>


	<!-- modal edit orderlist-->
	<div id="ModalEditOrderlist" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="orderlistModalLabel" aria-hidden="true">
	</div>


	<!-- Script JS -->
	<?php include __DIR__.'/js.php'; ?>

</body>
</html>
