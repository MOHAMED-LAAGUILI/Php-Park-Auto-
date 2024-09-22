<?php
session_start();
if (!isset($_SESSION['typeUser']))
	header('location:login.php');

if (!$_SESSION['typeUser'] == "Administrator")
	header('location:../index.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>ALL CARS</title>
	<!-- Required meta tags -->
	<!--Nav and side nav Deppendencies-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="shortcut icon" href="../assets/images/favicon.ico" />

	<!--Table Deppendencies-->
	<link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

	<style>
		/*Overrides for Tailwind CSS */

		/*Form fields*/
		.dataTables_wrapper select,
		.dataTables_wrapper .dataTables_filter input {
			color: #4a5568;
			/*text-gray-700*/
			padding-left: 1rem;
			/*pl-4*/
			padding-right: 1rem;
			/*pl-4*/
			padding-top: .5rem;
			/*pl-2*/
			padding-bottom: .5rem;
			/*pl-2*/
			line-height: 1.25;
			/*leading-tight*/
			border-width: 2px;
			/*border-2*/
			border-radius: .25rem;
			border-color: #edf2f7;
			/*border-gray-200*/
			background-color: #edf2f7;
			/*bg-gray-200*/
		}

		/*Row Hover*/
		table.dataTable.hover tbody tr:hover,
		table.dataTable.display tbody tr:hover {
			background-color: #ebf4ff;
			/*bg-indigo-100*/
		}

		/*Pagination Buttons*/
		.dataTables_wrapper .dataTables_paginate .paginate_button {
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Pagination Buttons - Current selected */
		.dataTables_wrapper .dataTables_paginate .paginate_button.current {
			color: #fff !important;
			/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/*shadow*/
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			background: #667eea !important;
			/*bg-indigo-500*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Pagination Buttons - Hover */
		.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
			color: #fff !important;
			/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/*shadow*/
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			background: #667eea !important;
			/*bg-indigo-500*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Add padding to bottom border */
		table.dataTable.no-footer {
			border-bottom: 1px solid #e2e8f0;
			/*border-b-1 border-gray-300*/
			margin-top: 0.75em;
			margin-bottom: 0.75em;
		}

		/*Change colour of responsive icon*/
		table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
		table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
			background-color: #667eea !important;
			/*bg-indigo-500*/
		}
	</style>
</head>

<body>

	<?php include '../inc/navBar_sideBar.php'; ?>

	<div class="table-responsive">
		<div class="card">
			<div class="card-body">
			<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-account-circle"></i>
                </span>Users Table
              </h3>
            </div>
				<a href="adduser.php">
					<button type="button" class="btn btn-primary">
						ADD USER
					</button>
				</a>
			
				<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
					<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
						<thead>
							<tr>
								<th data-priority="1">#</th>
								<th data-priority="2">Image</th>
								<th data-priority="3">Full Name</th>
								<th data-priority="4">Email</th>
								<th data-priority="5">Password</th>
								<th data-priority="6">USER Type</th>
								<th data-priority="7">ACTION</th>
							</tr>
						</thead>
						<tbody>

							<?php
							require '../config.php';
									$sql = "SELECT * FROM `users`;";
							$result = mysqli_query($cn, $sql) or die(mysqli_error($cn));
							while ($line = mysqli_fetch_array($result)) {  ?>

								<tr class="active">
									<td scope="row">
										<?php echo $line[0] ?>
									</td>
									<td>
										<img src="<?php echo $line[1] ?>" class="rounded-pill w-10" >
									</td>
									<td>
										<?php echo $line[2] ?>
									</td>
									<td>
										<?php echo  $line[3]?>
									</td>
									<td>
										<?php echo $line[4] ?>
									</td>
									<td>
										<?php echo $line[5] ?>
									</td>

									<td>
									<?php if($line[5] != "Administrator"){ ?>
										<a href="deleteuser.php?id=<?php echo $line[0] ?>">
											<button type="button" class="btn-danger p-1 rounded-pill">
												<i class="mdi mdi-delete me-2 fw-bold">DELETE</i>
											</button>
										</a>
									<?php }?>

										<a href="edituser.php?id=<?php echo $line[0] ?>">
											<button type="button" class="btn-warning my-1 p-1 rounded-pill">
												<i class="mdi mdi-pen me-4 text-dark fw-bold">EDIT</i>
											</button>
										</a>
									</td>
								</tr>
							<?php
							}
							mysqli_close($cn);
							?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
		</div>



		<?php include '../inc/footer.php'; ?>

		<!--NAV 1 side Bar Deppendencies-->
		<script src="../assets/vendors/js/vendor.bundle.base.js"></script>
		<script src="../assets/js/off-canvas.js"></script>
		<script src="../assets/js/hoverable-collapse.js"></script>
		<script src="../assets/js/misc.js"></script>



		<!--Table Deppendencies-->

		<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
		<script>
			$(document).ready(function() {

				var table = $('#example').DataTable({
						responsive: true
					})
					.columns.adjust()
					.responsive.recalc();
			});
		</script>
</body>

</html>