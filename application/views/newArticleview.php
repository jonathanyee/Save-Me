<html>
<head>
	<title>Save Me - Add New Article</title>
</head>
<body>	
<?php echo form_open('user/insertArticle'); ?>

<p>Title:<input type="text" name="title"></p>
<p>URL:<input type="text" name="url"></p>
<p><textarea name="body" rows="20"></textarea></p>

<p><input type="submit" value="Submit"></p>

</form>
</body>
</html>