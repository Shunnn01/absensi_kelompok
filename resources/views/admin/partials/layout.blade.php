<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    @include('admin.partials.navbar')
    @include('admin.partials.sidebar')
    <div class="content">
        @yield('content')
    </div>
</body>
</html>