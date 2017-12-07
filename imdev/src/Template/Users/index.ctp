
	<?php echo $this->Form->create(); ?>
    <?php
        echo $this->Form->input('username');   //text
        echo $this->Form->input('password');   //password
        echo $this->Form->input('approved');   //day, month, year, hour, minute, meridian
        echo $this->Form->input('quote');      //textarea
        echo $this->Form->textarea('notes');
        echo $this->Form->select(
		    'field',
		    ['Ngô', 'Thị', 'Hồng', 'Nhung'],
		    ['empty' => 'Chọn']
		);
		echo $this->Form->checkbox('published', [
		    'value' => 'Y',
		    'hiddenField' => 'N',
		]);
		echo $this->Form->radio('gender', ['Ngô','Thị','Hồng','Nhung']);
		echo $this->Form->button('Đăng nhập');
    ?>