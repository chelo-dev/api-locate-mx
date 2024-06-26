<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api\GetGeolocalitationHelper;
use Illuminate\Support\Facades\Validator;
use App\Helpers\SharedFunctionsHelpers;
use App\Models\Codigo_Postal_Municipio;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;
use App\Models\Codigo_Postal;
use Illuminate\Http\Request;
use App\Models\Estado_Pais;
use App\Models\Colonia;
use Exception;

class ApiController extends Controller
{
    protected $shared, $geolocation;

    public function __construct(SharedFunctionsHelpers $shared, GetGeolocalitationHelper $geolocation)
    {
        $this->shared = $shared;
        $this->geolocation = $geolocation;
    }

    public function ubicacionPorCodigoPostal(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'codigo_postal' => 'required|numeric|digits_between:4,5'
        ]);

        if ($validator->fails()) {
            return $this->shared->sendError($this->shared->getValidationMessageError(), ['error_detail' => $validator->messages()]);
        }

        $codigo_postal = ltrim($request->input('codigo_postal'), '0');

        try {
            $data = $this->geolocation->searchGeolocation($codigo_postal);
            
            // Registrar informacion del solicitante.
            $this->shared->logs();

            return $this->shared->sendResponse($data, $this->shared->getDataMessage(), Response::HTTP_OK);
        } catch (Exception $error) {
            return $this->shared->sendError($this->shared->getDataMessageError(), ['error_detail' => $error->getMessage()]);
        }
    }

    public function codigosPostales($paginacion = 20)
    {
        try {
            $codigoPostales = Codigo_Postal::select('codigo')
                ->orderBy('id', 'ASC')
                ->paginate($paginacion);

            // Registrar peticion
            $this->shared->logs();

            return $this->shared->sendResponse($codigoPostales, $this->shared->getDataMessage(), Response::HTTP_OK);
        } catch (Exception $error) {
            return $this->shared->sendError($this->shared->getDataMessageError(), ['error_detail' => $error->getMessage()]);
        }
    }

    public function colonia(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|min:3|max:255'
        ]);

        if ($validator->fails()) {
            return $this->shared->sendError($this->shared->getValidationMessageError(), ['error_detail' => $validator->messages()]);
        }

        $nombre = $this->shared->clearString($request->input('nombre'));

        try {
            $data = $this->geolocation->searchColonia($nombre);

            // Registrar peticion
            $this->shared->logs();

            return $this->shared->sendResponse($data, $this->shared->getDataMessage(), Response::HTTP_OK);
        } catch (Exception $error) {
            return $this->shared->sendError($this->shared->getDataMessageError(), ['error_detail' => $error->getMessage()]);
        }
    }

    public function colonias($paginacion = 20)
    {
        try {
            $colonias = Colonia::orderBy('id', 'ASC')
                ->select('nombre')
                ->paginate($paginacion);

            // Registrar peticion
            $this->shared->logs();

            return $this->shared->sendResponse($colonias, $this->shared->getDataMessage(), Response::HTTP_OK);
        } catch (Exception $error) {
            return $this->shared->sendError($this->shared->getDataMessageError(), ['error_detail' => $error->getMessage()]);
        }
    }

    public function estado($estado)
    {
        try {
            $estadoEncontrado = Estado_Pais::select('nombre')
                ->where(DB::raw("LOWER(nombre)"), '=', $this->shared->normalize($estado))
                ->first();

            // Registrar peticion
            $this->shared->logs();

            return $this->shared->sendResponse($estadoEncontrado, $this->shared->getDataMessage(), Response::HTTP_OK);
        } catch (Exception $error) {
            return $this->shared->sendError($this->shared->getDataMessageError(), ['error_detail' => $error->getMessage()]);
        }
    }

    public function estados($paginacion = 20)
    {
        try {
            $estados = Estado_Pais::select('nombre')
                ->orderBy('id', 'ASC')
                ->paginate($paginacion);

            // Registrar peticion
            $this->shared->logs();

            return $this->shared->sendResponse($estados, $this->shared->getDataMessage(), Response::HTTP_OK);
        } catch (Exception $error) {
            return $this->shared->sendError($this->shared->getDataMessageError(), ['error_detail' => $error->getMessage()]);
        }
    }

    public function downloadGeolocalizazcion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'codigo_postal' => 'required|numeric|digits_between:4,5'
        ]);

        if ($validator->fails()) {
            return $this->shared->sendError($this->shared->getValidationMessageError(), ['error_detail' => $validator->messages()]);
        }

        $codigo_postal = ltrim($request->input('codigo_postal'), '0');

        try {
            $data = $this->geolocation->generatePdf($codigo_postal);

            // Registrar peticion
            $this->shared->logs();

            set_time_limit(0);

            $pdf = Pdf::loadView('prints.geolocalizacion', compact('data'))
                ->setPaper('a4')
                ->setOption("isPhpEnabled", true)
                ->setOption('margin-top', 5)
                ->setOption('margin-bottom', 5);

            return $pdf->download($this->shared->clearString('Informacion-detallada-' . '_' . date('d-m-Y', strtotime(now()))) . '.pdf');
        } catch (Exception $error) {
            return $this->shared->sendError($this->shared->messageDownloadPdf(), ['error_detail' => $error->getMessage()]);
        }
    }
}
