<div class="secondaryTickets index">
	<h2><?php echo __('Secondary Tickets'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('ticket_id'); ?></th>
			<th><?php echo $this->Paginator->sort('department_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($secondaryTickets as $secondaryTicket): ?>
	<tr>
		<td><?php echo h($secondaryTicket['SecondaryTicket']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($secondaryTicket['Ticket']['title'], array('controller' => 'tickets', 'action' => 'view', $secondaryTicket['Ticket']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($secondaryTicket['Department']['name'], array('controller' => 'departments', 'action' => 'view', $secondaryTicket['Department']['id'])); ?>
		</td>
		<td><?php echo h($secondaryTicket['SecondaryTicket']['status']); ?>&nbsp;</td>
		<td><?php echo h($secondaryTicket['SecondaryTicket']['created']); ?>&nbsp;</td>
		<td><?php echo h($secondaryTicket['SecondaryTicket']['modified']); ?>&nbsp;</td>
		<td><?php echo h($secondaryTicket['SecondaryTicket']['title']); ?>&nbsp;</td>
		<td><?php echo h($secondaryTicket['SecondaryTicket']['description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $secondaryTicket['SecondaryTicket']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $secondaryTicket['SecondaryTicket']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $secondaryTicket['SecondaryTicket']['id']), null, __('Are you sure you want to delete # %s?', $secondaryTicket['SecondaryTicket']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Secondary Ticket'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tickets'), array('controller' => 'tickets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ticket'), array('controller' => 'tickets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
	</ul>
</div>
