<?php


namespace App\Http\Controllers\Fraction;

use App\Http\Controllers\Controller;
use App\Services\Fraction\Service;

class BaseController extends Controller
{
        public $service;

        public function __construct(Service $service)
        {
            $this->service = $service;
        }
}
