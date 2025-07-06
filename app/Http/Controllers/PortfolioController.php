<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\ContactMessage;
use App\Models\Setting;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $portfolioName = Setting::where('key', 'portfolio_name')->first()->value ?? 'Your Name';
        $githubUrl = Setting::where('key', 'github_url')->first()->value ?? '';
        $xUrl = Setting::where('key', 'x_url')->first()->value ?? '';
        $contactEmail = Setting::where('key', 'contact_email')->first()->value ?? '';

        return view('portfolio.index', compact('projects', 'portfolioName', 'githubUrl', 'xUrl', 'contactEmail'));
    }

    public function showProject(Project $project)
    {
         $portfolioName = Setting::where('key', 'portfolio_name')->first()->value ?? 'Your Name';
        return view('portfolio.project', compact('project', 'portfolioName'));
    }

    public function showSkills()
    {
        $skills = Skill::all();
        $portfolioName = Setting::where('key', 'portfolio_name')->first()->value ?? 'Your Name';
        return view('portfolio.skills', compact('skills', 'portfolioName'));
    }

    public function showContact()
    {
        $portfolioName = Setting::where('key', 'portfolio_name')->first()->value ?? 'Your Name';
        return view('portfolio.contact', compact('portfolioName'));
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        ContactMessage::create($request->all());

        return redirect()->route('portfolio.contact')->with('success', 'Message sent successfully!');
    }
}
