<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Helpers\SharedFunctionsHelpers;
use App\Models\Codigo_Postal_Municipio;
use Illuminate\Http\Response;
use App\Models\Codigo_Postal;
use Illuminate\Http\Request;
use App\Models\Estado_Pais;
use App\Models\Colonia;
use Exception;

class ApiController extends BaseController
{
    protected $shared;

    public function __construct(SharedFunctionsHelpers $shared)
    {
        $this->shared = $shared;
    }

    public function ubicacionPorCodigoPostal($codigo_postal)
    {
        try {
            $codigos_postales_municipios = Codigo_Postal_Municipio::with('municipio.estadoPais', 'codigoPostal', 'colonia.tipoComunidad')
                ->whereHas('codigoPostal', function ($query) use ($codigo_postal) {
                    $query->where('codigo', $codigo_postal);
                })
                ->firstOrFail();

            return $this->shared->sendResponse($codigos_postales_municipios, $this->shared->getDataMessage(), Response::HTTP_OK);
        } catch (Exception $error) {
            return $this->shared->sendError($this->shared->getDataMessageError(), ['error_detail' => $error->getMessage()]);
        }
    }

    public function codigosPostales($paginacion = 20)
    {
        try {
            $codigos_postales = Codigo_Postal::select('id', 'codigo')
                ->orderBy('id', 'ASC')
                ->paginate($paginacion);

            return $this->shared->sendResponse($codigos_postales, $this->shared->getDataMessage(), Response::HTTP_OK);
        } catch (Exception $error) {
            return $this->shared->sendError($this->shared->getDataMessageError(), ['error_detail' => $error->getMessage()]);
        }
    }

    public function colonia($colonia)
    {
        try {
            $colonia = Colonia::with('tipoComunidad')->where('nombre', $colonia)->firstOrFail();

            return $this->shared->sendResponse($colonia, $this->shared->getDataMessage(), Response::HTTP_OK);
        } catch (Exception $error) {
            return $this->shared->sendError($this->shared->getDataMessageError(), ['error_detail' => $error->getMessage()]);
        }
    }

    public function colonias($paginacion = 20)
    {
        try {
            $colonias = Colonia::orderBy('id', 'ASC')->paginate($paginacion);

            return $this->shared->sendResponse($colonias, $this->shared->getDataMessage(), Response::HTTP_OK);
        } catch (Exception $error) {
            return $this->shared->sendError($this->shared->getDataMessageError(), ['error_detail' => $error->getMessage()]);
        }
    }

    public function estado($estado)
    {
        try {
            $estado = Estado_Pais::where('nombre', $estado)->firstOrFail();

            return $this->shared->sendResponse($estado, $this->shared->getDataMessage(), Response::HTTP_OK);
        } catch (Exception $error) {
            return $this->shared->sendError($this->shared->getDataMessageError(), ['error_detail' => $error->getMessage()]);
        }
    }

    public function estados($paginacion = 20)
    {
        try {
            $estados = Estado_Pais::orderBy('id', 'ASC')->paginate($paginacion);

            return $this->shared->sendResponse($estados, $this->shared->getDataMessage(), Response::HTTP_OK);
        } catch (Exception $error) {
            return $this->shared->sendError($this->shared->getDataMessageError(), ['error_detail' => $error->getMessage()]);
        }
    }
}