<x-layouts.app title="Student Details">
    <h1>Student Details</h1>

    <p class="detail"><strong>ID:</strong> {{ $student->id }}</p>
    <p class="detail"><strong>Name:</strong> {{ $student->name }}</p>
    <p class="detail"><strong>Email:</strong> {{ $student->email }}</p>
    <p class="detail"><strong>Phone:</strong> {{ $student->phone }}</p>
    <p class="detail"><strong>Address:</strong> {{ $student->address }}</p>
    <p class="detail"><strong>Date of Birth:</strong> {{ $student->date_of_birth?->format('d M Y') }}</p>
    <p class="detail"><strong>Age:</strong> {{ $student->age ?? 'Not available' }}</p>

    <p class="detail-links">
        <a href="{{ route('students.edit', $student) }}" class="btn">Edit Student</a>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to Students</a>
    </p>
</x-layouts.app>
