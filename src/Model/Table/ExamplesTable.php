<?php

namespace App\Model\Table;

class ExamplesTable extends \Cake\ORM\Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        // Table name is still required
        $this->setTable('examples');

        // Define schema manually (no DB needed)
        $schema = new \Cake\Database\Schema\TableSchema('examples');
        $schema
            ->addColumn('address', [
                'type' => 'string',
                'length' => 255,
                'null' => false,
            ]);

        $this->setSchema($schema);
    }
}
