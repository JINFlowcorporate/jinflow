<?php

namespace App\Http\Livewire;

use App\Models\Image;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class BiensAdmin extends Component
{
    use WithPagination, WithFileUploads;

    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;
    public $name;
    public $about_fr;
    public $about_en;
    public $map;
    public $description_fr;
    public $description_en;
    public $nb_beds;
    public $type_id;
    public $nb_bathroom;
    public $zipcode;
    public $state;
    public $city;
    public $square_feet;
    public $rent_start_date;
    public $price;
    public $total_tokens;
    public $tokens_price;
    public $expected_yield;
    public $gross_rent_year;
    public $gross_rent_month;
    public $property_management;
    public $jinflow_tax;
    public $property_tax;
    public $insurance;
    public $net_rent_year;
    public $net_rent_month;
    public $yield_token;

    public $images_to_upload = [];
    public $images = [];

    public function uploadImages($id)
    {
        if (!empty($this->images_to_upload))
        {
            foreach ($this->images_to_upload as $key => $value)
            {
                $imageName = Storage::disk('public')->put('properties/' . $id, $value);
                Image::create(['image' => $imageName, 'biens_id' => $id]);
            }
        }
    }

    /**
     * The validation rules
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'about_fr' => 'required',
            'about_en' => 'required',
            'map' => 'required',
            'description_fr' => 'required',
            'description_en' => 'required',
            'type_id' => 'required|integer',
            'nb_beds' => 'required|integer',
            'nb_bathroom' => 'required',
            'zipcode' => 'required|integer',
            'state' => 'required|max:255',
            'city' => 'required|max:255',
            'square_feet' => 'required|max:255',
            'rent_start_date' => 'required|date',
            'price' => 'required',
            'total_tokens' => 'required|integer',
            'tokens_price' => 'required',
            'expected_yield' => 'required|integer',
            'gross_rent_year' => 'required|integer',
            'gross_rent_month' => 'required|integer',
            'property_management' => 'required|integer',
            'jinflow_tax' => 'required|integer',
            'property_tax' => 'required|integer',
            'insurance' => 'required|integer',
            'net_rent_year' => 'required|integer',
            'net_rent_month' => 'required|integer',
            'yield_token' => 'required|integer'
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
        $data = \App\Models\Biens::find($this->modelId);

        $this->name = $data->name;
        $this->about_fr = $data->translate('fr')->about;
        $this->about_en = $data->translate('en')->about;
        $this->map = $data->map;
        $this->description_fr = $data->translate('fr')->description;
        $this->description_en = $data->translate('en')->description;
        $this->nb_beds = $data->nb_beds;
        $this->type_id = $data->type_id;
        $this->nb_bathroom = $data->nb_bathroom;
        $this->zipcode = $data->zipcode;
        $this->state = $data->state;
        $this->city = $data->city;
        $this->square_feet = $data->square_feet;
        $this->rent_start_date = $data->rent_start_date;
        $this->price = $data->price;
        $this->total_tokens = $data->total_tokens;
        $this->tokens_price = $data->tokens_price;
        $this->expected_yield = $data->expected_yield;
        $this->gross_rent_year = $data->gross_rent_year;
        $this->gross_rent_month = $data->gross_rent_month;
        $this->property_management = $data->property_management;
        $this->jinflow_tax = $data->jinflow_tax;
        $this->property_tax = $data->property_tax;
        $this->insurance = $data->insurance;
        $this->net_rent_year = $data->net_rent_year;
        $this->net_rent_month = $data->net_rent_month;
        $this->yield_token = $data->yield_token;
        $this->images = $data->images;
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
            'name' => $this->name,
            'map' => $this->map,
            'slug' => Str::slug($this->name),
            'nb_beds' => $this->nb_beds,
            'type_id' => $this->type_id,
            'nb_bathroom' => $this->nb_bathroom,
            'fr' => [
                'about' => $this->about_fr,
                'description' => $this->description_fr
            ],
            'en' => [
                'about' => $this->about_en,
                'description' => $this->description_en
            ],
            'zipcode' => $this->zipcode,
            'state' => $this->state,
            'city' => $this->city,
            'square_feet' => $this->square_feet,
            'rent_start_date' => $this->rent_start_date,
            'price' => $this->price,
            'total_tokens' => $this->total_tokens,
            'tokens_price' => $this->tokens_price,
            'expected_yield' => $this->expected_yield,
            'gross_rent_year' => $this->gross_rent_year,
            'gross_rent_month' => $this->gross_rent_month,
            'property_management' => $this->property_management,
            'jinflow_tax' => $this->jinflow_tax,
            'property_tax' => $this->property_tax,
            'insurance' => $this->insurance,
            'net_rent_year' => $this->net_rent_year,
            'net_rent_month' => $this->net_rent_month,
            'yield_token' => $this->yield_token
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
        $bien = \App\Models\Biens::create($this->modelData());
        $this->uploadImages($bien->id);
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
        return \App\Models\Biens::orderBy('created_at', 'DESC')->paginate(5);
    }

    /**
     * The update function
     *
     * @return void
     */
    public function update()
    {
        $this->validate();
        \App\Models\Biens::find($this->modelId)->update($this->modelData());
        $this->uploadImages($this->modelId);
        $this->modalFormVisible = false;
    }

    /**
     * The delete function.
     *
     * @return void
     */
    public function delete()
    {
        $bien = \App\Models\Biens::where('id', $this->modelId)->first();

        foreach(Cart::content() as $row) {
            if ($row->name === $bien->name)
            {
                Cart::remove($row->rowId);
            }
        }

        if (Storage::exists('public/properties/' . $this->modelId))
        {
            Storage::deleteDirectory('public/properties/' . $this->modelId);
        }

        $bien->delete();
        $this->modalConfirmDeleteVisible = false;
        $this->reset();
    }

    public function deleteImage($id)
    {
        $image = Image::where('id', $id)->first();
        if (Storage::exists($image))
        {
            Storage::delete($image);
        }
        $image->delete();
        $this->images = Image::where('biens_id', $this->modelId)->get();
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
        return view('livewire.biens-admin', ['data' => $this->read()]);
    }
}
