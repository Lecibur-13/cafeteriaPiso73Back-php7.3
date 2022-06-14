<?php

namespace App\Constants;

class ResponseCodesConstants
{
     const UNAUTHORISED = ['message' => 'SIN AUTORIZACIÓN: Vuelva a intentarlo', 'code' => 401 ];
     const UNAUTHORISED_SUBJECT = ['message' => 'No tiene autorización para abrir este asunto', 'code' => 401 ];
     const SUCCESS = ['message' => 'SUCCESS', 'code' => 200 ];
     const INTERNAL_ERROR = ['message' => 'INTERNAL_ERROR',  'code' => 500];
     const INVALID_DATA = ['message' => 'INVALID_DATA', 'code' => 422];
     const SIGNATURE_ERROR = 501;
}
