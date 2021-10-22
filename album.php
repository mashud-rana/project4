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
					<button class="cc__upload--button">Upload</button>
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
						if($img_list)
						{
							foreach ($img_list as $img) {
								echo "<li><a href='javascript:void(0)' data_img='".$img."' src='".$img."' onclick=\"display('".$img."')\">".explode("/",$img)[1]."</a> &nbsp; <form method='post' enctype='multipart/form-data'><input type='hidden' name='dl_info' value='".explode("/",$img)[1]."' > <button class='cc__dwonload' type='submit'>download</button></form></li>";
								
							}
						}
						?>
					</ul>
				</div>
			</div>
			<div class="cc__images__inners--right">
				<?php
					if($img_list)
					{
						echo "<img id='display_img' src='".$img_list[0]."' style='width:100%'> <form method='post' enctype='multipart/form-data'><input type='hidden' name='dl_info' id='s_download_btn' value='".explode("/",$img_list[0])[1]."' > <button class='cc__dwonload' type='submit'>download</button></form>";
					}
				?>
			</div>
		</div>
	</div>
	</section>
	
</body>
<script type="text/javascript">
	function display(name)
	{
		// console.log(name.split('/')[1])
		document.getElementById('display_img').src=name;
		document.getElementById('s_download_btn').value=name.split('/')[1];
	}
</script>
</html>
<?php
	if (isset($_FILES["image"]))
	{
		move_uploaded_file($_FILES["image"]["tmp_name"], "images/".basename($_FILES["image"]["name"]));		
		header("Refresh:0");
	}
	if(isset($_POST['dl_info']))
	{
		$filename = $_POST['dl_info'];
		$filepath = 'images/'.$filename;
		if(!empty($filename) && file_exists($filepath))
		{
			header("Cache-Control: no-store, no-cache");
			header("Content-Description: File Transfer");
			header("Content-Disposition: attachment; filename=".$filename);
			header("Content-type: image/jpg");
			header("Content-Transfer-Encoding: binary");
			header( "Content-length: " . filesize($filepath));
			ob_clean();
			flush();
			readfile($filepath);
			exit;		
		}
	}
?>