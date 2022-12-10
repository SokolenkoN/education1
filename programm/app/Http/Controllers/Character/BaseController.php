<?php


namespace App\Http\Controllers\Character;


use App\Http\Controllers\Controller;
use App\Services\Character\Service;

class BaseController extends Controller
{
        public $service;

        public function __construct(Service $service)
        {
            $this->service = $service;
        }
}
