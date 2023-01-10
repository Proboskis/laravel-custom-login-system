<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/js/app.js'])
</head>
<body>
<div id="app">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top: 6rem;">
                <h4 style="border-bottom: 1px solid #b0b0b0;">Welcome to the dashboard</h4>
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Body</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $data->username }}</td>
                            <td>{{ $data->email }}</td>
                            <td>
                                <a href="logout">Logout</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
