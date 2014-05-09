<div class="tickets form">
<?php echo $this->Form->create('Ticket'); ?>
	<fieldset>
		<legend><?php echo __('Edit Ticket'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('solver_id');
		echo $this->Form->input('status');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Ticket.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Ticket.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tickets'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Solvers'), array('controller' => 'solvers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Solver'), array('controller' => 'solvers', 'action' => 'add')); ?> </li>
	</ul>
</div>
