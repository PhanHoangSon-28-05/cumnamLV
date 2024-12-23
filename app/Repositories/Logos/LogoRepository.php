<?php

namespace App\Repositories\Logos;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LogoRepository extends BaseRepository implements LogoRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Logo::class;
    }

    public function getLogo()
    {
        $logo = $this->model->where('stt', '1')->get()->first();
        if ($logo) {
            # code...
            return $logo;
        }
    }
    public function getLogoHeader()
    {
        $logo = $this->model->where('header', '1')->get()->first();
        if ($logo) {
            # code...
            return $logo;
        }
    }

    public function createLogo($stt, $pic)
    {
        $extension = $pic->getClientOriginalName();
        $filename = time() . '_' . $extension;

        $path =  $pic->storeAs('logos', $filename, 'public');

        $logo = $this->model->create([
            'stt' => trim($stt),
            'pic' => trim($path),
        ]);
        return $logo;
    }

    public function updateLogo($logoModel, $stt, $pic)
    {
        if ($pic != $logoModel->pic) {
            try {
                Storage::disk('public')->delete($logoModel->pic);
            } catch (\Throwable $th) {
                //throw $th;
            }
            $extension = $pic->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path =  $pic->storeAs('logos', $filename, 'public');
        } else {
            $path = $logoModel->pic;
        }

        $logo = $logoModel->update([
            'stt' => trim($stt),
            'pic' => trim($path),
        ]);

        return $logo;
    }

    public function deleteLogo($logoModel)
    {
        Storage::disk('public')->delete($logoModel->pic);

        return $logoModel->delete();
    }

    public function selectImage($id)
    {
        $logo = $this->model->find($id);
        $number = $logo->stt;

        $logoCancel = $this->model->where('stt', '1')->get()->first();
        if ($logoCancel) {
            # code...
            $logoCancel->update(['stt' => $number]);
        }

        $logo->update(['stt' => '1']);
    }

    public function selectLogoHeader($id)
    {
        $logo = $this->model->find($id);
        $number = $logo->header;

        $logoCancel = $this->model->where('header', '1')->get()->first();
        if ($logoCancel) {
            # code...
            $logoCancel->update(['header' => $number]);
        }

        $logo->update(['header' => '1']);
    }
}
