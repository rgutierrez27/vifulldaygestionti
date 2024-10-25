<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación registro en evento {{ $nameEvent }}</title>
    <style>
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

        .zoom-link {
            text-align: center;
            margin: 30px 0;
        }

        .zoom-link a {
            background-color: #008891;
            color: #ffffff;
            text-decoration: none;
            padding: 15px 25px;
            border-radius: 5px;
            font-size: 16px;
            display: inline-block;
        }

        .zoom-link a:hover {
            background-color: #006f75;
        }

        .footer {
            background-color: #f9f9f9;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #888888;
        }

        .footer a {
            color: #008891;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Bienvenido(a) al {{ $nameEvent }}</h1>
        </div>

        <div class="content">
            <h2>Estimado(a), {{ $participante->nombrecompleto }}</h2>
            <p>La Universidad Católica de Trujillo le da la bienvenida al Congreso Internacional "Claves para la Educación del Futuro".</p>
            
            <p>Para garantizar una experiencia positiva en el evento, le solicitamos ingresar a la plataforma Zoom con sus apellidos y nombres completos, tal y como hizo su registro para el evento. Recuerde que no será posible dos participaciones con sus datos personales ni participación de personas no inscritas.</p>
            
            <div class="zoom-link">
                <a href="{{ $enlace_virtual }}">Acceder al evento por Zoom</a>
            </div>
            
            <p>Agradecemos su participación y compromiso.</p>
        </div>

        <div class="footer">
            <p><a href="https://uct.edu.pe" target="_blank">Universidad Católica de Trujillo.</a></p>
        </div>
    </div>
</body>

</html>
