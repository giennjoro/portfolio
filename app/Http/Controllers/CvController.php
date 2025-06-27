<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\Setting;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CvController extends Controller
{
    public function downloadCv()
    {
        $portfolioName = Setting::where('key', 'portfolio_name')->first()->value ?? 'Your Name';
        $githubUrl = Setting::where('key', 'github_url')->first()->value ?? '';
        $xUrl = Setting::where('key', 'x_url')->first()->value ?? '';
        $contactEmail = Setting::where('key', 'contact_email')->first()->value ?? '';
        $projects = Project::all();
        $skills = Skill::all()->groupBy('category');

        $data = compact('portfolioName', 'githubUrl', 'xUrl', 'contactEmail', 'projects', 'skills');

        $pdf = Pdf::loadView('cv', $data);
        return $pdf->download('cv-' . str_replace(' ', '-', strtolower($portfolioName)) . '.pdf');
    }
}
