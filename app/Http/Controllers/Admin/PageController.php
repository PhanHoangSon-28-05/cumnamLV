<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Page\PageRepositoryInterface;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $pageRepo;

    public function __construct(
        PageRepositoryInterface $pageRepo
    ) {
        $this->pageRepo = $pageRepo;
    }
    public function edit($id)
    {
        $page = $this->pageRepo->find($id);
        return view('admins.page.edit', [
            'page' => $page,
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'description' => 'nullable|string',
                'content' => 'nullable',
            ]);
            $page = $this->pageRepo->updatePage($id, $validatedData);

            return response()->json(['success' => true]);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $this->pageRepo->delete($id);
            return redirect()->route('pages.index')->with('success', 'Page Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->route('pages.index')->with('fail' . $th->getMessage());
        }
    }

    public function index()
    {
        return view('admins.page.index');
    }
}
