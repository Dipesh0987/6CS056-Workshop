<!DOCTYPE html>
<html>
<head>
    <title>Course Details</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <h1>Course Details</h1>

    @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif

    <p class="detail">
        <strong>ID:</strong>
        {{ $course->id }}
    </p>

    <p class="detail">
        <strong>Name:</strong>
        {{ $course->name }}
    </p>

    <p class="detail">
        <strong>Description:</strong>
        {{ $course->description }}
    </p>

    <p class="detail">
        <strong>Duration:</strong>
        {{ $course->duration }} weeks
    </p>

    <p class="detail">
        <strong>Fee:</strong>
        {{ $course->fee }}
    </p>

    <p class="detail">
        <strong>Difficulty:</strong>
        <span class="badge badge-{{ strtolower($course->difficulty) }}">{{ $course->difficulty }}</span>
    </p>

    <p class="detail">
        <strong>Active:</strong>
        {{ $course->is_active ? 'Yes' : 'No' }}
    </p>

    <p class="detail-links">
        <a href="/courses/{{ $course->id }}/edit" class="btn">
            Edit Course
        </a>

        <a href="/courses" class="btn btn-secondary">
            Back to Courses
        </a>
    </p>

</body>
</html>
