
<div class="pull-left">
	<label>Показывать 
		<select id="per-page-dropdown" class="per-page-dropdown">

			@foreach($tableView->present()->perPageOptions() as $length)

				<?php echo $tableView->present()->perPageOptionTagFor( $length ); ?>
				
			@endforeach
		</select> записей
	</label>
</div>