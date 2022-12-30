<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Presenters\User\CreateUserPresenter;
use App\Presenters\User\ListUsersPresenter;
use Core\User\Application\Dto\ListUsersInputDto;
use Core\User\Application\UseCase\CreateUserUseCase;
use Core\User\Application\Dto\CreateUserInputDto;
use Core\User\Application\UseCase\ListUsersUseCase;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseCode;
use Throwable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param ListUsersUseCase $useCase
     * @return Response
     */
    public function index(Request $request, ListUsersUseCase $useCase)
    {
        try {
            $input = new ListUsersInputDto(
                filter: $request->get('filter', ''),
                order: $request->get('order', 'DESC')
            );

            $response = $useCase->execute($input);

            return response()->json((new ListUsersPresenter)->json($response), ResponseCode::HTTP_OK);

        } catch (Throwable $e) {
            return response()->json(["error" => $e->getMessage()], ResponseCode::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @param CreateUserUseCase $useCase
     * @return Response
     */
    public function store(StoreUserRequest $request, CreateUserUseCase $useCase)
    {
        try {
            $input = new CreateUserInputDto(
                name: $request->name,
                email: $request->email,
                password: $request->password
            );

            $response = $useCase->execute($input);

            return response()->json((new CreateUserPresenter($response))->toJson(), ResponseCode::HTTP_CREATED);

        } catch (Throwable $e) {
            return response()->json(["error" => $e->getMessage()], ResponseCode::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
