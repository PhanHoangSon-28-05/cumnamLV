<?php

namespace App\Repositories\Client;

use App\Repositories\RepositoryInterface;

interface ClientRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getClient();
    public function createClient($stt, $title, $description, $pic);
    public function updateClient($clientModel, $stt, $title, $description, $pic);
    public function deleteClient($clientModel);
    public function getClientGet3();
}
