<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min
.css">
</head>

<body>
    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success mx-auto" role="alert" style="width: 30rem;">
                {{ session('success') }}
            </div>
        @endif
        <div class="card mx-auto" style="width: 30rem;">
            <div class="card-header">
                <h5>Edit task</h5>
            </div>
            <form action="{{ route('task.update', $tasks->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="my-3 mx-3">
                    <label for="name" class="form-label">Task Name</label>
                    <input type="text" id="name" name="name" value="{{$tasks->name}}" class="form-control" required>
                </div>
                <div class="mb-3 mx-3">
                    <label for="description" class="formlabel">Task Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Task Description"
                        rows="3" required>{{$tasks->description}}</textarea>
                </div>
                <div class="mb-3 mx-3">
                    <label for="status" class="formlabel">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option>pending</option>
                        <option>completed</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary form-control mb-1">Update Task</button>
                <a href="{{ route('task.index') }}" class="btn btn-secondary form-control">Back</a>
            </form>
        </div>
        <br>
    </div>
</body>

</html>