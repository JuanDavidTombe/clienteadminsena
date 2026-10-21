<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TrainingCenterController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);

        return $response->json() ?? [];
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $trainingCenters = $this->fetchDataFromApi($url . '/training-centers');

        return view('training-centers.index', compact('trainingCenters'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $trainingCenter = $this->fetchDataFromApi($url . '/training-centers/' . $id);

        return view('training-centers.show', compact('trainingCenter'));
    }

    public function create()
    {
        return view('training-centers.create');
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/training-centers', $request->all());

        return redirect()->route('training-centers.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $trainingCenter = $this->fetchDataFromApi($url . '/training-centers/' . $id);

        return view('training-centers.edit', compact('trainingCenter'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/training-centers/' . $id, $request->all());

        return redirect()->route('training-centers.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::delete($url . '/training-centers/' . $id);

        return redirect()->route('training-centers.index');
    }
}
