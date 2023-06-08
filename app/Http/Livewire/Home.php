<?php

namespace App\Http\Livewire;

use App\Modules\Products\Model\Product;
use Livewire\Component;

class Home extends Component
{
    public $search;

    protected $queryString = ['search'];

    public function productDetails($product_id)
    {
        return redirect()->route('product.show',['product' => $product_id]);
    }
    public function render()
    {
        return view('livewire.home',[
            'products' => Product::with(['translation', 'restaurant'])
                ->whereRelation('translation','name','like',"%{$this->search}%")
                ->orWhereRelation('restaurant', 'name', 'like', "%{$this->search}%")
                ->get()
            ]);
    }
}
