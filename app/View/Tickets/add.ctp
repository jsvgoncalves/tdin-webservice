<div class="tickets form">
<?php echo $this->Form->create('Ticket'); ?>
	<fieldset>
		<legend><?php echo __('Add Ticket'); ?></legend>
	<?php
		echo $this->Form->input('user_id', array('disabled'));
		echo $this->Form->hidden('solver_id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tickets'), array('action' => 'index')); ?></li>
	</ul>
</div>
