<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShippedStock Model
 *
 * @property \App\Model\Table\AmazonSkusTable&\Cake\ORM\Association\BelongsTo $AmazonSkus
 * @property \App\Model\Table\ShipmentPlansTable&\Cake\ORM\Association\BelongsTo $ShipmentPlans
 *
 * @method \App\Model\Entity\ShippedStock get($primaryKey, $options = [])
 * @method \App\Model\Entity\ShippedStock newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ShippedStock[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ShippedStock|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShippedStock saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShippedStock patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ShippedStock[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ShippedStock findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ShippedStockTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('shipped_stock');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('AmazonSkus', [
            'foreignKey' => 'amazon_sku_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ShipmentPlans', [
            'foreignKey' => 'shipment_plan_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['amazon_sku_id'], 'AmazonSkus'));
        $rules->add($rules->existsIn(['shipment_plan_id'], 'ShipmentPlans'));

        return $rules;
    }
}
