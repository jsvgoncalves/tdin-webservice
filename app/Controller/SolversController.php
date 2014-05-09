<?php
App::uses('AppController', 'Controller');
/**
 * Solvers Controller
 *
 * @property Solver $Solver
 * @property PaginatorComponent $Paginator
 */
class SolversController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Solver->recursive = 0;
		$this->set('solvers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Solver->exists($id)) {
			throw new NotFoundException(__('Invalid solver'));
		}
		$options = array('conditions' => array('Solver.' . $this->Solver->primaryKey => $id));
		$this->set('solver', $this->Solver->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Solver->create();
			if ($this->Solver->save($this->request->data)) {
				$this->Session->setFlash(__('The solver has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The solver could not be saved. Please, try again.'));
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
		if (!$this->Solver->exists($id)) {
			throw new NotFoundException(__('Invalid solver'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Solver->save($this->request->data)) {
				$this->Session->setFlash(__('The solver has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The solver could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Solver.' . $this->Solver->primaryKey => $id));
			$this->request->data = $this->Solver->find('first', $options);
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
		$this->Solver->id = $id;
		if (!$this->Solver->exists()) {
			throw new NotFoundException(__('Invalid solver'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Solver->delete()) {
			$this->Session->setFlash(__('The solver has been deleted.'));
		} else {
			$this->Session->setFlash(__('The solver could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
