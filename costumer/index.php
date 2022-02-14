



<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>costumer operation</title>

		<!-- Java Script -->
	    <script type="text/javascript" src="script/jquery/jquery-3.6.0.min.js"></script>
	    <script type="text/javascript" src="script/jquery/jquery.slim.min.js"></script>
	    <script type="text/javascript" src="script/jquery/popper.min.js"></script>
	    

	    <!-- Data Table -->
	    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
	    <script type="text/javascript" src="DataTables/datatables.min.js"></script>

	    <!-- Bootstrap  -->
	    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
	    <script src="bootstrap/bootstrap.bundle.min.js"></script>
	    <script src="bootstrap/bootstrap.min.js"></script>

	</head>
	<style type="text/css">
		.outer-table{
			overflow-y: auto;
		}
	</style>
	<body>

		<!-- Modal -->
		<div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<h5 class="modal-title" id="exampleModalLabel">New User</h5>
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          			<span aria-hidden="true">&times;</span>
		        		</button>
		      		</div>
		      		<div class="modal-body">
		      			<div class="form-group">
			    			<label for="completename">Name</label>
			    			<input type="text" class="form-control" id="completename" placeholder="Enter your name">
		    			</div>

		    			<div class="form-group">
			    			<label for="completemail">Email</label>
			    			<input type="email" class="form-control" id="completemail" placeholder="Enter your email">
		    			</div>

		    			<div class="form-group">
			    			<label for="completemobile">Mobile</label>
			    			<input type="text" class="form-control" id="completemobile" placeholder="Enter your mobile number">
		    			</div>

		    			<div class="form-group">
			    			<label for="completepassword">Password</label>
			    			<input type="Password" class="form-control" id="completepassword" placeholder="Enter your password">
		    			</div>
	      			</div>
		      		<div class="modal-footer">
		      			<button type="button" class="btn btn-dark" onclick="adduser()">Submit</button>
		        		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		        	</div>
		    	</div>
		  	</div>
		</div>

		<div class="container">
			<button type="button" class="btn btn-dark my-5" data-toggle="modal" data-target="#completeModal">
		  			Add New User
			</button>
		</div>
		<script type="text/javascript">

			function adduser(){
				var nameAdd=$('#completename').val();
				var emailAdd=$('#completemail').val();
				var mobileAdd=$('#completemobile').val();
				var passwordAdd=$('#completepassword').val();

				$.ajax({
					url:"insert.php",
					type:'post',
					data:{
						nameSend:nameAdd,
						emailSend:emailAdd,
						mobileSend:mobileAdd,
						passwordSend:passwordAdd
					},
					success:function(data,status){
						//function to display data;
						console.log(status);
					}
				});
			}

			$('#datatable').DataTable({});
		</script>
	</body>
</html>