<h1>Change Password</h1>
<br>

<div class="row">
    <div class="col-sm-4">

        <?php echo $this->Form->create('User');?>
        <?php echo $this->Form->input('id', array('type'=>'hidden', 'value'=>$this->Session->read('id'))); ?>
        <br />
        <?php echo $this->Form->input('password', array('label'=>'Old Password' ,'class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('NewPassword', array('type'=>'password','class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('ConfirmPassword', array('type'=>'password','class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('active', array('type' => 'hidden', 'value'=>'1')); ?>
        <br />
        <?php echo $this->Form->button('Update', array('class' => 'btn btn-primary')); ?>
        <?php echo $this->Form->end(); ?>

    </div>
</div>