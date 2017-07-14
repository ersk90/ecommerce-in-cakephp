
<br />

<strong>Customer area</strong>

<br />
<br />

<h2>Cutomer Profile</h2>
<?php
	foreach($user as $customer):
?>
<div>
<div class="table-responsive">
  <table class="table table-hover">
	<tr class="active">
		<td><h4>Name</h4></td>
		<td><h4><?php echo $customer['name']; ?></h4></td>
	</tr>
	
	<tr class="danger">
		<td>Username</td>
		<td><?php echo $customer['username']; ?></td>
	</tr>
	<tr class="success">
		<td>Role</td>
		<td><?php echo $customer['role']; ?></td>
	</tr>
	<tr>
		<td>Created</td>
		<td><?php echo $customer['created']; ?></td>
	</tr>
  </table>
  
		<td><?php echo $this->Html->link('Edit',['controller'=>'users','action'=>'edit', $customer['id']]); ?></td>
</div>
</div>
<?php endforeach; ?>