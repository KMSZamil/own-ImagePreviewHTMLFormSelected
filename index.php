<!DOCTYPE html>
<html lang="en">

<head>
	<title>Image preview while selecting from form</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body>


	<div class="container">
		<h3>Image preview while selecting from HTML form</h3>
		<div class="row">
			<div class="form-group">
				<label for="Picture" class="col-sm-2 col-form-label">Picture</label>
				<div class="col-sm-4 pb-2">
					<input type="file" class="form-control" name="image" id="fileupload" placeholder="Picture" required>
				</div>
				<div class="col-sm-2">
					<img class="img-fluid" id="user_image" src="./no_img.jpg" height="100" width="100">
				</div>
				<div class="col-sm-4">
					<div id="dvPreview"></div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.2.1/jquery-migrate.min.js"></script>
	<script>
		$(function() {
			$("#fileupload").change(function() {
				$("#dvPreview").html("");
				var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
				if (regex.test($(this).val().toLowerCase())) {
					if ($.browser.msie && parseFloat(jQuery.browser.version) <= 9.0) {
						$("#dvPreview").show();
						$("#dvPreview")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src =
							$(this).val();
					} else {
						if (typeof(FileReader) != "undefined") {
							$("#user_image").hide();
							$("#dvPreview").show();
							$("#dvPreview").append("<img />");
							var reader = new FileReader();
							reader.onload = function(e) {
								$("#dvPreview img").attr("src", e.target.result).css({
									'height': '100px',
									'width': '100px'
								});
							}
							reader.readAsDataURL($(this)[0].files[0]);
						} else {
							$("#user_image").show();
							alert("This browser does not support FileReader.");
						}
					}
				} else {
					$("#user_image").show();
					alert("Please upload a valid image file.");
				}
			});
		});
	</script>
</body>

</html>