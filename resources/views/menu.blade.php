<!DOCTYPE html>
<html data-bs-theme="dark">
<head>
    <title>CRUD</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="favicon.png" />
    <link rel="stylesheet" type="text/css" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link href="css/extended.css" rel="stylesheet" />
    <script type="text/javascript" src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</head> 
<body>
<div class="container">
    <div class="col allign-iitems-center justify-content-center text-center p-2 m-4">
        <h1>Migreny CRUD</h1>
        <hr class="divider m-5 p-1" />
        <h3>Wybierz tabelę:</h3>
    </div>
    <div class="text-center">
        @foreach ($tables as $table)
            <a class="btn btn-primary m-1" href="/{{ $table }}"> {{ $table }} </a>
        @endforeach
        <hr class="divider m-5" />
    </div>
    <div class="fixed-bottom" style="text-align: right"><img src="/iconsmall.png"></div>
</div>
</body>
</html>