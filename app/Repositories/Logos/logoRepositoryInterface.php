<?php

namespace App\Repositories\Logos;

use App\Repositories\RepositoryInterface;

interface LogoRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getLogo();
    public function getLogoHeader();
    public function createLogo($stt, $pic);
    public function updateLogo($logoModel, $stt, $pic);
    public function deleteLogo($logoModel);
    public function selectImage($id);
    public function selectLogoHeader($id);
}
