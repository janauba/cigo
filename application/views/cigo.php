<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">

    <title>Cigo</title>
  </head>
  
  <body>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
	<script>var baseURL= '<?php echo base_url();?>'</script>
	<script src="<?php echo base_url(); ?>js/script.js" crossorigin="anonymous"></script>
	
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Cigo Interview</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Content</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Login</a>
            </li>			
          </ul>
        </div>
      </nav>
    </header>

	<main role="main" class="container">
		<div class="card">
			<div class="card-header">Add an Order</div>
			<div class="card-body">
				<form id="addOrder" action="<?php echo base_url(); ?>index.php/cigo/addOrder/" method="post" novalidate>
					<div class="row">
						<div class="col-sm">
						<label for="firstName">Fist Name</label>
						<input type="text" class="form-control" placeholder="First Name" id="firstName" name="firstName" maxlength="40" aria-describedby="firstName" required aria-required="true">
						</div>
						<div class="col-sm">
						<label for="lastName">Last Name</label>
						<input type="text" class="form-control" placeholder="Last Name" id="lastName" name="lastName" maxlength="40" aria-describedby="lastName">
						</div>
					</div>
					<div class="row">
						<div class="col-sm">
						<label for="email">Email</label>
						<input type="email" class="form-control" placeholder="you@sample.com" id="email" name="email" maxlength="255" aria-describedby="email">
						</div>
						<div class="col-sm">
						<label for="phoneNumber">Phone Number</label>
						<input type="tel" class="form-control" placeholder="+1 (888) 123-4567" id="phoneNumber" name="phoneNumber" maxlength="20" aria-describedby="phoneNumber" required aria-required="true">
						</div>
					</div>
					<div class="row">
						<div class="col-sm">
						<label for="scheduledDate">Scheduled Date</label>
						<input type="date" class="form-control" placeholder="2020-03-03" id="scheduledDate" name="scheduledDate" aria-describedby="scheduledDate" required aria-required="true">
						</div>
						<div class="col-sm">
						</div>
					</div>
					<div class="row">
						<div class="col-12">
						<label for="streetAddress">Street Address</label>
						<input type="text" class="form-control" id="streetAddress" name="streetAddress" maxlength="128" aria-describedby="streetAddress" required aria-required="true">
						</div>
						<div class="col-sm">
						</div>
					</div>		
					<div class="row">
						<div class="col-sm">
						<label for="city">City</label>
						<input type="text" class="form-control" id="city" name="city" maxlength="50" aria-describedby="city" required aria-required="true">
						</div>
						<div class="col-sm">
						<label for="stateProvince">State / Province</label>
						<input type="text" class="form-control" id="stateProvince" name="stateProvince" maxlength="50" aria-describedby="stateProvince" required aria-required="true">
						</div>
					</div>
					<div class="row">
						<div class="col-sm">
						<label for="postalZipCode">Postal / Zip Code</label>
						<input type="number" class="form-control" id="postalZipCode" name="postalZipCode" maxlength="10" aria-describedby="postalZipCode">
						</div>
						<div class="col-sm">
						<label for="contry">Country</label>
						<select class="form-control" id="country" name="country" required aria-required="true">
						  <option>Brazil</option>
						  <option>Canada</option>
						  <option>United States</option>
						  <option>Brazil</option>
						</select>
						</div>
					</div>
					<div class="row">
						<div class="col-sm text-right">
							<input type="reset" id="cancelOrder" class="btn btn-danger" value="Cancel">
							<button type="button" id="submitOrder" class="btn btn-success" value="">Submit</button>
						</div>		
					</div>
				</form>
			</div>
		</div>
		
		<div class="card">
			<div class="card-header">Existing Orders</div>
			<div class="card-body">
				<form id="updateOrder" action="<?php echo base_url(); ?>index.php/cigo/updateOrder/" method="post" class="table-responsive-sm">
					<table class="table" id="orders">
					  <thead>
						<tr>
						  <th scope="col">First Name</th>
						  <th scope="col">Last Name</th>
						  <th scope="col">Date</th>
						  <th scope="col" class="actions"></th>
						</tr>
					  </thead>
					  <tbody>
						<?php foreach ($orders as $order) { ?>
						<tr  id="order_<?php echo $order->id; ?>">
						  <td><?php echo $order->firstName; ?></td>
						  <td><?php echo $order->lastName; ?></td>
						  <td><?php echo $order->scheduledDate; ?></td>
						  <td>
							<div class="text-right actions">
								<div class="dropdown">
									<button class="btn btn-sm custom btn-light dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-order="<?php echo $order->id; ?>"><?php echo $order->status; ?></button>
									<div class="dropdown-menu">
									  <a class="dropdown-item" href="javascript:void(0)" onclick="updateToggleItem(this)">Assigned</a>
									  <a class="dropdown-item" href="javascript:void(0)" onclick="updateToggleItem(this)">Pending</a>
									  <a class="dropdown-item" href="javascript:void(0)" onclick="updateToggleItem(this)">On Route</a>
									  <a class="dropdown-item" href="javascript:void(0)" onclick="updateToggleItem(this)">Done</a>
									  <a class="dropdown-item" href="javascript:void(0)" onclick="updateToggleItem(this)">Canceled</a>
									</div>
									<button type="button" class="btn btn-sm btn-danger btn-circle" data-toggle="modal" data-target="#deleteModal" data-order="<?php echo $order->id; ?>">X</button>
								</div>
							</div>
						  </td>
						</tr>			   
						<?php }	?>	
					  </tbody>
					</table>
					
					<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title" id="deleteModalLabel">Warning</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body">
							Are you sure you want to delete this order?
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="dropOrder($(this).data('order'))" id="deleteOrder">Delete Order</button>
						  </div>
						</div>
					  </div>
					</div>	
					
				</form>
			</div>
		</div>
	</main>
    <footer class="footer">
	<section class="container">
      <div class="row">
		<div class="col-sm text-center text-sm-left">&copy; Marcos Rocha 2020</div>
		<div class="col-sm text-center text-sm-right">Powered by <img src="<?php echo base_url(); ?>img/codeigniter_logo.png"></div>
      </div>
	 </section>
    </footer>	
  </body>
</html>