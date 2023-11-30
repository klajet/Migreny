<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link href="css/extended.css" rel="stylesheet" />
    <script type="text/javascript" src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</head> 
<body>
<div class="container">
    <div class="col allign-iitems-center justify-content-center text-center p-2 m-4">
        <h1>CRUD</h1>
        <hr class="divider" />
        <h3>Wybierz tabelę</h3>
    </div>
    <div>
        @foreach ($tables as $table)
        <a class="btn btn-secondary" href="/"> {{ $table->name }} </a>
                            
        @endforeach
    </div>
</div>
</body>
</html>