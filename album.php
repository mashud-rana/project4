<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Project 4</title>
</head>
<body>
	<div align="center" style="width: 100%;margin: 0;padding: 0;">
		<div align="center" style="width: 70%;margin: 0;padding: 0;border: 2px solid;">
			<h2>Project 4</h2>

			<form style=" width: 100%; " method="POST" action="album.php" enctype="multipart/form-data">
				<label for="upload_img" style="" for="upload_img">
					<span style="font-size: 34px;cursor: pointer;background-color: red">Choose Image</span>
				</label><br><br>
				<input style="display: none;" id="upload_img" type="file" name="image">
				<input style="width: 100%; height: 30px;cursor: pointer" type="button" value="Upload" name="upload">
			</form>
		</div>
	</div>
	<div>
		<table width="100%">
			<?php
				$img_list = glob("images/*");
			?>
			<tr style="padding: 0;margin: 0">
					<td>
					<h2>Images List</h2>			
					<?php
						foreach ($img_list as $img) {
							echo "<a href='javascript:void(0)' data_img='".$img."' src='".$img."' onclick=\"display('".$img."')\">".explode("/",$img)[1]."</a><button onclick='download()'>Download</button><br>";
						}
					?>
					</td>
					<td align="center" rowspan="10">
						<?php
							echo "<img id='display_img' src='".$img_list[0]."' style='width:50%'>"
						?>
					</td>
			</tr>
		</table>
	</div>
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