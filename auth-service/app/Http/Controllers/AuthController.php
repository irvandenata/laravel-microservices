<?php
namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Repositories\AuthRepository;

class AuthController extends Controller
{

    protected $repository;
    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $user
     * @return JsonResponse
     * @internal param string $order
     * @internal param Request $request
     */
    public function doLogin(LoginRequest $request): JsonResponse
    {
        try {
            $response = $this->repository->login($request);
        }catch (HttpException $exception) {
            return new JsonResponse(
                $exception->getMessage(),
                $exception->getStatusCode()
            );
        }

        return new JsonResponse($response, 200);
    }

}
