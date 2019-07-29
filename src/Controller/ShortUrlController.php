<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;

/**
 * ShortUrl Controller
 *
 * @property \App\Model\Table\ShortUrlTable $ShortUrl
 *
 * @method \App\Model\Entity\ShortUrl[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShortUrlController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Security->setConfig('unlockedActions', ['add']);

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $shortUrl = $this->paginate($this->ShortUrl, ['limit'=>10]);

        $this->set(compact('shortUrl'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shortUrl = $this->ShortUrl->newEntity();
        if ($this->request->is('ajax')) {
            $shortUrl = $this->ShortUrl->patchEntity($shortUrl, $this->request->getData());
            $shortUrl->hash = md5($shortUrl->orginal_url);
            $shortUrl->short_url = Router::url('/', true) . 'check' . DS . $shortUrl->hash;
            if ($this->ShortUrl->save($shortUrl)) {
                return $this->getResponse()->withType("application/json")->withStringBody(json_encode($data = ['message' => 'The short url has been saved.', 'shortUrl' => $shortUrl]));
            }
            return $this->getResponse()->withType("application/json")->withStringBody(json_encode($data = ['error' => 'The short url could not be saved. Please, try again.']));
        }
        $this->set(compact('shortUrl'));

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function check($hash)
    {
        $urlData = $this->ShortUrl->findByHash($hash)->first();
        $urlData->visits++;

        if ($this->ShortUrl->save($urlData)) {
            return $this->redirect($urlData->orginal_url);
        } else {
            return $this->redirect('/');
        }


    }


    /**
     * Delete method
     *
     * @param string|null $id Short Url id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shortUrl = $this->ShortUrl->get($id);
        if ($this->ShortUrl->delete($shortUrl)) {
            $this->Flash->success(__('The short url has been deleted.'));
        } else {
            $this->Flash->error(__('The short url could not be deleted. Please, try again.'));
        }

        return $this->redirect('/');
    }
}
