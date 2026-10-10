<!DOCTYPE html>
<html>
<head>
    <title>Courses</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <h1>Courses</h1>

    <p class="nav">
        <a href="/students">Students</a> |
        <a href="/courses">Courses</a>
    </p>

    @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif

    <a href="/courses/create" class="btn">Create Course</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Duration (weeks)</th>
                <th>Fee</th>
                <th>Difficulty</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->duration }}</td>
                    <td>{{ $course->fee }}</td>
                    <td>
                        <span class="badge badge-{{ strtolower($course->difficulty) }}">{{ $course->difficulty }}</span>
                    </td>
                    <td>
                        @if($course->is_active)
                            <span class="badge badge-active">Yes</span>
                        @else
                            <span class="badge badge-inactive">No</span>
                        @endif
                    </td>
                    <td>
                        <a href="/courses/{{ $course->id }}" class="btn btn-secondary btn-sm">
                            View
                        </a>

                        <a href="/courses/{{ $course->id }}/edit" class="btn btn-secondary btn-sm">
                            Edit
                        </a>

                        <form
                            action="/courses/{{ $course->id }}"
                            method="POST"
                            style="display:inline"
                            onsubmit="return confirm('Delete this course? This cannot be undone.');"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="empty">
                        No courses found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
