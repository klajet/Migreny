<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctors</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Doctors</h2>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>address_id</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)
                    <tr>
                        <td>{{ $doctor->id }}</td>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->lastname }}</td>
                        <td>{{ $doctor->address_id }}</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {{ $doctors->links() }}
    </div>
</body>
</html>