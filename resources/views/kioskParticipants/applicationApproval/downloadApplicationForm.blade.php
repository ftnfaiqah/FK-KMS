<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
            <h3>PETAKOM KIOSK RENTAL</h3>
        </div>
                <h3>Applied Date : {{ $data->created_at->format('Y-m-d') ?? '-' }}</h3><br>

                <h3>Owner's Name :  {{ $data->user->name}}</h3><br><br>

                <h3>Owner's IC Number : {{ $data->user->icNum}}</h3><br>

                <h3>Owner's Phone No. : {{$data->user->phoneNum}}</h3><br>

                <h3>Kiosk Name :    {{ $data->kiosk->kiosk_name}}</h3><br>

                <h3>Status:     {{ $data->app_status}}</h3>
</body>
</html>