<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Comprobante de pago</div>

                <div class="card-body">
                    <p>Nombre del cliente: {{ $pay->user->name }}</p>
                    <p>Total a pagar: {{ $pay->amount }}</p>
                    <p>Descripción: {{ $pay->description }}</p>
                </div>
            </div>
        </div>
    </div>
   
</div>
</body>
</html>