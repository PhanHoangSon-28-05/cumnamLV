<?php

namespace App\Repositories\Footers;

use App\Repositories\RepositoryInterface;

interface FooterRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getFooter();
    public function updateFooter(
        $title1,
        $content11,
        $content12,
        $content13,
        $content14,
        $title2,
        $content21,
        $content22,
        $content23,
        $title3,
        $content31,
    );
}
