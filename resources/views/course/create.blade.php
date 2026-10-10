<!DOCTYPE html>
<html>
<head>
    <title>Create Course</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <h1>Create Course</h1>

    @if($errors->any())
        <div class="alert alert-error">
            <h3>Please fix the following errors:</h3>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/courses" method="POST" class="form-card">
        @csrf

        <div>
            <label for="name">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
            >
        </div>

        <br>

        <div>
            <label for="description">Description</label>
            <textarea
                id="description"
                name="description"
            >{{ old('description') }}</textarea>
        </div>

        <br>

        <div>
            <label for="duration">Duration (weeks)</label>
            <input
                type="number"
                id="duration"
                name="duration"
                min="1"
                value="{{ old('duration') }}"
            >
        </div>

        <br>

        <div>
            <label for="fee">Fee</label>
            <input
                type="number"
                id="fee"
                name="fee"
                min="0"
                step="0.01"
                value="{{ old('fee') }}"
            >
        </div>

        <br>

        <div>
            <label for="difficulty">Difficulty</label>
            <select id="difficulty" name="difficulty">
                <option value="">-- Select difficulty --</option>
                @foreach(['Easy', 'Medium', 'Hard'] as $level)
                    <option value="{{ $level }}" @selected(old('difficulty') === $level)>
                        {{ $level }}
                    </option>
                @endforeach
            </select>
        </div>

        <br>

        <div>
            {{-- Hidden input sends "0" when the checkbox is unchecked --}}
            <input type="hidden" name="is_active" value="0">
            <label class="checkbox-label">
                <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    @checked(old('is_active', '1'))
                >
                Course is currently active
            </label>
        </div>

        <br>

        <button type="submit" class="btn">
            Create Course
        </button>
        <a href="/courses" class="btn btn-secondary">Back to Courses</a>
    </form>

</body>
</html>
