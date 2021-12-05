<?php

namespace App\Http\Livewire;

use App\Models\Type;
use Livewire\Component;
use Livewire\WithPagination;

class TypesAdmin extends Component
{
    use WithPagination;

    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;
    public $name_fr;
    public $name_en;

    /**
     * The validation rules
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name_fr' => 'required|max:255',
            'name_en' => 'required|max:255'
        ];
    }

    /**
     * Loads the model data
     * of this component.
     *
     * @return void
     */
    public function loadModel()
    {
        $data = \App\Models\Type::find($this->modelId);

        $this->name_fr = $data->translate('fr')->name;
        $this->name_en = $data->translate('en')->name;
    }

    /**
     * The data for the model mapped
     * in this component.
     *
     * @return array
     */
    public function modelData(): array
    {
        return [
            'fr' => [
                'name' => $this->name_fr,
            ],
            'en' => [
                'name' => $this->name_en,
            ]
        ];
    }

    /**
     * The create function.
     *
     * @return void
     */
    public function create()
    {
        $this->validate();
        \App\Models\Type::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
    }

    /**
     * The read function.
     *
     * @return void
     */
    public function read()
    {
        return \App\Models\Type::orderBy('created_at', 'DESC')->paginate(5);
    }

    /**
     * The update function
     *
     * @return void
     */
    public function update()
    {
        $this->validate();
        \App\Models\Type::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }

    /**
     * The delete function.
     *
     * @return void
     */
    public function delete()
    {
        $type = \App\Models\Type::where('id', $this->modelId)->first();
        $type->delete();
        $this->modalConfirmDeleteVisible = false;
        $this->reset();
    }

    /**
     * Shows the create modal
     *
     * @return void
     */
    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

    /**
     * Shows the form modal
     * in update mode.
     *
     * @param  mixed $id
     * @return void
     */
    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
        $this->modelId = $id;
        $this->loadModel();
    }

    /**
     * Shows the delete confirmation modal.
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }

    public function render()
    {
        return view('livewire.types-admin', ['data' => $this->read()]);
    }
}
