<x-layouts.app title="Course Details">
    <h1>Course Details</h1>

    <p class="detail"><strong>ID:</strong> {{ $course->id }}</p>
    <p class="detail"><strong>Name:</strong> {{ $course->name }}</p>
    <p class="detail"><strong>Description:</strong> {{ $course->description }}</p>
    <p class="detail"><strong>Duration:</strong> {{ $course->duration }} weeks</p>
    <p class="detail"><strong>Fee:</strong> {{ number_format($course->fee, 2) }}</p>
    <p class="detail">
        <strong>Difficulty:</strong>
        <span class="badge badge-{{ strtolower($course->difficulty) }}">{{ $course->difficulty }}</span>
    </p>
    <p class="detail"><strong>Active:</strong> {{ $course->is_active ? 'Yes' : 'No' }}</p>

    <p class="detail-links">
        <a href="{{ route('courses.edit', $course) }}" class="btn">Edit Course</a>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back to Courses</a>
    </p>
</x-layouts.app>
