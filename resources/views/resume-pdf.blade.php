@php /** @var \App\DataObjects\Resume $resume */ @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $resume->basics->name }} Résumé</title>
    <style>
        @page {
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
            line-height: 1.45;
            color: #334155;
            background: #f8fafc;
        }

        .hero {
            padding: 38px 42px 34px;
            color: #ffffff;
            background: #172554;
        }

        .hero-table,
        .section-table,
        .item-table,
        .contact-table {
            width: 100%;
            border-collapse: collapse;
        }

        .hero-main {
            width: 72%;
            vertical-align: middle;
        }

        .hero-image-cell {
            width: 28%;
            text-align: right;
            vertical-align: middle;
        }

        .profile-image {
            width: 112px;
            height: 112px;
            border: 5px solid rgba(255, 255, 255, 0.35);
            border-radius: 56px;
            object-fit: cover;
        }

        h1 {
            margin: 0 0 6px;
            font-size: 34px;
            line-height: 1.12;
            letter-spacing: -0.5px;
        }

        .label {
            margin: 0 0 15px;
            color: #bfdbfe;
            font-size: 15px;
            font-weight: 600;
        }

        .accent {
            display: inline-block;
            width: 44px;
            height: 3px;
            margin-bottom: 13px;
            background: #60a5fa;
        }

        .contact {
            color: #e2e8f0;
            font-size: 9.5px;
        }

        .contact span {
            display: inline-block;
            margin: 0 12px 5px 0;
        }

        .profiles {
            margin-top: 8px;
        }

        .profile {
            display: inline-block;
            margin: 4px 5px 0 0;
            padding: 5px 9px;
            border: 1px solid rgba(255, 255, 255, 0.28);
            border-radius: 12px;
            color: #ffffff;
            font-size: 8.5px;
        }

        .content {
            padding: 20px 42px 24px;
        }

        .section {
            margin-bottom: 12px;
            page-break-inside: auto;
        }

        .section-heading {
            margin: 0 0 8px;
            padding: 7px 10px;
            border-left: 4px solid #4f46e5;
            color: #1e293b;
            background: #eef2ff;
            font-size: 15px;
            font-weight: 700;
        }

        .card {
            margin: 0 0 9px;
            padding: 12px 14px;
            border: 1px solid #e2e8f0;
            border-radius: 5px;
            background: #ffffff;
            page-break-inside: avoid;
        }

        .item-main {
            width: 68%;
            vertical-align: top;
        }

        .item-date {
            width: 32%;
            text-align: right;
            vertical-align: top;
        }

        h3 {
            margin: 0 0 3px;
            color: #1e293b;
            font-size: 12.5px;
        }

        .organization {
            color: #64748b;
            font-size: 9.5px;
            font-weight: 600;
        }

        .date {
            display: inline-block;
            padding: 4px 7px;
            border-radius: 9px;
            color: #475569;
            background: #f1f5f9;
            font-size: 8.5px;
        }

        .summary {
            margin: 7px 0 5px;
        }

        .link {
            color: #2563eb;
            font-size: 8.5px;
            text-decoration: none;
        }

        ul {
            margin: 6px 0 0;
            padding-left: 16px;
        }

        li {
            margin-bottom: 3px;
        }

        .tags {
            margin-top: 7px;
        }

        .tag {
            display: inline-block;
            margin: 0 4px 4px 0;
            padding: 3px 7px;
            border-radius: 9px;
            color: #475569;
            background: #e2e8f0;
            font-size: 8.5px;
        }

        .columns {
            width: 100%;
            border-collapse: separate;
            border-spacing: 7px 0;
        }

        .column {
            width: 50%;
            vertical-align: top;
        }

        .muted {
            color: #64748b;
        }

        .footer {
            margin-top: 18px;
            text-align: center;
            color: #94a3b8;
            font-size: 8px;
        }
    </style>
</head>
<body>
    <div class="hero">
        <table class="hero-table">
            <tr>
                <td class="hero-main">
                    <h1>{{ $resume->basics->name }}</h1>
                    <div class="accent"></div>
                    @if($resume->basics->label)
                        <p class="label">{{ $resume->basics->label }}</p>
                    @endif
                    <div class="contact">
                        @if($resume->basics->email)
                            <span>{{ $resume->basics->email }}</span>
                        @endif
                        @if($resume->basics->phone)
                            <span>{{ $resume->basics->phone }}</span>
                        @endif
                        @if($resume->basics->location->city)
                            <span>
                                {{ $resume->basics->location->city }}
                                @if($resume->basics->location->region)
                                    , {{ $resume->basics->location->region }}
                                @endif
                            </span>
                        @endif
                        @if($resume->basics->url)
                            <span>{{ $resume->basics->url }}</span>
                        @endif
                    </div>
                    @if(!empty($resume->basics->profiles))
                        <div class="profiles">
                            @foreach($resume->basics->profiles as $profile)
                                <span class="profile">{{ $profile->network }}: {{ $profile->url }}</span>
                            @endforeach
                        </div>
                    @endif
                </td>
                @if($resume->basics->image)
                    <td class="hero-image-cell">
                        <img class="profile-image" src="{{ $resume->basics->image }}" alt="{{ $resume->basics->name }}">
                    </td>
                @endif
            </tr>
        </table>
    </div>

    <div class="content">
        @if($resume->basics->summary)
            <section class="section">
                <h2 class="section-heading">About Me</h2>
                <div class="card">{{ $resume->basics->summary }}</div>
            </section>
        @endif

        @if(!empty($resume->work))
            <section class="section">
                <h2 class="section-heading">Work Experience</h2>
                @foreach($resume->work as $work)
                    <div class="card">
                        <table class="item-table">
                            <tr>
                                <td class="item-main">
                                    <h3>{{ $work->position }}</h3>
                                    <div class="organization">{{ $work->name }}</div>
                                </td>
                                @if($work->startDate)
                                    <td class="item-date">
                                        <span class="date">
                                            {{ $work->startDate->format('M Y') }} -
                                            {{ $work->endDate ? $work->endDate->format('M Y') : 'Present' }}
                                        </span>
                                    </td>
                                @endif
                            </tr>
                        </table>
                        @if($work->url)<div><a class="link" href="{{ $work->url }}">{{ $work->url }}</a></div>@endif
                        @if($work->summary)<p class="summary">{{ $work->summary }}</p>@endif
                        @if(!empty($work->highlights))
                            <ul>
                                @foreach($work->highlights as $highlight)<li>{{ $highlight }}</li>@endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            </section>
        @endif

        @if(!empty($resume->education))
            <section class="section">
                <h2 class="section-heading">Education</h2>
                @foreach($resume->education as $education)
                    <div class="card">
                        <table class="item-table">
                            <tr>
                                <td class="item-main">
                                    <h3>{{ $education->studyType }}</h3>
                                    <div class="organization">{{ $education->institution }} · {{ $education->area }}</div>
                                </td>
                                @if($education->startDate)
                                    <td class="item-date">
                                        <span class="date">
                                            {{ $education->startDate->format('M Y') }} -
                                            {{ $education->endDate ? $education->endDate->format('M Y') : 'Present' }}
                                        </span>
                                    </td>
                                @endif
                            </tr>
                        </table>
                        @if($education->score)<p class="summary">Score: {{ $education->score }}</p>@endif
                        @if(!empty($education->courses))
                            <div class="tags">
                                @foreach($education->courses as $course)<span class="tag">{{ $course }}</span>@endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </section>
        @endif

        @if(!empty($resume->skills))
            <section class="section">
                <h2 class="section-heading">Skills & Expertise</h2>
                <table class="columns">
                    @foreach(array_chunk($resume->skills, 2) as $row)
                        <tr>
                            @foreach($row as $skill)
                                <td class="column">
                                    <div class="card">
                                        <h3>
                                            {{ $skill->name }}
                                            @if($skill->level)<span class="muted"> · {{ $skill->level->title() }}</span>@endif
                                        </h3>
                                        <div class="tags">
                                            @foreach($skill->keywords as $keyword)<span class="tag">{{ $keyword }}</span>@endforeach
                                        </div>
                                    </div>
                                </td>
                            @endforeach
                            @if(count($row) === 1)<td class="column"></td>@endif
                        </tr>
                    @endforeach
                </table>
            </section>
        @endif

        @if(!empty($resume->projects))
            <section class="section">
                <h2 class="section-heading">Featured Projects</h2>
                @foreach($resume->projects as $project)
                    <div class="card">
                        <table class="item-table">
                            <tr>
                                <td class="item-main"><h3>{{ $project->name }}</h3></td>
                                @if($project->startDate)
                                    <td class="item-date">
                                        <span class="date">
                                            {{ $project->startDate->format('M Y') }} -
                                            {{ $project->endDate ? $project->endDate->format('M Y') : 'Present' }}
                                        </span>
                                    </td>
                                @endif
                            </tr>
                        </table>
                        @if($project->url)<div><a class="link" href="{{ $project->url }}">{{ $project->url }}</a></div>@endif
                        @if($project->description)<p class="summary">{{ $project->description }}</p>@endif
                        @if(!empty($project->highlights))
                            <ul>
                                @foreach($project->highlights as $highlight)<li>{{ $highlight }}</li>@endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            </section>
        @endif

        @if(!empty($resume->certificates) || !empty($resume->awards) || !empty($resume->publications))
            <section class="section">
                <h2 class="section-heading">Credentials</h2>
                @foreach($resume->certificates as $certificate)
                    <div class="card">
                        <h3>{{ $certificate->name }}</h3>
                        <div class="organization">{{ $certificate->issuer }}</div>
                        @if($certificate->date)<div class="muted">{{ $certificate->date->format('M Y') }}</div>@endif
                    </div>
                @endforeach
                @foreach($resume->awards as $award)
                    <div class="card">
                        <h3>{{ $award->title }}</h3>
                        <div class="organization">{{ $award->awarder }}</div>
                        @if($award->date)<div class="muted">{{ $award->date->format('M Y') }}</div>@endif
                        @if($award->summary)<p class="summary">{{ $award->summary }}</p>@endif
                    </div>
                @endforeach
                @foreach($resume->publications as $publication)
                    <div class="card">
                        <h3>{{ $publication->name }}</h3>
                        <div class="organization">{{ $publication->publisher }}</div>
                        @if($publication->releaseDate)<div class="muted">{{ $publication->releaseDate->format('M Y') }}</div>@endif
                        @if($publication->summary)<p class="summary">{{ $publication->summary }}</p>@endif
                    </div>
                @endforeach
            </section>
        @endif

        @if(!empty($resume->languages) || !empty($resume->interests) || !empty($resume->references) || !empty($resume->volunteer))
            <section class="section">
                <h2 class="section-heading">Additional Information</h2>
                @if(!empty($resume->languages))
                    <div class="card">
                        <h3>Languages</h3>
                        @foreach($resume->languages as $language)
                            <span class="tag">{{ $language->language }} — {{ $language->fluency }}</span>
                        @endforeach
                    </div>
                @endif
                @if(!empty($resume->interests))
                    <div class="card">
                        <h3>Interests</h3>
                        @foreach($resume->interests as $interest)
                            <p><strong>{{ $interest->name }}:</strong> {{ implode(', ', $interest->keywords) }}</p>
                        @endforeach
                    </div>
                @endif
                @foreach($resume->references as $reference)
                    <div class="card">
                        <h3>{{ $reference->name }}</h3>
                        <p class="summary">{{ $reference->reference }}</p>
                    </div>
                @endforeach
                @foreach($resume->volunteer as $volunteer)
                    <div class="card">
                        <h3>{{ $volunteer->position }}</h3>
                        <div class="organization">{{ $volunteer->organization }}</div>
                        @if($volunteer->summary)<p class="summary">{{ $volunteer->summary }}</p>@endif
                    </div>
                @endforeach
            </section>
        @endif

        <div class="footer">{{ $resume->basics->name }} · {{ $resume->basics->email }}</div>
    </div>
</body>
</html>
