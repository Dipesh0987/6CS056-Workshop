<x-layouts.app title="Courses">
    <h1>Courses</h1>

    <a href="{{ route('courses.create') }}" class="btn">Create Course</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Duration</th>
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
                    <td>{{ $course->duration }} weeks</td>
                    <td>{{ number_format($course->fee, 2) }}</td>
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
                        <a href="{{ route('courses.show', $course) }}" class="btn btn-secondary btn-sm">View</a>
                        <a href="{{ route('courses.edit', $course) }}" class="btn btn-secondary btn-sm">Edit</a>
                        <x-delete-form :action="route('courses.destroy', $course)" />
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No courses found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-layouts.app>
