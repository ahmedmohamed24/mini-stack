<?php

namespace App\Http\Livewire\User;

use App\Models\Tag;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $moreTags=Tag::select('id','popularity','title')->limit(10)->get();
        return view('user.home',['moreTags'=>$moreTags]);
    }
}
