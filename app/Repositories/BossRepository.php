<?php
namespace App\Repositories;

use App\Interfaces\BossRepositoryInterface;
use App\Models\Boss;

class BossRepository implements BossRepositoryInterface {
    public function all()
    {
        return Boss::all('id','name','email');

    }
    public function find(int $id)
    {
        return Boss::find($id);
    }

    public function create(array $data)
    {
        return Boss::create($data);
    }

    public function update(int $id, array $data)
    {
        $boss = $this->find($id);
        $boss->update($data);
        return $boss;

    }
    public function delete(int $id)
    {
       return $this->find($id)->delete();

    }
}
