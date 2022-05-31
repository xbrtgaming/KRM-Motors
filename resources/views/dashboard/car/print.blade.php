<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">SOLD CAR REPORT</h1>
        <hr>
        Date : <strong>{{ $_GET['start_date'] . ' - ' . $_GET['end_date'] }}</strong>
        <br>
        Total Sold : <strong>{{ $data['status'] }}</strong>
        <br>
        Total Profit : <strong>Rp {{ number_format($data['price'], 2) }}</strong>
        <table class="table table-bordered mt-5 align-content-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Type</th>
                    <th>Year</th>
                    <th>Category</th>
                    <th>Range</th>
                    <th>Price</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['car'] as $cars)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cars->type }}</td>
                        <td>{{ $cars->year }}</td>
                        <td>{{ Str::upper($cars->category) }}</td>
                        <td>{{ $cars->range }}</td>
                        <td>Rp {{ number_format($cars->price, 2) }}</td>
                        <td>{{ $cars->created_at }}</td>
                        <td>{{ $cars->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
<footer>
    <script>
        window.print();
    </script>
</footer>

</html>
