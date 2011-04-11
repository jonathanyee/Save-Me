<html>
<head>
<title>Single View</title>
</head>
<body>
	<?php if ($query->num_rows() > 0): ?>
		<?php foreach($query->result() as $row): ?>
		
		<h2><?php echo $row->title; ?></h2>
		<p><?php echo $row->url; ?></p>
		<p><?php echo $row->body; ?></p>
	
		<?php endforeach; ?>
	<?php endif; ?>
</body>
</html>