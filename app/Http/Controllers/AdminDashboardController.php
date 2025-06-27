<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $projectCount = Project::count();
        $skillCount = Skill::count();
        $messageCount = ContactMessage::count();

        return view('dashboard', compact('projectCount', 'skillCount', 'messageCount'));
    }
}
