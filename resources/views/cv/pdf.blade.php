<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV PDF</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=DejaVu+Sans&display=swap');

        body {
            font-family: 'DejaVu Sans', sans-serif; /* Good for special characters */
            color: #2D3748;
            line-height: 1.6;
            margin-top: 10px;
            padding: 0;
            background-color: #F7FAFC;
        }

        .container {
            padding: 20px;
            width: 100%;
            max-width: 800px;
            margin: auto;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .header {
            text-align: left;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px; /* 2rem */
            font-weight: 700;
            color: #2F855A;
        }

        .contact-info div {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px; /* 1rem */
            color: #4A5568;
            margin-bottom: 5px;
        }

        .contact-info img {
            height: 20px;
        }

        .section {
            margin-bottom: 20px;
        }

        .section h2 {
            font-size: 18px; /* 1.5rem */
            font-weight: 600;
            border-bottom: 2px solid #E2E8F0;
            padding-bottom: 5px;
            color: #2F855A;
            margin-bottom: 10px;
        }

        .section p, .section li {
            margin: 5px 0;
            font-size: 14px;
            color: #4A5568;
        }

        .section .bold {
            font-weight: 600;
            font-size: 16px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>{{ $cv->personalDetails->name }} {{ $cv->personalDetails->surname }}</h1>
        <div class="contact-info">
            <div><strong>Email:</strong> {{ $cv->personalDetails->email }}</div>
            <div><strong>Phone:</strong> {{ $cv->personalDetails->phone_number }}</div>
            @if ($cv->personalDetails->linkedin)
                <div><strong>LinkedIn:</strong> {{ $cv->personalDetails->linkedin }}</div>
            @endif
            @if ($cv->personalDetails->github)
                <div><strong>GitHub:</strong> {{ $cv->personalDetails->github }}</div>
            @endif
        </div>
    </div>

    <div class="section">
        <h2>Personal Details</h2>
        <p><strong>Address:</strong> {{ $cv->personalDetails->address }}</p>
        <p><strong>Bio:</strong> {{ $cv->personalDetails->description }}</p>
    </div>

    <div class="section">
        <h2>Education</h2>
        @foreach($cv->education as $education)
            <div>
                <p class="bold mb-2">{{ $education->degree }} at {{ $education->institution }}</p>
                <p class="semibold mb-2">From: {{ $education->start_date }} to: {{ $education->end_date }}</p>
            </div>
        @endforeach
    </div>

    <div class="section">
        <h2>Work Experience</h2>
        @foreach($cv->workExperience as $work)
            <div>
                <p class="bold mb-2">{{ $work->position }} at {{ $work->company }}</p>
                <p class="semibold mb-2">From: {{ $work->start_date }} to: {{ $work->end_date }}</p>
                <p><strong>Description:</strong> {{ $work->description }}</p>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
