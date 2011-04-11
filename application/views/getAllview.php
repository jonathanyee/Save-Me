<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" > 
<head> 
	<title>Save Me! - <?php echo $username; ?>'s articles</title> 
	<link rel="stylesheet" type="text/css" href="style.css" media="all"> 
</head> 
<body> 
<div id="container">
<div id="header"> 
    <h1>Save Me! - <?php echo $username; ?>'s articles</h1> 
    <h2>Save and search through your bookmarks.</h2> 
    <ul> 
        <li><?php echo anchor('', 'Home'); ?></li> 
		  <li><?php echo anchor('pages/search', 'Search'); ?></li>
        <li><?php echo anchor('user/newArticle/', 'New Article'); ?></li> 
        <li><a style="cursor:move;" title="Drag Me into Your Bookmark Bar" href="javascript:void(location.href='http://localhost:8888/CodeIgniter_2.0.1/index.php/user/insert?url='+encodeURIComponent(location.href));">Save Me! Bookmarklet</a></li> 
        <li><?php echo anchor('/auth/logout/', 'Logout'); ?></li> 
    </ul> 
</div> 
<div class="colmask fullpage"> 
    <div class="col1"> 
        <!-- Column 1 start --> 
        	<h1><?php echo $username; ?>'s articles</h1>

		   <?php if ($query->num_rows() > 0): ?>
				<?php foreach($query->result() as $row): ?>

				<h2><?php echo anchor('user/getSingle/'.$row->id, $row->title); ?></h2>
				<p><?php echo date ("m/d/Y h:ia",strtotime($row->date)); ?> <?php echo $row->url; ?></p>

				<?php endforeach; ?>
			<?php endif; ?>
			
        <!-- Column 1 end --> 
    </div> 
</div> 
<div id="footer"> 
    <p>This page uses the <a href="http://matthewjamestaylor.com/blog/ultimate-1-column-full-page-pixels.htm">Ultimate 'Full Page' 1 column Liquid Layout</a> by <a href="http://matthewjamestaylor.com">Matthew James Taylor</a>. View more <a href="http://matthewjamestaylor.com/blog/-website-layouts">website layouts</a> and <a href="http://matthewjamestaylor.com/blog/-web-design">web design articles</a>.</p> 
</div> 
</div>
</body> 
</html>