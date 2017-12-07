<?php
	namespace App\Controller;
	use Cake\Controller\Controller;
	use Cake\ORM\Table;
	use Cake\Validation\Validator;
	use Cake\ORM\TableRegistry;
	use Cake\ORM\Query;
	use Cake\Datasource\ConnectionManager;
  use Cake\Auth\DefaultPasswordHasher;
	class UsersController extends AppController
	{
		public function initialize(){
			parent::initialize();
			$this->loadComponent('Data');
			$components = array('Data');
      /*$this->belongsToMany('UserGroupTbl',['joinTable'=>'user_group_tbl']);
      $this->belongsToMany('UserRoleTbl',['joinTable'=>'user_role_tbl']);*/
		}
		function list2() {
			$userTable = TableRegistry::get('UserTbl');
			// $connection = ConnectionManager::get('default');
			// $data=$userTable->find('all', [
			// 	'conditions' => ['user_tbl.user_id= user_group_tbl.user_id' , 'user_tbl.user_id=user_role_tbl.user_id']
			// 	]);
   //    		print_r($data);
		$roleTable = TableRegistry::get('RoleMst');
		$role = $roleTable->find('list', ['keyField' => 'role_id', 'valueField' => 'value'])->toArray();
		$groupTable = TableRegistry::get('GroupTbl');
		$group = $groupTable->find('list', ['keyField' => 'group_id', 'valueField' => 'name'])->toArray();

      	$data =$userTable->find('all')
      		->select([
            'UserTbl.personal_email',
            'UserTbl.fullname',
            'UserTbl.slogan',
            'UserRole.role_id',
            'UserGroup.group_id'
        ])
        ->join([
        	[
            'table' => 'user_group_tbl',
            'alias' => 'UserGroup',
            'type' => 'LEFT',
            'conditions' => 'UserTbl.user_id= UserGroup.user_id' ,
        	],
        	[
            'table' => 'user_role_tbl',
            'alias' => 'UserRole',
            'type' => 'LEFT',
            'conditions' => 'UserRole.user_id = UserTbl.user_id',
        	]
        ])
        ->toArray();
        // foreach ($data as $key => $value) {
        // 	print_r($role[$value['UserRole']['role_id']]);
        // }
      		/*$data=$connection
      		->execute('SELECT user_tbl.personal_email, user_tbl.fullname, user_tbl.slogan, user_group_tbl.group_id, user_role_tbl.role_id FROM user_tbl,user_group_tbl, user_role_tbl WHERE user_tbl.user_id=user_group_tbl.user_id and user_tbl.user_id=user_role_tbl.user_id')
      		->fetchAll('assoc');*/
      		
   			$this->set("data" , $data);
   			$this->set('role', $role);
   			$this->set('group', $group);
      		
		}
    function add(){
        $userTable=TableRegistry::get('UserTbl');
        $usertable=$userTable->newEntity();
        $roleTable=TableRegistry::get('RoleMst');
        $role=$roleTable->find('list',['keyField'=>'role_id','valueField'=>value])->toArray();
        $groupTable=TableRegistry::get('GroupTbl');
        $group=$groupTable->find('list',['keyField'=>'group_id','valueField'=>'value'])->toArray();
       /* $usertable=$userTable->newEntity($this->request->data());
        print_r($usertable);die;*/
        if($this->request->is('post')){
          $data=$this->request->data;
          // print_r($data);die;
          $user ['username']  = isset($data['username']) ? $data['username'] :null;
          $password = isset($data['password']) ? $data['password'] :null;
          $hasher = new DefaultPasswordHasher();
          $newpass=$hasher->hash($password);
          $user['password'] = $newpass;
          
          $user ['personal_email'] = isset($data['personal_email']) ? $data['personal_email'] :null;
          
          $user ['fullname'] = isset($data['fullname']) ? $data['fullname'] :null;
          $user['group'] = isset($data['group']) ? $data['group'] :null;
          $user['role'] = isset($data['role']) ? $data['role'] :null;
          $user ['slogan'] = isset($data['slogan']) ? $data['slogan'] :null;
          $user = $userTable -> patchEntity($usertable,$user);
          print_r($user);
          $message=[];
          foreach ($user -> errors() as $value) {
            foreach ($value as $value1) {
              $message[]=$value1;
            }
          }
          if(!empty($message)){
            $this->Flash->error($message);
          }else{
          if($userTable -> save($user)){
              return $this -> redirect(['action' =>'list2']);
          }
        }
        }
    }
    function delete(){
      $userTable = TableRegistry::get('UserTbl');
      $user=$userTable->find()->where(['user_id' => $id])->first();
    }
		function login(){

			$this->viewBuilder()->layout('loginLayout');
			// $this->Layout='loginLayout';
			// $userTable = TableRegistry::get('Users');
		   	// $data = $userTable->find('all')->select('username')->toArray();
		   // 	$data=$userTable->find('all')->toArray();
		   // print_r($data);
      $userTable = TableRegistry::get('UserTbl');
      $usertable = $userTable -> newEntity();
      if($this -> request -> is('post')){
        $data = $this -> request ->data;
        $user = [];
        $user['username']=isset($data['username']) ? $data['username'] : null;
        $user['password']= isset($data['password']) ? $data['password'] : null;
        $user = $userTable -> patchEntity($usertable,$user);
          $message=[];
          foreach ($user -> errors() as $value) {
            foreach ($value as $value1) {
              $message[]=$value1;
            }
          }
          if(!empty($message)){
            $this->Flash->error($message);
          }else{
            $user = $this->Auth->identify();
            if ($user) {
              $this->Auth->setUser($user);
              return $this-> redirect('/users/list2');
            }
            $this->Flash->error(__('Invalid username or password, try again'));
          }
          
        }
      
//auth:xac thuc nguoi dung

		}
    function logout(){
            $this->Auth->logout();
            return $this-> redirect('/users/login');
        }
    function index(){

    }

		/*var $components = array("Common");
     
    function test_component(){
        $string = "Diễn đàn QHonline . Nơi khơi nguồn các mã nguồn mở "; // chuỗi ban đầu
        $data = $this->Common->unicode_convert($string); // dữ liệu sau khi chuyển đổi không dấu
        $this->set("data",$data); // gán dữ liệu để hiển thị bên view 
    }*/

    // public $uses = array();
    // public $components = array('Common');
    public function test(){
    	
    	$data = $this ->Data ->match();
    	$this->set("data",$data);
    }
    
	}
	
?>