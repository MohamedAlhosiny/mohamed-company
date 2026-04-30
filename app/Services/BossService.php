<?php

namespace App\Services;

use App\Interfaces\BossRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class BossService {
    public function __construct(  private BossRepositoryInterface $userRepository)
    {}
    public function createUser(array $data) {

        $data['password'] = Hash::make($data['password']);

        return $this->userRepository->create($data);

    }

    public function getUser(int $id) {
        return $this->userRepository->find($id);
    }
}
