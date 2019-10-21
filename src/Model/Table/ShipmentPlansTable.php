<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShipmentPlans Model
 *
 * @property \App\Model\Table\CreatersTable&\Cake\ORM\Association\BelongsTo $Creaters
 * @property \App\Model\Table\WorkersTable&\Cake\ORM\Association\BelongsTo $Workers
 * @property \App\Model\Table\ShippedStockTable&\Cake\ORM\Association\HasMany $ShippedStock
 *
 * @method \App\Model\Entity\ShipmentPlan get($primaryKey, $options = [])
 * @method \App\Model\Entity\ShipmentPlan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ShipmentPlan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ShipmentPlan|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShipmentPlan saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShipmentPlan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ShipmentPlan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ShipmentPlan findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ShipmentPlansTable extends Table
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

        $this->setTable('shipment_plans');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Creaters', [
            'foreignKey' => 'creater_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Workers', [
            'foreignKey' => 'worker_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ShippedStock', [
            'foreignKey' => 'shipment_plan_id'
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
            ->scalar('amazon_inbound_shipment_code')
            ->maxLength('amazon_inbound_shipment_code', 255)
            ->allowEmptyString('amazon_inbound_shipment_code')
            ->add('amazon_inbound_shipment_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('amazon_inbound_shipment_name')
            ->maxLength('amazon_inbound_shipment_name', 255)
            ->allowEmptyString('amazon_inbound_shipment_name');

        $validator
            ->integer('packages')
            ->allowEmptyString('packages');

        $validator
            ->scalar('warehouse_code')
            ->maxLength('warehouse_code', 255)
            ->allowEmptyString('warehouse_code');

        $validator
            ->integer('work_point')
            ->requirePresence('work_point', 'create')
            ->notEmptyString('work_point');

        $validator
            ->scalar('status')
            ->maxLength('status', 255)
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

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
        $rules->add($rules->isUnique(['amazon_inbound_shipment_code']));
        $rules->add($rules->existsIn(['creater_id'], 'Creaters'));
        $rules->add($rules->existsIn(['worker_id'], 'Workers'));

        return $rules;
    }
}
