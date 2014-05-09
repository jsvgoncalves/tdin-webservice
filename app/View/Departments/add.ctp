<div class="departments form">
<?php echo $this->Form->create('Department'); ?>
	<fieldset>
		<legend><?php echo __('Add Department'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('solver_name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Departments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Secondary Tickets'), array('controller' => 'secondary_tickets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Secondary Ticket'), array('controller' => 'secondary_tickets', 'action' => 'add')); ?> </li>
	</ul>
</div>
