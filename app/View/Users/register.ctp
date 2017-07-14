<h1>Register</h1>
<br>

<div class="row">
    <div class="col-sm-4">

        <?php echo $this->Form->create('User');?>
        <?php echo $this->Form->input('role', array('type'=>'hidden', 'value'=>'customer')); ?>
        <br />
        <?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('username', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('password', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('active', array('type' => 'hidden', 'value'=>'1')); ?>
        <br />
        <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
        <?php echo $this->Form->end(); ?>

    </div>
</div>