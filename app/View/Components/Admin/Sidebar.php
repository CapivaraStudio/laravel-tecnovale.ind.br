<?php

namespace App\View\Components\Admin;

use App\Models\Info;
use Illuminate\View\Component;

class Sidebar extends Component
{
  private $companyInfo;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Info $companyInfo)
    {
        $this->companyInfo = $companyInfo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
      $companyInfo = Info::all()->where('id', '1')->first();
      return view('admin.components.sidebar', [
        'companyInfo'=> $companyInfo
      ]);
    }
}
