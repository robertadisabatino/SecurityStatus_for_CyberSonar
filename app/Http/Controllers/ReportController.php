<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{

    public function homepage() {
        return view('welcome');
    }

    public function index()
    {
    
        $json = file_get_contents(public_path('data/summary.json'));
        $dati = json_decode($json, true);
        
    
        $results = $dati['results']; 
        $elemento = $results[0];
        $scores = [
                    'Servizi Esposti' => $elemento['servizi_esposti_score'],
                    'Data Leak' => $elemento['dataleak_score'],
                    'Email Spoofing' => $elemento['spoofing_score'],
                    'Certificati' => $elemento['certificate_score']
                    ];

        
        return view('dashboard', compact('results', 'scores'));
    }

        public function setLanguage($lang){
        session()->put('locale', $lang);

        return redirect()->back();
    }

        
    public function setLocale($locale)
    {
        session(['locale' => $locale]);
        app()->setLocale($locale);
        
        return redirect()->back();
    }
    }
    