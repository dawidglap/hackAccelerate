<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class ShowUserDetails extends Component
{
  
      public $id;
      public $email;
      public $created_at_qui;
      public $title;
    


    public function __construct($title)
    {
        
       $this->id = Auth::user()->id;
       $this->email = Auth::user()->email;
       $this->created_at_qui = Auth::user()->created_at;
    }


    public function render()
    {
        return view('components.show-user-details');
    }
}
