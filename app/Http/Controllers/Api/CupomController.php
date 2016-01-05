<?php

namespace ecommerce\Http\Controllers\Api;



use ecommerce\Http\Controllers\Controller;
use ecommerce\Repositories\CupomRepository;

class CupomController extends Controller
{


    /**
     * @var CupomRepository
     */
    private $cupomRepository;

    public function __construct(CupomRepository $cupomRepository)

    {

        $this->cupomRepository = $cupomRepository;
    }


    public function show($code)
    {

        return $this->cupomRepository->skipPresenter(false)->findByCode($code);


    }
}



