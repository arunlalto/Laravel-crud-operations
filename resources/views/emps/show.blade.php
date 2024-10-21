
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
        <h2>Employee Details</h2>

        <div class="card">
            <div class="card-header">
                <h3>{{ $emp->name }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Email:</strong> {{ $emp->email }}</p>
                <p><strong>Position:</strong> {{ $emp->position }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('emps.index') }}" class="btn btn-secondary">Back to List</a>
                <a href="{{ route('emps.edit', $emp->id) }}" class="btn btn-primary">Edit</a>

                <form action="{{ route('emps.destroy', $emp->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
