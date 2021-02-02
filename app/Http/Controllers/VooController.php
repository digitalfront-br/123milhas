<?php

namespace App\Http\Controllers;

use App\Models\Voo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VooController extends Controller
{
    public function index()
    {
        $externalData = Http::get('http://prova.123milhas.net/api/flights')->json();
        foreach ($externalData as $value) {
            Voo::firstOrCreate($value);
        }
        return Voo::all();
    }
}
