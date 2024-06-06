<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LibriRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class LibriCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class LibriCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Libri::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/libri');
        CRUD::setEntityNameStrings('libri', 'libri');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('titolo_libro')->label('Titolo');
        CRUD::column('autore');
        CRUD::column('editore');
        CRUD::column('sinossi');
        CRUD::column('codice_isbn');
        // CRUD::column('categoria')->type('select');


        CRUD::column('prestabile')->type('boolean');


    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(LibriRequest::class);
        CRUD::field('titolo_libro')->label('Titolo');
        CRUD::field('autore');
        CRUD::field('editore');
        CRUD::field('sinossi');
        CRUD::field('codice_isbn');

        CRUD::addField([ // relazione 1-n ricercabile
            'label' => 'Categoria', // label HTML
            'allows_null' => true, // lascia spazio vuoto in testa alla tendina
            'type' => 'select',
            'name' => 'categorie_id', // colonna FK
            'entity' => 'categorie', // nome del metodo nel model
            'attribute' => 'categoria', // campo mostrato nella tendina
            'model' => 'App\Models\Categorie', // model del foreign
            ]);

        CRUD::field('prestabile')->type('boolean');
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
