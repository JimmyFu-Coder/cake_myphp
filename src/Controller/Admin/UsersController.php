<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Users Controller
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
//    public  function  login()
//    {
//
//        if($this->request->is('post')){
//            $user = $this->Auth->identify();
//            if($user){
//                $this->Auth->setUser($user);
//                $this->UserLogs->saveIP($this->Auth->user('id'));
//                if($user['status'] == 0)
//                {
//                    $this->Flash->error('you have not get the permission !');
//                    return $this->redirect(['controller'=>'Users', 'action'=>'logout']);
//                }
//                return $this->redirect(['controller'=>'Users', 'action'=>'index']);
//            }else{
//                $this->Flash->error('Incorrect username or password !');
//            }
//        }
//    }
    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            // redirect to /articles after login success

            return $this->redirect(['Controller'=>"Users", 'action'=>'index']);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }
    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
    public function index()
    {
        $key = $this->request->getQuery('key');
        if($key){
            $query = $this->Users->findByUsernameOrEmail($key, $key);
        }else{
            $query = $this->Users;
        }
        $users = $this->paginate($query,['contain'=>['Profiles', 'Skills']]);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if(!$user->getErrors){
                $image = $this->request->getData('image_file');

                $name = $image -> getClientFilename();

                if(!is_dir(WWW_ROOT.'img'.DS.'user-img'))
                    mkdir(WWW_ROOT.'img'.DS.'user-img', 0775);

                $targetPath = WWW_ROOT.'img'.DS.'user-img'.DS.$name;

                if($name)
                    $image->moveTo($targetPath);

                $user->image ='user-img/'.$name;
            }


            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if (!$user->getErrors) {
                $image = $this->request->getData('change_image');

                $name  = $image->getClientFilename();

                if ($name){
                    if (!is_dir(WWW_ROOT . 'img' . DS . 'user-img'))
                        mkdir(WWW_ROOT . 'img' . DS . 'user-img', 0775);

                    $targetPath = WWW_ROOT . 'img' . DS . 'user-img' . DS . $name;


                    $image->moveTo($targetPath);

                    $imgpath = WWW_ROOT . 'img' . DS . $user->image;
                    if (file_exists($imgpath)) {
                        unlink($imgpath);
                    }

                    $user->image = 'user-img/' . $name;
                }


            }

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);

        $imgpath = WWW_ROOT.'img'.DS.$user->image;

        if ($this->Users->delete($user)) {
            if(file_exists($imgpath)){
                unlink($imgpath);
            }
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function deleteAll(){

        $this ->request ->allowMethod(['post', 'delete']);
        $ids = $this->request->getData('ids');

        if($this->Users->deleteAll(['Users.id IN'=>$ids])){
            $this->Flash->success(__('The useres has been deleted.'));
        }

        return $this->redirect(['action'=>'index']);
    }
    public  function userStatus($id = null, $status)
    {
        $this ->request ->allowMethod(['post']);
        $user = $this->Users->get($id);
        if($status == 1)
            $user->status = 0;
        else
            $user->status = 1;

        if($this->Users->save($user))
        {
            $this->Flash->success(__('The users status has changed'));
        }
        return $this-> redirect(['action' => 'index']);
    }

    public function receive()
    {
        $id = $this->request->getData('id');

    }
}
