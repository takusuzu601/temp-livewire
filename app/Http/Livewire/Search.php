<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
 

class Search extends Component
{
    use WithPagination;
    public $searchTerm;

    public function render()
    {
        
    	$query = '%'.$this->searchTerm.'%';

    	return view('livewire.search', [
    		'users'		=>	User::where(function($sub_query){
    							$sub_query->where('name', 'like', '%'.$this->searchTerm.'%')
    									  ->orWhere('email', 'like', '%'.$this->searchTerm.'%');
    						})->paginate(10)
    	]);
    }
}
