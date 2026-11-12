<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Inventory IconPlus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h4>Halo, {{ auth()->user()->name }}</h4>
                <p>Peran kamu: <span class="badge bg-primary">{{ auth()->user()->role }}</span></p>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-danger">Keluar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
