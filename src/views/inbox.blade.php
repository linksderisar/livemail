<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    @livewireStyles

    <style>
        .mail:hover, .mail.unread:hover {
            background-color: #e8e8ed !important;
        }
        .mail {
            cursor: pointer;
        }
        .mail.selected {
            background-color: rgba(91, 176, 255, 0.32) !important;
        }
        .mail.unread {
            background-color: white !important;
        }
        .pagination-links nav {
            float: right;
        }
        .pagination-links .page-link {
            color: dimgrey;
        }
        .pagination-links .active .page-link {
            background-color: #e8e8ed;
            border-color: #e8e8ed;
        }
        .pagination-links .active .page-link {
            background-color: #e8e8ed;
        }
        .pagination-links .page-link:focus {
            border-color: #e8e8ed;
            box-shadow: none;
        }
    </style>

    <title>Livemail</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">LiveMail ({{ $count }})</span>
    </div>
</nav>

<livewire:linksderisar::livemail />


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@livewireScripts

</body>
</html>
