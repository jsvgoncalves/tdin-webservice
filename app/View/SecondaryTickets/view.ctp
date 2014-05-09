<div class="secondaryTickets view">
<h2><?php echo __('Secondary Ticket'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($secondaryTicket['SecondaryTicket']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ticket'); ?></dt>
		<dd>
			<?php echo $this->Html->link($secondaryTicket['Ticket']['title'], array('controller' => 'tickets', 'action' => 'view', $secondaryTicket['Ticket']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo $this->Html->link($secondaryTicket['Department']['name'], array('controller' => 'departments', 'action' => 'view', $secondaryTicket['Department']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($secondaryTicket['SecondaryTicket']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($secondaryTicket['SecondaryTicket']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($secondaryTicket['SecondaryTicket']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($secondaryTicket['SecondaryTicket']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($secondaryTicket['SecondaryTicket']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Secondary Ticket'), array('action' => 'edit', $secondaryTicket['SecondaryTicket']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Secondary Ticket'), array('action' => 'delete', $secondaryTicket['SecondaryTicket']['id']), null, __('Are you sure you want to delete # %s?', $secondaryTicket['SecondaryTicket']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Secondary Tickets'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Secondary Ticket'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tickets'), array('controller' => 'tickets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ticket'), array('controller' => 'tickets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
	</ul>
</div>
