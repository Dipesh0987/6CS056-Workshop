<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <h1>Students</h1>

    <p class="nav">
        <a href="/students">Students</a> |
        <a href="/courses">Courses</a>
    </p>

    @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif

    <a href="/students/create" class="btn">Create Student</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>
                        <a href="/students/{{ $student->id }}" class="btn btn-secondary btn-sm">
                            View
                        </a>

                        <a href="/students/{{ $student->id }}/edit" class="btn btn-secondary btn-sm">
                            Edit
                        </a>

                        <form
                            action="/students/{{ $student->id }}"
                            method="POST"
                            style="display:inline"
                            onsubmit="return confirm('Delete this student? This cannot be undone.');"
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
                    <td colspan="5" class="empty">
                        No students found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
