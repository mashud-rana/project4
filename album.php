<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Project 4</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<section class="cc__upload__section--heads">
	<div class="cc__container">
		<div class="cc__upload--head">
			<div class="cc__upload__inner--heads">
				<h2>Project 4</h2>

				<form style="width: 100%;" method="POST" action="album.php" enctype="multipart/form-data">
					<label for="upload_img" style="">
						<span class="cc__choose--btn">Choose Image</span>
					</label>
					<br>
					<br>
					<input style="display: none;" id="upload_img" type="file" name="image">
					<input class="cc__upload--button" type="button" value="Upload" name="upload">
				</form>
			</div>
		</div>
		<div class="cc__images__list--heads">
			<div class="cc__images__inners--left">
				<?php
					$img_list = glob("images/*");
				?>
				<h2>Image	s List</h2>	
				<div class="cc__div-auto">
					<ul>
						<?php
							foreach ($img_list as $img) {
								echo "<li><a href='javascript:void(0)' data_img='".$img."' src='".$img."' onclick=\"display('".$img."')\">".explode("/",$img)[1]."</a><button class='cc__dwonload' onclick='download()'>Download</button></li>";
								
							}
						?>
					</ul>
				</div>
			</div>
			<div class="cc__images__inners--right">
				<?php
					echo "<img id='display_img' src='".$img_list[0]."' style='width:100%'>"
				?>
				<div class="cc__image-btn">
					<button class="cc__dwonload">Download</button>
				</div>
			</div>
			
		</div>
		<!-- <div>
			<table width="100%">
				
				<tr style="padding: 0;margin: 0">
						<td>
								
						
						</td>
						<td align="center" rowspan="10">
							
						</td>
				</tr>
			</table>
		</div> -->
	</div>
	</section>
	
</body>
<script type="text/javascript">
	function display(name)
	{
		console.log(name)
		document.getElementById('display_img').src=name
	}
	function download()
	{
		var download = <?php download(); ?>
	}
</script>
</html>
<?php
	if (isset($_FILES["image"]))
	{
		move_uploaded_file($_FILES["image"]["tmp_name"], "images/".basename($_FILES["image"]["name"]));		
	}
	function download()
	{
		echo "Downloading";
	}
?>