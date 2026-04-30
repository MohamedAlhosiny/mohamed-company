<?php
namespace App\Http\Controllers\Api;

use App\Http\Requests\BossRequest;
use App\Services\BossService;

class BossControllerTest {
    public function __construct(private BossService $boss_service)
    {}

    public function store(BossRequest $bossRequest){
        $bossStore = $this ->boss_service->createUser($bossRequest->validated());
        return response()->json([
            'message' => 'boss created success',
            'data' => $bossStore->name,
            'status' => 201
        ] , 200);
    }

    public function show(int $id) {
    return response() -> json($this->boss_service->getUser($id) , 200);
    }
}
