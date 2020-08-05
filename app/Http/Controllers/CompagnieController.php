<?php

namespace App\Http\Controllers;

use App\Compagnie;
use App\Events\ExampleEvent;
use App\Requests\Request;

class CompagnieController extends Controller
{
    public function __construct(Compagnie $compagnie, Request $request)
    {
        $this->compagnie = $compagnie;
        $this->request = $request;
    }
    public function index()
    {
        if (request('q') != null) {

            $compagnies['data'] = $this->compagnie->where('name', 'like', '%' . request('q') . '%')->get();
            return $compagnies;
        } else {
            return $this->refresh();
        }
    }
    public function store(Request $request)
    {
        $this->compagnie->create($this->request->setCompagnies());

        return $this->refresh();
    }
    public function edit($id)
    {

        $compagnie = $this->compagnie->find($id);

        return $compagnie;
    }
    public function update($id)
    {
        $this->compagnie->where('id', $id)->update($this->request->setCompagnies());

        return $this->refresh();
    }
    public function delete($id)
    {

        $compagnie = $this->compagnie->find($id);
        if ($compagnie->delete()) {
            return $this->refresh();
        } else {
            return response()->json(['error' => 'destroy failed'], 425);
        }
    }
    public function refresh()
    {
        $compagnies = $this->compagnie->paginate(10);
        return $compagnies;
    }
}
