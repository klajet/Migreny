<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> @yield('tableName') </title>
    <link rel="icon" type="image/x-icon" href="/favicon.png" />
    <link rel="stylesheet" type="text/css" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    @if ($message = Session::get('success'))
    <div class="alert alert-success text-center">
        <p>{{ $message }}</p>
    </div>
    
    @endif
    <div class="container mt-2">
            <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="text-center m-2 p-2">
                    <h1>@yield('tableName')</h1>
                </div>
            </div>
        </div>
        {{-- <span >Read</span> <!-- zrobić ładne --> --}}
        <table class="table table-bordered table-responsive table-striped align-middle">
        @yield('tableRead')
        
        <hr class="divider m-2" />

        <div class="row my-4 mx-auto">
            <span class="text-center m-2 p-2"><h2>Create</h2></span> <!-- zrobić ładne -->
            @yield('tableCreate')
        </div>

        <hr class="divider m-5" />
    </div>
    <div class="fixed-bottom mb-3 mx-3"><a class="btn btn-secondary" href="/">⇇ Menu</a></div>
</body>
</html>

<script>
function show(arr)
{
    var items = document.getElementsByClassName(arr);

    if(items[1].hidden)
    {
        for (let i = 0; i < items.length; i++) 
        {
            items[i].hidden = false;
        }
    }
    else
    {
        for (let i = 0; i < items.length; i++) 
        {
            items[i].hidden = true;
        }
    }
}
</script>
