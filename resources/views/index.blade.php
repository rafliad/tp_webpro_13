<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min
.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Task Management</h1>
        @if(session('success'))
            <div class="alert alert-success mx-auto" role="alert" style="width: 30rem;">
                {{ session('success') }}
            </div>
        @endif
        <div class="card mx-auto" style="width: 30rem;">
            <div class="card-header">
                <h5>Add New Task</h5>
            </div>
            <form action="{{ route('task.store') }}" method="POST">
                @csrf
                <div class="my-3 mx-3"> <label for="name" class="form-label">Task Name</label>
                    <input type="text" id="name" name="name" placeholder="Task Name" class="form-control" required>
                </div>
                <div class="mb-3 mx-3"> <label for="description" class="formlabel">Task Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Task Description"
                        rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mx-3 mb-3">Add Task</button>
            </form>
        </div>
        <br>
        <h3 class="mx-auto" style="width: 30rem;">Task List</h3>
        @if ($tasks->count() == 0)
            <div class="card mx-auto" style="width: 30rem;">
                <div class="card-body text-center">
                    No tasks available
                </div>
            </div>
        @else
            @foreach ($tasks as $task)
                <div class="card mb-2 mx-auto" style="width: 30rem;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-1">{{ $task->name }}</h5>
                                <p class="card-text text-muted">{{ $task->description }}</p>
                            </div>
                            @if ($task->status == "pending")
                                <h6 class="rounded bg-warning my-auto px-2 py-1 text-white">{{ $task->status }}</>
                            @else
                                <h6 class="rounded bg-success my-auto px-2 py-1 text-white">{{ $task->status }}</>
                            @endif
                        </div>
                    </div>
                    <div class="btn-group-vertical">
                        <a href="{{ route('task.edit', $task->id) }}" class="btn btn-secondary w-100">Edit</a>
                        <form action="{{ route('task.destroy', $task->id) }}" method="POST" class="w-100">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100"
                                onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                        </form>
                    </div>

                </div>
            @endforeach
        @endif
    </div>
</body>

</html>