<?php

namespace App\Controller;

use App\Service\CryptoService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Annotations\Response as OaResponse;
use OpenApi\Annotations\JsonContent;
use OpenApi\Annotations\Items;
use OpenApi\Annotations\Tag;
use OpenApi\Annotations\Parameter;
use App\Model\CryptoListResponse;
use OpenApi\Annotations\Schema;

class TestController extends AbstractController
{
    private $cryptoService;

    public function __construct(CryptoService $cryptoService)
    {
        $this->cryptoService = $cryptoService;
    }

    /**
     * @Route("/api/cryptos", methods={"GET"})
     * @OaResponse(
     *     response=200,
     *     description="Returns",
     *     @JsonContent(
     *        type="array",
     *        @Items(ref=@Model(type=CryptoListResponse::class, groups={"full"}))
     *     )
     * )
     * @Parameter(
     *     name="name",
     *     in="query",
     *     required=true,
     *     description="The field used get crypto by name",
     *     @Schema(type="string")
     * )
     * @Parameter(
     *     name="dateFrom",
     *     in="query",
     *     required=false,
     *     description="The field used to date from, enter integer(Timestamp), example - 1654427862, default = 0",
     *     @Schema(type="integer")
     * )
     * @Parameter(
     *     name="dateTo",
     *     in="query",
     *     required=false,
     *     description="The field used to date to, enter integer(Timestamp), example - 1654427862, default = current day",
     *     @Schema(type="integer")
     * )
     *
     * @Tag(name="cryptos")
     */
    public function getCryptos(Request $request): Response
    {
        $time = new \DateTime();
        $currenDate = $time->getTimestamp();

        $dateFrom = ($request->query->get('dateFrom') !== null)?$request->query->get('dateFrom'):0;
        $dateTo = ($request->query->get('dateTo') !== null)?$request->query->get('dateTo'):$currenDate;

        $crypto = $this->cryptoService->getAllCryptos($request->query->get('name'),$dateFrom,$dateTo);
        return $this->json($crypto);
    }

}
