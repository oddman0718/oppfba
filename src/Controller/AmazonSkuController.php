<?php
namespace App\Controller;

use App\Model\Entity\AmazonSku;
use App\Model\Table\AmazonSkuTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Datasource\ResultSetInterface;
use Cake\Http\Response;

/**
 * AmazonSku Controller
 *
 * @property AmazonSkuTable $AmazonSku
 *
 * @method AmazonSku[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class AmazonSkuController extends AppController
{
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $amazonSku = $this->paginate($this->AmazonSku);

        $this->set(compact('amazonSku'));
    }

    /**
     * View method
     *
     * @param string|null $id Amazon Sku id.
     * @return void
     */
    public function view($id = null)
    {
        $amazonSku = $this->AmazonSku->get($id, [
            'contain' => ['ShippedStock']
        ]);

        $this->set('amazonSku', $amazonSku);
    }

    /**
     * Add method
     *
     * @return Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $amazonSku = $this->AmazonSku->newEntity();
        if ($this->request->is('post')) {
            $amazonSku = $this->AmazonSku->patchEntity($amazonSku, $this->request->getData());
            if ($this->AmazonSku->save($amazonSku)) {
                $this->Flash->success(__('The amazon sku has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The amazon sku could not be saved. Please, try again.'));
        }
        $this->set(compact('amazonSku'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Amazon Sku id.
     * @return Response|null Redirects on successful edit, renders view otherwise.
     * @throws RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $amazonSku = $this->AmazonSku->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $amazonSku = $this->AmazonSku->patchEntity($amazonSku, $this->request->getData());
            if ($this->AmazonSku->save($amazonSku)) {
                $this->Flash->success(__('The amazon sku has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The amazon sku could not be saved. Please, try again.'));
        }
        $this->set(compact('amazonSku'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Amazon Sku id.
     * @return Response|null Redirects to index.
     * @throws RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $amazonSku = $this->AmazonSku->get($id);
        if ($this->AmazonSku->delete($amazonSku)) {
            $this->Flash->success(__('The amazon sku has been deleted.'));
        } else {
            $this->Flash->error(__('The amazon sku could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
