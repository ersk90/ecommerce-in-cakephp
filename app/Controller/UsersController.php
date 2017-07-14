<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {

////////////////////////////////////////////////////////////

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login');
    }

////////////////////////////////////////////////////////////

    public function login($id=null) {

        //echo AuthComponent::password('admin');

        if ($this->request->is('post')) {

			$target = $this->request->data['User']['targetPage'];
			$targetArray = array('brands','categories','products','search');

            if($this->Auth->login()) {
                $this->User->id = $this->Auth->user('id');
                $this->User->saveField('logins', $this->Auth->user('logins') + 1);
                $this->User->saveField('last_login', date('Y-m-d H:i:s'));
				        $this->Session->write('id',$this->User->id);
                if ($this->Auth->user('role') == 'customer') {
					$allRecord = $this->User->read(null,$this->User->id);
					foreach($allRecord as $na) { $name =  $na['name']; }
					$this->Session->write('name',$name);
					if(in_array($target,$targetArray))
					{
						return $this->redirect([
							'controller'=>$target,
							'action'=>'index'
							]);
					}
					else
					{
						return $this->redirect(array(
                        'controller' => 'products',
                        'action' => 'view'
                    ));
					}
					if($id==2)
					{
						return $this->redirect(['controller'=>'shop','action'=>'cart']);
					}
                    return $this->redirect(array(
                        'controller' => 'users',
                        'action' => 'dashboard',
                        'customer' => true,
                        'admin' => false
                    ));
                } elseif ($this->Auth->user('role') == 'admin') {
                    return $this->redirect(array(
                        'controller' => 'users',
                        'action' => 'dashboard',
                        'manager' => false,
                        'admin' => true
                    ));
                } else {
                    $this->Flash->danger('Login is incorrect');
                }
            } else {
                $this->Flash->danger('Login is incorrect');
            }

		}
			$this->set('id',$id);
	}



////////////////////////////////////////////////////////////
    public function logout() {
        $this->Flash->flash('Good-Bye');
        $_SESSION['KCEDITOR']['disabled'] = true;
        unset($_SESSION['KCEDITOR']);
		unset($_SESSION['id']);
		unset($_SESSION['name']);
        return $this->redirect($this->Auth->logout());
    }


////////////////////////////////////////////////////////////

    public function admin_dashboard() {
		$this->User->id = $this->Session->read('id');
		if(!$this->User->exists())
		{
			throw new NotFoundException('Invalid user');
		}

		$this->set('user',$this->User->read(null,$this->User->id));

    }

////////////////////////////////////////////////////////////

    public function admin_index() {

        $this->Paginator = $this->Components->load('Paginator');

        $this->Paginator->settings = array(
            'User' => array(
                'recursive' => -1,
                'contain' => array(
                ),
                'conditions' => array(
                ),
                'order' => array(
                    'Users.name' => 'ASC'
                ),
                'limit' => 20,
                'paramType' => 'querystring',
            )
        );
        $users = $this->Paginator->paginate();
        $this->set(compact('users'));
    }

////////////////////////////////////////////////////////////

    public function admin_view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException('Invalid user');
        }
        $this->set('user', $this->User->read(null, $id));
    }

////////////////////////////////////////////////////////////

    public function admin_add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->flash('The user has been saved');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->flash('The user could not be saved. Please, try again.');
            }
        }
    }

////////////////////////////////////////////////////////////

    public function admin_edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException('Invalid user');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->flash('The user has been saved');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->flash('The user could not be saved. Please, try again.');
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }
    }


////////////////////////////////////////////////////////////

    public function admin_password($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException('Invalid user');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->flash('The user has been saved');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->flash('The user could not be saved. Please, try again.');
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }
    }

////////////////////////////////////////////////////////////

    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException('Invalid user');
        }
        if ($this->User->delete()) {
            $this->Flash->flash('User deleted');
            return $this->redirect(array('action'=>'index'));
        }
        $this->Flash->flash('User was not deleted');
        return $this->redirect(array('action' => 'index'));
    }

////////////////////////////////////////////////////////////


    public function customer_dashboard() {
		$this->User->id = $this->Session->read('id');
		if(!$this->User->exists())
		{
			throw new NotFoundException('Invalid user');
		}

		$this->set('user',$this->User->read(null,$this->User->id));
    }

////////////////////////////////////////////////////////////

	public function register()
	{
		if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->flash('The user has been saved');
                return $this->redirect(array('action' => 'login'));
            } else {
                $this->Flash->flash('The user could not be saved. Please, try again.');
            }
        }
	}

////////////////////////////////////////////////////////////
   public function customer_edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException('Invalid user');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->flash('The user has been saved');
                return $this->redirect(array('action' => 'dashboard'));
            } else {
                $this->Flash->flash('The user could not be saved. Please, try again.');
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }
    }

////////////////////////////////////////////////////////////

  public function customer_logout() {
        $this->Flash->flash('Good-Bye');
        $_SESSION['KCEDITOR']['disabled'] = true;
        unset($_SESSION['KCEDITOR']);
        return $this->redirect($this->Auth->logout());
    }

////////////////////////////////////////////////////////////

public function change_password()
{
    if ($this->request->is('post')) {
        $old_pass = $this->request->data['User']['password'];
        $new_pass = $this->request->data['User']['NewPassword'];
        $confirm_pass = $this->request->data['User']['ConfirmPassword'];
        if($new_pass != $confirm_pass)
        {
            $this->Flash->error(__("Password is mismatch"));
        }
        else
        {
            $d_pass = $this->User->query('select password from users where id ='.$this->Session->read('id'));
            if(AuthComponent::password($old_pass) == $d_pass[0]['users']['password'])
            {
                $new_pass = AuthComponent::password($new_pass);
                $run = $this->User->query('update users set password ="'.$new_pass.'"where id ='.$this->Session->read('id'));
                    echo $this->Flash->success(__('Password is updating success'));
            }
            else
            {
                $this->Flash->error(__('Old Password is not correct'));
            }

        }
    }
}

////////////////////////////////////////////////////////////

public function customer_change_password()
{
    if ($this->request->is('post')) {
        $old_pass = $this->request->data['User']['password'];
        $new_pass = $this->request->data['User']['NewPassword'];
        $confirm_pass = $this->request->data['User']['ConfirmPassword'];
        if($new_pass != $confirm_pass)
        {
            $this->Flash->error(__("Password is mismatch"));
        }
        else
        {
            $d_pass = $this->User->query('select password from users where id ='.$this->Session->read('id'));
            if(AuthComponent::password($old_pass) == $d_pass[0]['users']['password'])
            {
                $new_pass = AuthComponent::password($new_pass);
                $run = $this->User->query('update users set password ="'.$new_pass.'"where id ='.$this->Session->read('id'));
                    echo $this->Flash->success(__('Password is updating success'));
            }
            else
            {
                $this->Flash->error(__('Old Password is not correct'));
            }

        }
    }
}

}
