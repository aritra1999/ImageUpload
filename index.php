<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<!-- <link href="css/bootstrap.min.css" rel="stylesheet" />
		<script src="js/bootstrap.min.js"></script> -->

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>		

		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/jquery.form.js"></script>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="container">
			<div class="panel panel-default">
				<h1 align="center">Upload File</h1>
				<br>
				<div class="panel-body" align="center">
					<form id="uploadImage" action="upload.php" method="post">
						<!-- <div class="custom-file upload	">
							<input type="file" class="custom-file-input" name="uploadFile" id="uploadFile">
							<label class="custom-file-label" for="customFile">Choose file</label>
						</div> -->
						<div class="form-group">
							<input type="file" placeholder="Chose File " class="progress-bar progress-bar-striped progress-bar-animated bg-secondary upload" name="uploadFile" id="uploadFile" require/>
						</div>
						<div class="form-group">
							<input type="text" 	class="form-control" placeholder="Enter Key" name="key" required/>
						</div>
						<div class="form-group">
							<input type="submit" id="uploadSubmit" value="Upload" class="btn btn-outline-primary btn-block" required/>
						</div>
						<br>
						<div class="progress">
							<div class="progress-bar progress-bar-striped progress-bar-animated	" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<div id="targetLayer" style="display:none;"></div>
					</form>
					<div id="loader-icon" style="display:none;"><img src="loader.gif" /></div>
				</div>
			</div>
		</div>
	</body>
</html>

<script>
$(document).ready(function(){
	$('#uploadImage').submit(function(event){
		if($('#uploadFile').val())
		{
			event.preventDefault();
			$('#loader-icon').show();
			$('#targetLayer').hide();
			$(this).ajaxSubmit({
				target: '#targetLayer',
				beforeSubmit:function(){
					$('.progress-bar').width('50%');
				},
				uploadProgress: function(event, position, total, percentageComplete)
				{
					$('.progress-bar').animate({
						width: percentageComplete + '%'
					}, {
						duration: 1000
					});
				},
				success:function(){
					$('#loader-icon').hide();
					$('#targetLayer').show();
				},
				resetForm: true
			});
		}
		return false;
	});
});
</script>
