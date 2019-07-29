<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShortUrl Model
 *
 * @method \App\Model\Entity\ShortUrl get($primaryKey, $options = [])
 * @method \App\Model\Entity\ShortUrl newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ShortUrl[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ShortUrl|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShortUrl saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShortUrl patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ShortUrl[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ShortUrl findOrCreate($search, callable $callback = null, $options = [])
 */
class ShortUrlTable extends Table
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

        $this->setTable('short_url');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('hash')
            ->maxLength('hash', 255)
            ->requirePresence('hash', 'create')
            ->notEmptyString('hash');

        $validator
            ->scalar('orginal_url')
            ->maxLength('orginal_url', 512)
            ->requirePresence('orginal_url', 'create')
            ->notEmptyString('orginal_url');

        $validator
            ->scalar('short_url')
            ->maxLength('short_url', 512)
            ->requirePresence('short_url', 'create')
            ->notEmptyString('short_url');

        $validator
            ->integer('visits')
            ->notEmptyString('visits');

        return $validator;
    }

}
