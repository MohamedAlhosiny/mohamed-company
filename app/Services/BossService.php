<?php

namespace App\Services;

use App\Interfaces\BossRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Hash;

class BossService {
    public function __construct(  private BossRepositoryInterface $userRepository)
    {}
    public function createBoss(array $data) {

        $data['password'] = Hash::make($data['password']);

        return $this->userRepository->create($data);

    }

    public function getBoss(int $id) {

        $getBoss = $this->userRepository->find($id);

        if (!$getBoss) {
            throw new \Exception("this boss not found");
        }
        return $this->userRepository->find($id);
        }

    public function all() {
        return $this->userRepository->all();
    }

    public function updateBoss(int $id , array $data) {

        $boss =  $this->userRepository->find($id);
        if (!$boss) {

        throw new \Exception('This boss not found');
        }


            return $this -> userRepository -> update($id , $data);

    }


}
