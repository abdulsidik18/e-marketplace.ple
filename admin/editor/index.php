<?php
include_once 'submit.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Toko | Online </title> 
	<!-- end: Meta -->

    <!-- start: CSS --> 
	<link href="CSS/style.css" rel="stylesheet">
<script src="ckeditor/ckeditor.js"></script>
</head>
<body>				
		<!--start: Container -->
    	<div class="container"> 
    		<div class="ed-frm">
    			<h2> Teks Editor </h2>
    			<?php if (!empty($statusMsg)){ ?>
    			<p class="stmsg"><?php echo $statusMsg; ?></p>
    			<?php } ?>

    		<form method="post" action="">
    <textarea name="editor" id="editor" rows="10" cols="80">
    This is my textarea to be replaced with HTML editor.
    </textarea>
    <input type="submit" name="submit" value="SUBMIT">
</form>
</div>

<?php if(!empty($editorContent)){ ?>
<div class="ed-cont">
	<h1>Inserfr Contest</h1>
	<?php echo $editorContent; ?>
</div>
<?php } ?>
</div>
<script>
CKEDITOR.replace('editor');
</script>
</body>
</html>	