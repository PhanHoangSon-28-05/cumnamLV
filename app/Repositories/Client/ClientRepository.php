<?php

namespace App\Repositories\Client;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClientRepository extends BaseRepository implements ClientRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\ClientTestimonials::class;
    }

    public function getClient()
    {
        return $this->model->orderBy('created_at', 'DESC')->take(7)->get();
    }

    public function createClient($stt, $title, $description, $pic, $pic2, $link)
    {
        $extension = $pic->getClientOriginalName();
        $filename = time() . '_' . $extension;
        $path =  $pic->storeAs('Clients', $filename, 'public');

        $extension2 = $pic2->getClientOriginalName();
        $filename2 = time() . '_' . $extension2;
        $path2 =  $pic2->storeAs('Clients', $filename2, 'public');

        $client = $this->model->create([
            'stt' => trim($stt),
            'title' => trim($title),
            'description' => trim($description),
            'pic' => trim($path),
            'pic2' => trim($path2),
            'link' => trim($link),
        ]);
        return $client;
    }

    public function updateClient($clientModel, $stt, $title, $description, $pic, $pic2, $link)
    {
        if ($pic != $clientModel->pic) {
            try {
                Storage::disk('public')->delete($clientModel->pic);
            } catch (\Throwable $th) {
                //throw $th;
            }
            $extension = $pic->getClientOriginalName();
            $filename = time() . '_' . $extension;

            $path =  $pic->storeAs('Clients', $filename, 'public');
        } else {
            $path = $clientModel->pic;
        }

        if ($pic2 != $clientModel->pic2) {
            try {
                Storage::disk('public')->delete($clientModel->pic2);
            } catch (\Throwable $th) {
                //throw $th;
            }
            $extension2 = $pic2->getClientOriginalName();
            $filename2 = time() . '_' . $extension2;

            $path2 =  $pic2->storeAs('Clients', $filename2, 'public');
        } else {
            $path2 = $clientModel->pic2;
        }

        $client = $clientModel->update([
            'stt' => trim($stt),
            'title' => trim($title),
            'description' => trim($description),
            'pic' => trim($path),
            'pic2' => trim($path2),
            'link' => trim($link),
        ]);

        return $client;
    }

    public function deleteClient($clientModel)
    {
        Storage::disk('public')->delete($clientModel->pic);

        return $clientModel->delete();
    }

    public function getClientGet3()
    {
        return $this->model->orderBy('stt', 'ASC')->take(3)->get();
    }
}
