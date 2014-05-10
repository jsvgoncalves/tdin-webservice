<div class="login">
	<?php echo $this->Form->create('User'); ?>
		<ul>
			<li>
				<p>E-mail:</p>
				<?php echo $this->Form->input('email', 
				array('label' => false, 'autocomplete' => 'off')); ?>
			</li>
			<li>
				<p>Password:</p>
				<?php echo $this->Form->input('password', 
				array('label' => false, 'autocomplete' => 'off')); ?>
			</li>
		</ul>
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->Form->button('Login'); ?>
	<?php echo $this->Form->end(); ?>
</div> <!-- end login -->