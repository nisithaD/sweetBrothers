<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\visitors;
use Livewire\Component;
use Spatie\Sitemap\SitemapGenerator;

class Index extends Component
{
    public $visitors;
    public $views;
    public $mytime;


    public function mount()
    {
        $this->mytime = \Carbon\Carbon::today('Europe/London')->format('Y/m/d');
        $this->visitors = visitors::whereDate('created_at', '=', $this->mytime)->count();
        $this->views = visitors::whereDate('created_at', '=', $this->mytime)->sum('requests');
    }

    public function generateSiteMap(){
        SitemapGenerator::create(url(''))->writeToFile(public_path('sitemap.xml'));
    }

    public function render()
    {
        return view('livewire.admin.dashboard.index')->extends('admin.layouts.main');
    }
}
