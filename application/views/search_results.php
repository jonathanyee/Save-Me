<html>
<head>
<style type="text/css">
.hl
{
	background:yellow;
}
</style>
</head>
<body>
<?php $this->load->helper(array('form', 'search')); ?>
 
<?php echo form_open($this->uri->uri_string); ?>
<?php echo form_label('Search:', 'search-box'); ?>
<?php echo form_input(array('name' => 'q', 'id' => 'search-box', 'value' => $search_terms)); ?>
<?php echo form_submit('search', 'Search'); ?>
<?php echo form_close(); ?>
 
<?php if ( ! is_null($results)): ?>
	<?php if (count($results)): ?>

		<p>Showing search results for '<?php echo $search_terms; ?>' (<?php echo $first_result; ?>&ndash;<?php echo $last_result; ?> of <?php echo $total_results; ?>):</p>

		<ul>
		<?php foreach ($results as $result): ?>
			<li><a href="<?php echo $result->url; ?>"><?php echo search_highlight($result->title, $search_terms); ?></a>
				<br />
				<?php echo search_extract($result->body, $search_terms); ?>
			</li>
		<?php endforeach ?>
		</ul>

		<?php echo $this->pagination->create_links(); ?>

	<?php else: ?>
		<p><em>There are no results for your query.</em></p>
	<?php endif ?>

<?php endif ?>

</body>
</html>