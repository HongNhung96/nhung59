<!-- 
<div id="loginbox"  class="col-md-5 col-sm-12">
                  
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title" style="text-align: center;">JVB System</div>
                        
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" action="login.php" method="POST" name="form">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="username" type="text" class="form-control" name="username1" value="" placeholder="Tên">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="password" type="password" class="form-control" name="password1" placeholder="Mật khẩu">
                                    </div>
                                    

                                
                            <div class="input-group">
                                      <div class="checkbox">
                                      	<div class="col-md-12">
                                          <input id="checkbox" type="checkbox" name="remember" value="1"> Ghi nhớ mật khẩu
                                        </div>
                                      </div>
                                    </div>


                                <div style="margin-top:10px; margin-left: 32%;" class="form-group">
                                    <div class="col-sm-12 controls">
                                      <button type="submit"  id="btn-login" name="login" placeholder="Đăng nhập" onclick="loginfunction()">Đăng nhập</button>
                                    </div>
                                </div>   
                            </form>     
                        </div>                     
                    </div> 
                </div>
 -->

 
<?= $this->Form->create() ?>
    <div class="form-group has-feedback">
        <?= $this->Form->control('username', ['class' => 'form-control', 'placeholder' => 'Username', 'type' => 'text', 'label' => false]) ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <?= $this->Form->control('password', ['class' => 'form-control', 'placeholder' => 'Password', 'type' => 'password', 'label' => false]) ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
        <div >
        <?= $this->Flash-> render(); ?>
        <?= $this -> fetch('content'); ?>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <?= $this->Form->button('Login', ['type' => "submit",'name' =>"login",'class' => 'btn btn-primary btn-block btn-flat']); ?>
        </div>
        <!-- /.col -->
    </div>
<!--</form>-->
<?= $this->Form->end() ?>

