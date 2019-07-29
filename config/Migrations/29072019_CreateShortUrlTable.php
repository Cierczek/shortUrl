<?php

use Cake\Console\ConsoleIo;
use Phinx\Migration\AbstractMigration;

class CreateShortUrlTable extends AbstractMigration
{
    public function change()
    {

        $console = new ConsoleIo();
        $console->out('Create Short Url Table', 0);

        $table = $this->table('short_url');
        $table->addColumn('hash', 'string', [
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('orginal_url', 'string', [
            'limit' => 512,
            'null' => false,
        ]);
        $table->addColumn('short_url', 'string', [
            'limit' => 512,
            'null' => false,
        ]);
        $table->addColumn('visits', 'integer', [
            'default' => '0',
            'null' => false,
        ]);
        $table->create();
        $console->success('...OK');
    }

}