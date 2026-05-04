<?php
namespace App\Http\Controllers\Api;

use App\Http\Requests\BossRequest;
use App\Services\BossService;
use Illuminate\Http\Request;

// use Symfony\Component\Console\SingleCommandApplication;



class BossControllerTest {
    public function __construct(private BossService $boss_service)
    {} // singleton ===

    public function store(BossRequest $bossRequest){

        $bossStore = $this ->boss_service->createBoss($bossRequest->validated()); // without DTO => Data Transfere Object //

        return response()->json([
            'message' => 'boss created success',
            'data' => $bossStore->name,
            'status' => 201
        ] , 200);

    }

    public function show(int $id) {

    try {

        return response() -> json($this->boss_service->getBoss($id) , 200);
    } catch(\Exception $e){
        return response()->json([
            'message' => $e->getMessage(),
            'status' => 404
        ] , 404);
    }
    }

    public function index() {
        return response() -> json([
            'message' => 'all user retrieved success' ,
            'data' => $this->boss_service->all(),
            'status' => 200
        ] , 200);
    }

    public function update(int $id , Request $request) {

        try{
     $update =  $request->validate([
            'name' => 'string|min:4',
        ]);

        $bossUpdate = $this -> boss_service->updateBoss($id , $update );

        return response()->json([
            'message' => 'data updated' ,
            'data' => $bossUpdate->name,
            'status' => 200
        ] , 200);
        } catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 404
            ] , 404 );

        }


    }
}
