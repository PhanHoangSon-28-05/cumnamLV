<?php

namespace App\Repositories\ClientAccounts;

use App\Models\ClientAccount;
use App\Repositories\BaseRepository;
use App\Repositories\ClientAccounts\ClientAccountRepositoryInterface;

class ClientAccountRepository extends BaseRepository implements ClientAccountRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return ClientAccount::class;
    }
}
