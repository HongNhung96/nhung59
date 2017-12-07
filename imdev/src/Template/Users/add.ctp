
<?= $this -> Form -> create() ?>
<div class="form-group has-feedback" style="margin-left: 200px">
        <?= $this->Form->control('username', ['class' => 'form-control', 'placeholder' => 'Username', 'type' => 'text', 'label' => 'Username']) ?>
    </div>
    <div class="form-group has-feedback" style="margin-left: 200px">
        <?= $this->Form->control('password', ['class' => 'form-control', 'placeholder' => 'Password', 'type' => 'password', 'label' => 'Password']) ?>
    </div>
    <div class="form-group has-feedback" style="margin-left: 200px">
        <?= $this->Form->control('personal_email', ['class' => 'form-control', 'placeholder' => 'Personal email', 'type' => 'text', 'label' => 'Personal email']) ?>
    </div>
    <div class="form-group has-feedback" style="margin-left: 200px">
        <?= $this->Form->control('fullname', ['class' => 'form-control', 'placeholder' => 'Fullname', 'type' => 'text', 'label' => 'Fullname']) ?>
    </div>
    
    
    <div class="form-group has-feedback" style="margin-left: 200px">
        <?= $this->Form->control('group', ['class' => 'form-control', 'placeholder' => 'Group', 'type' => 'text', 'label' => 'Group']) ?>
    </div>
    
    <div class="form-group has-feedback" style="margin-left: 200px">
        <?= $this->Form->select(
		    'field',
		    ['HR', 'ADMIN', 'LEADERS', 'MANAGERS', 'MEMBERS'],
		    ['empty' => 'Role']
		); ?>
    </div>
    <div class="form-group has-feedback" style="margin-left: 200px">
        <?= $this->Form->control('slogan', ['class' => 'form-control', 'placeholder' => 'Slogan', 'type' => 'textarea', 'label' => 'Slogan']) ?>
    </div>
    <div class="col-xs-1" style="margin-left: 190px">
 		<?= $this->Form->button('Save', ['type' => "submit",'name' =>"save",'class' => 'btn btn-primary btn-block btn-flat']); ?>

        </div>
<?= $this -> Form -> end() ?>