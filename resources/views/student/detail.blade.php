<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <h1>Student Details</h1>

    @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif

    <p class="detail">
        <strong>ID:</strong>
        {{ $student->id }}
    </p>

    <p class="detail">
        <strong>Name:</strong>
        {{ $student->name }}
    </p>

    <p class="detail">
        <strong>Email:</strong>
        {{ $student->email }}
    </p>

    <p class="detail">
        <strong>Phone:</strong>
        {{ $student->phone }}
    </p>

    <p class="detail">
        <strong>Address:</strong>
        {{ $student->address }}
    </p>

    <p class="detail">
        <strong>Date of Birth:</strong>
        {{ $student->date_of_birth }}
    </p>

    <p class="detail-links">
        <a href="/students/{{ $student->id }}/edit" class="btn">
            Edit Student
        </a>

        <a href="/students" class="btn btn-secondary">
            Back to Students
        </a>
    </p>

</body>
</html>
