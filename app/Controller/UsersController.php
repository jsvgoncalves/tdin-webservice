<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


/**
 * beforeFilter method
 *
 * allows the add() action to be shown even without login.
 */
	function beforeFilter()	{
		parent::beforeFilter();
		$this->Auth->allow('add', 'login');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$users = $this->Paginator->paginate();
		//echo $this->request->params['ext'];
		$this->set(array(
			'users' => $users,
			'status' => $this->status,
			'_serialize' => array('status', 'users')
		));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$user = $this->User->find('first', $options);		
		$this->set(array(
			'user' => $user,
			'status' => $this->status,
			'_serialize' => array('status', 'user')
		));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		// If user is not logged in show the login layout.
		if(!$this->Auth->loggedIn()) {
			$this->layout = "login";
		}

		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'login'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


/**
 * List method.
 * Lists the open ticks of the given user.
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
/*	public function list($id = null) {
		if(!$id == null) {
			// Check if the user has access to this user's tickets
			// If not, then reassign the id to his own id. (from session)
		}

		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}*/

	public function login() {
		$this->layout = "login";
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash('Invalid email or password');
			}
		}
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

	public function mobileLogin() {
		$this->loadModel('Solver');
		$id = $this->Auth->user('id');
		if (!$this->Solver->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('Solver.' . $this->Solver->primaryKey => $id));
		$user = $this->Solver->find('first', $options);
		$this->set(array(
			'user' => $user,
			'status' => $this->status,
			'_serialize' => array('status', 'user')
		));
	}
}
