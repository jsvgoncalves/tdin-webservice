<div class="tickets view">
<h2><?php echo __('Ticket'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ticket['User']['name'], array('controller' => 'users', 'action' => 'view', $ticket['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Solver'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ticket['Solver']['name'], array('controller' => 'solvers', 'action' => 'view', $ticket['Solver']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ticket'), array('action' => 'edit', $ticket['Ticket']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Ticket'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tickets'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ticket'), array('action' => 'delete', $ticket['Ticket']['id']), null, __('Are you sure you want to delete # %s?', $ticket['Ticket']['id'])); ?> </li>
	</ul>
</div>
