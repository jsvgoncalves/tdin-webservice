<div class="departments view">
<h2><?php echo __('Department'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($department['Department']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($department['Department']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Solver Name'); ?></dt>
		<dd>
			<?php echo h($department['Department']['solver_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($department['Department']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($department['Department']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($department['Department']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Department'), array('action' => 'edit', $department['Department']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Department'), array('action' => 'delete', $department['Department']['id']), null, __('Are you sure you want to delete # %s?', $department['Department']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Secondary Tickets'), array('controller' => 'secondary_tickets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Secondary Ticket'), array('controller' => 'secondary_tickets', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Secondary Tickets'); ?></h3>
	<?php if (!empty($department['SecondaryTicket'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Ticket Id'); ?></th>
		<th><?php echo __('Department Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($department['SecondaryTicket'] as $secondaryTicket): ?>
		<tr>
			<td><?php echo $secondaryTicket['id']; ?></td>
			<td><?php echo $secondaryTicket['ticket_id']; ?></td>
			<td><?php echo $secondaryTicket['department_id']; ?></td>
			<td><?php echo $secondaryTicket['status']; ?></td>
			<td><?php echo $secondaryTicket['created']; ?></td>
			<td><?php echo $secondaryTicket['modified']; ?></td>
			<td><?php echo $secondaryTicket['title']; ?></td>
			<td><?php echo $secondaryTicket['description']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'secondary_tickets', 'action' => 'view', $secondaryTicket['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'secondary_tickets', 'action' => 'edit', $secondaryTicket['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'secondary_tickets', 'action' => 'delete', $secondaryTicket['id']), null, __('Are you sure you want to delete # %s?', $secondaryTicket['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Secondary Ticket'), array('controller' => 'secondary_tickets', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
