<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExchangePost;
use App\Services\ExchangeService;
use Illuminate\Http\Request;

class ExchangeController extends Controller
{
    private $exchangeService;

    public function __construct(ExchangeService $exchangeService)
    {
        $this->exchangeService = $exchangeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usd = '';
        $exchangeResult = '';
        return view('index', ['exchangeResult' => $exchangeResult, 'usd' => $usd]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ExchangePost $request)
    {
        $cadRate = $this->exchangeService->getUsdToCadRate();
        $jpyRate = $this->exchangeService->getUsdToJpyRate();
        $createUsd = $request->exchange;
        $usd = $this->exchangeService->getUsd($createUsd);
        $exchangeResult = $this->exchangeService->convertUsdToJpy($jpyRate, $cadRate, $usd);

        return view('index', ['exchangeResult' => $exchangeResult, 'usd' => $usd]);
    }

}
