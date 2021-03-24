<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class FirstMigration extends AbstractMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up()
    {
        $this->table('commentaires')
            ->addColumn('image_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('comment', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('created', 'datetimefractional', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'precision' => 6,
                'scale' => 6,
            ])
            ->addColumn('modified', 'datetimefractional', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'precision' => 6,
                'scale' => 6,
            ])
            ->create();

        $this->table('images')
            ->addColumn('name', 'string', [
                'default' => '',
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('description', 'string', [
                'default' => '',
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('width', 'integer', [
                'default' => '0',
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('height', 'integer', [
                'default' => '0',
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetimefractional', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'precision' => 6,
                'scale' => 6,
            ])
            ->addColumn('modified', 'datetimefractional', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'precision' => 6,
                'scale' => 6,
            ])
            ->create();

        $this->table('users')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('lastname', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->create();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down()
    {
        $this->table('commentaires')->drop()->save();
        $this->table('images')->drop()->save();
        $this->table('users')->drop()->save();
    }
}
