<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>API Codigos Postales MX</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                padding: 20px;
            }
    
            .container {
                max-width: 800px;
                margin: 0 auto;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                padding: 20px;
                text-align: justify;
            }
    
            h1 {
                font-size: 24px;
            }
    
            h2 {
                font-size: 20px;
            }
    
            h3 {
                font-size: 18px;
            }
    
            p {
                font-size: 16px;
                line-height: 1.5;
            }
    
            a {
                text-decoration: none;
                color: #007bff;
            }
    
            .code-example {
                background-color: #f5f5f5;
                padding: 10px;
                margin: 10px 0;
                border: 1px solid #ccc;
            }
    
            table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px 0;
            }
    
            th, td {
                border: 1px solid #ccc;
                padding: 8px;
                text-align: left;
            }
    
            th {
                background-color: #f2f2f2;
            }
    
            .developer {
                margin-top: 30px;
            }

            .responsive-image {
                max-width: 100%;
                height: auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <img src="https://github.com/chelitodelgado/lotedeimagenes/blob/main/Side%20project.png?raw=true" alt="Logo" class="responsive-image">
            <h1>API Codigos Postales MX</h1>
            <h2>Descripción</h2>
            <p>La API Codigos Postales MX proporciona un acceso sencillo y eficiente a una rica fuente de datos geográficos, incluyendo información detallada sobre códigos postales, estados, ciudades, localidades y municipios en México. Esta API es una herramienta esencial para una variedad de aplicaciones y casos de uso, desde la planificación urbana y el análisis de mercado hasta la gestión logística y el enriquecimiento de datos geoespaciales.</p>
            <h2>Uso de la API</h2>
            <h3>API End-Point</h3>
    
            <h4>Obtener Ubicación por Código Postal</h4>
            <div class="code-example">
                <pre>
    GET http://127.0.0.1:8000/api/ubicacion-por-codigo-postal/62400
                </pre>
            </div>
    
            <table>
                <tr>
                    <th>Parametro</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                </tr>
                <tr>
                    <td>codigo postal</td>
                    <td>numerico</td>
                    <td><strong>Requerido</strong>. Este endpoint le permite obtener información detallada sobre una ubicación específica a través de un código postal. La respuesta incluye datos sobre el municipio, estado y colonia asociados al código postal proporcionado.</td>
                </tr>
            </table>
    
            <p><strong>Ejemplo:</strong> (62400)</p>
            <p>Este valor corresponde al código postal</p>
    
            <h4>Obtener Códigos Postales</h4>
            <div class="code-example">
                <pre>
    GET http://127.0.0.1:8000/api/codigos-postales/10
                </pre>
            </div>
    
            <table>
                <tr>
                    <th>Parametro</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                </tr>
                <tr>
                    <td>paginación</td>
                    <td>numerico</td>
                    <td><strong>Requerido</strong>. Con esta solicitud, puede recuperar una lista de códigos postales en México. La respuesta incluye una serie de códigos postales disponibles, lo que facilita la exploración de datos geográficos.</td>
                </tr>
            </table>
    
            <p><strong>Numero de paginas a mostrar:</strong> (10, 20, 30, 50, ...)</p>
            <p>Este valor corresponde a la cantidad de registros paginados.</p>
    
            <h4>Obtener Colonias</h4>
            <div class="code-example">
                <pre>
    GET http://127.0.0.1:8000/api/colonias/10
                </pre>
            </div>
    
            <table>
                <tr>
                    <th>Parametro</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                </tr>
                <tr>
                    <td>estado</td>
                    <td>string</td>
                    <td><strong>Requerido</strong>. Con este endpoint, puede obtener una lista de colonias disponibles en México. La respuesta incluye información sobre el nombre y el tipo de comunidad de cada colonia.</td>
                </tr>
            </table>
    
            <p><strong>Ejemplo:</strong> Numero de paginas a mostrar: (10, 20, 30, 50, ...)</p>
            <p>Este valor corresponde a la cantidad de registros paginados.</p>
    
            <h4>Obtener Colonia por Nombre</h4>
            <div class="code-example">
                <pre>
    GET http://127.0.0.1:8000/api/colonia/el vergel
                </pre>
            </div>
    
            <table>
                <tr>
                    <th>Parametro</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                </tr>
                <tr>
                    <td>colonia</td>
                    <td>string</td>
                    <td><strong>Requerido</strong>. Este endpoint permite obtener información sobre una colonia específica proporcionando su nombre. La respuesta incluye datos sobre el tipo de comunidad y otros detalles relevantes.</td>
                </tr>
            </table>
    
            <p><strong>Ejemplo:</strong> el vergel</p>
            <p>Escribe el nombre de la colonia para obtener su información.</p>
    
            <h4>Obtener Información sobre Estados</h4>
            <div class="code-example">
                <pre>
    GET http://127.0.0.1:8000/api/estado/morelos
                </pre>
            </div>
    
            <table>
                <tr>
                    <th>Parametro</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                </tr>
                <tr>
                    <td>estado</td>
                    <td>string</td>
                    <td><strong>Requerido</strong>. Esta solicitud le proporciona información detallada sobre un estado específico en México. La respuesta incluye datos sobre el estado y sus municipios asociados.</td>
                </tr>
            </table>
    
            <p><strong>Ejemplo:</strong> morelos</p>
            <p>Escribe el nombre del estado para obtener su información.</p>
    
            <h2>Ejemplo de Respuesta</h2>
    
            <p>Cada solicitud a la API devuelve una respuesta en formato JSON, que contiene datos geográficos precisos relacionados con el código postal, estado, ciudad, localidad y municipio consultados.</p>
    
            <h2>Headers de Solicitud</h2>
    
            <p>Para interactuar con la API, asegúrese de establecer adecuadamente los siguientes headers en sus solicitudes:</p>
    
            <h3>Content-Type: application/json</h3>
    
            <h2>Notas</h2>
    
            <p>Esta documentación está diseñada para ayudarlo a comprender y utilizar la API Codigos Postales MX de manera efectiva. Siéntase libre de explorar las diversas solicitudes y endpoints disponibles para aprovechar al máximo esta rica fuente de datos geográficos.</p>
    
            <div class="developer">
                <h3>Desarrollado por</h3>
                <a href="https://github.com/chelitodelgado">@chelitodelgado</a>
            </div>
        </div>
    </body>
</html>
