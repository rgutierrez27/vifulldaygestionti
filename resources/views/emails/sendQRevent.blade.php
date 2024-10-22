<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación registro en evento {{ $nameEvent }}</title>
    <style>
        /* Basic styling for the email */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #008891;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .content {
            padding: 20px;
        }

        .content h2 {
            margin: 0 0 10px;
            color: #333333;
        }

        .content p {
            margin: 10px 0;
            line-height: 1.6;
            color: #555555;
        }

        .qr-code {
            text-align: center;
            margin: 20px 0;
        }

        .footer {
            background-color: #f9f9f9;
            padding: 10px;
            text-align: center;
            font-size: 12px;
            color: #888888;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>{{ $nameEvent }}</h1>
        </div>
        <div class="content">
            <h2>Gracias por registrarte, {{ $participante->nombrecompleto }}</h2>
            <p>Por favor, encuentra a continuación tu código QR para verificar tu registro en el evento:</p>

            <div class="qr-code">
                <img src="{{ $ImagePath }}" alt="Código QR" style="max-width: 100%; height: auto; border: none;" />
            </div>

            <p>Si aún no realizas el pago, realizalo en <a href="{{ $payment_url }}">pasarela de pagos</a>.</p>
        </div>
        <div class="footer">
            <p>Universidad Católica de Trujillo</p>
        </div>
    </div>
</body>

</html>
