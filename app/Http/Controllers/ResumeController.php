<?php

namespace App\Http\Controllers;

use App\DataObjects\Resume;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function index(Factory $view)
    {
        $resumeData = Cache::remember('resume_data_v2', now()->addDay(), function (): array {
                $json = Storage::disk('resumes')->get('resume.json');

                return json_decode($json,true, flags: JSON_THROW_ON_ERROR);
            });

        $resume = Resume::fromArray($resumeData);

        return $view->make('resume', ['resume' => $resume]);
    }
}
