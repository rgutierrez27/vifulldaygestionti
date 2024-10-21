<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación registro en evento {{ $event->descripcion }}</title>
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
            <h1>{{ $event->descripcion }}</h1>
        </div>
        <div class="content">
            <h2>Gracias por registrarte, {{ $names }}!</h2>
            <p>Por favor, encuentra a continuación tu código QR para verificar tu registro en el evento:</p>

            <div class="qr-code">
                <!-- Replace 'path_to_qr_code_image' with the actual path to the QR code image -->
                <img src="path_to_qr_code_image" alt="Código QR" style="max-width: 100%; height: auto; border: none;" />
            </div>

            <p>Si necesitas realizar algún pago, sigue las instrucciones en el enlace a continuación.</p>
            {{-- Aquí podrías incluir más detalles sobre el evento, pagos, etc. --}}
        </div>
        <div class="footer">
            <p>Universidad Católica de Trujillo</p>
        </div>
    </div>
</body>

</html>
