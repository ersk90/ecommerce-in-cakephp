<?php echo $this->set('title_for_layout', 'Address'); ?>

<?php $this->Html->addCrumb('Address'); ?>

<?php echo $this->Html->script(array('shop_address1.js'), array('inline' => false)); ?>

<h1>Address</h1>

<?php echo $this->Form->create('Address');

// echo $this->Session->read('id');

if(count($Address) == 0)
{
	?>

<hr>

<div class="row">
    <div class="col col-sm-4">
		<?php echo $this->Form->input('fr_user_id',['type'=>'hidden','class'=>'form-control','value'=>$this->Session->read('id')]); ?>
		
        <?php echo $this->Form->input('first_name', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('last_name', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('email', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('phone', array('class' => 'form-control')); ?>
        <br />
        <br />

    </div>
    <div class="col col-sm-4">

        <?php echo $this->Form->input('billing_address', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('billing_address2', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('billing_city', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('billing_state', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('billing_zip', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('billing_country', array('class' => 'form-control')); ?>
        <br />
        <br />

        <?php echo $this->Form->input('sameaddress', array('type' => 'checkbox','checked', 'label' => 'Copy Billing Address to Shipping')); ?>

    </div>
    <div class="col col-sm-4">

        <?php echo $this->Form->input('shipping_address', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('shipping_address2', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('shipping_city', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('shipping_state', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('shipping_zip', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('shipping_country', array('class' => 'form-control')); ?>
        <br />
        <br />

    </div>
</div>

<br />

	<?php
	echo $this->Form->button('<i class="fa fa-check"></i> &nbsp; Save', array('class' => 'btn btn-sm btn-success'));
	}
	else
	{
	foreach($Address as $adr)
	{
	?>
	

<hr>

<div class="row">
    <div class="col col-sm-4">
		<?php echo $this->Form->input('id',['type'=>'hidden','class'=>'form-control','value'=>$adr['addresses']['id']]); ?>
		
        <?php echo $this->Form->input('first_name', array('class' => 'form-control','value'=>$adr['addresses']['first_name'])); ?>
        <br />
        <?php echo $this->Form->input('last_name', array('class' => 'form-control','value'=>$adr['addresses']['last_name'])); ?>
        <br />
        <?php echo $this->Form->input('email', array('class' => 'form-control','value'=>$adr['addresses']['email'])); ?>
        <br />
        <?php echo $this->Form->input('phone', array('class' => 'form-control','value'=>$adr['addresses']['phone'])); ?>
        <br />
        <br />

    </div>
    <div class="col col-sm-4">

        <?php echo $this->Form->input('billing_address', array('class' => 'form-control','value'=>$adr['addresses']['billing_address'])); ?>
        <br />
        <?php echo $this->Form->input('billing_address2', array('class' => 'form-control','value'=>$adr['addresses']['billing_address2'])); ?>
        <br />
        <?php echo $this->Form->input('billing_city', array('class' => 'form-control','value'=>$adr['addresses']['billing_city'])); ?>
        <br />
        <?php echo $this->Form->input('billing_state', array('class' => 'form-control','value'=>$adr['addresses']['billing_state'])); ?>
        <br />
        <?php echo $this->Form->input('billing_zip', array('class' => 'form-control','value'=>$adr['addresses']['billing_zip'])); ?>
        <br />
        <?php echo $this->Form->input('billing_country', array('class' => 'form-control','value'=>$adr['addresses']['billing_country'])); ?>
        <br />
        <br />

        <?php echo $this->Form->input('sameaddress', array('type' => 'checkbox','checked', 'label' => 'Copy Billing Address to Shipping')); ?>

    </div>
    <div class="col col-sm-4">

        <?php echo $this->Form->input('shipping_address', array('class' => 'form-control','value'=>$adr['addresses']['shipping_address'])); ?>
        <br />
        <?php echo $this->Form->input('shipping_address2', array('class' => 'form-control','value'=>$adr['addresses']['shipping_address2'])); ?>
        <br />
        <?php echo $this->Form->input('shipping_city', array('class' => 'form-control','value'=>$adr['addresses']['shipping_city'])); ?>
        <br />
        <?php echo $this->Form->input('shipping_state', array('class' => 'form-control','value'=>$adr['addresses']['shipping_state'])); ?>
        <br />
        <?php echo $this->Form->input('shipping_zip', array('class' => 'form-control','value'=>$adr['addresses']['shipping_zip'])); ?>
        <br />
        <?php echo $this->Form->input('shipping_country', array('class' => 'form-control','value'=>$adr['addresses']['shipping_country'])); ?>
        <br />
        <br />

    </div>
</div>

<br />

<?php } 

echo $this->Form->button('<i class="fa fa-check"></i> &nbsp; Update Address', array('class' => 'btn btn-sm btn-success'));
}?>
<?php echo $this->Form->end(); ?>

