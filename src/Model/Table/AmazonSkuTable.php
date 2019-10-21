<?php
namespace App\Model\Table;

use App\Model\Entity\AmazonSku;
use Cake\Datasource\EntityInterface;
use Cake\ORM\Association\HasMany;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AmazonSku Model
 *
 * @property ShippedStockTable&HasMany $ShippedStock
 *
 * @method AmazonSku get($primaryKey, $options = [])
 * @method AmazonSku newEntity($data = null, array $options = [])
 * @method AmazonSku[] newEntities(array $data, array $options = [])
 * @method AmazonSku|false save(EntityInterface $entity, $options = [])
 * @method AmazonSku saveOrFail(EntityInterface $entity, $options = [])
 * @method AmazonSku patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method AmazonSku[] patchEntities($entities, array $data, array $options = [])
 * @method AmazonSku findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin TimestampBehavior
 */
class AmazonSkuTable extends Table
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

        $this->setTable('amazon_sku');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ShippedStock', [
            'foreignKey' => 'amazon_sku_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param Validator $validator Validator instance.
     * @return Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('display_string')
            ->maxLength('display_string', 255)
            ->requirePresence('display_string', 'create')
            ->notEmptyString('display_string')
            ->add('display_string', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('amazon_sku')
            ->maxLength('amazon_sku', 255)
            ->requirePresence('amazon_sku', 'create')
            ->notEmptyString('amazon_sku')
            ->add('amazon_sku', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('fn_sku')
            ->maxLength('fn_sku', 255)
            ->requirePresence('fn_sku', 'create')
            ->notEmptyString('fn_sku')
            ->add('fn_sku', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('product_model')
            ->maxLength('product_model', 255)
            ->requirePresence('product_model', 'create')
            ->notEmptyString('product_model');

        $validator
            ->integer('quantity_contained')
            ->requirePresence('quantity_contained', 'create')
            ->notEmptyString('quantity_contained');

        $validator
            ->integer('unit_work_point')
            ->requirePresence('unit_work_point', 'create')
            ->notEmptyString('unit_work_point');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param RulesChecker $rules The rules object to be modified.
     * @return RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['display_string']));
        $rules->add($rules->isUnique(['amazon_sku']));
        $rules->add($rules->isUnique(['fn_sku']));

        return $rules;
    }
}
