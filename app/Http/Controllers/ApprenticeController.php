<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApprenticeController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);

        return $response->json() ?? [];
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $apprentices = $this->fetchDataFromApi($url . '/apprentices');
        $courses = $this->fetchDataFromApi($url . '/courses');
        $computers = $this->fetchDataFromApi($url . '/computers');

        return view('apprentices.index', compact('apprentices', 'courses', 'computers'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $apprentice = $this->fetchDataFromApi($url . '/apprentices/' . $id);
        $courses = $this->fetchDataFromApi($url . '/courses');
        $computers = $this->fetchDataFromApi($url . '/computers');

        return view('apprentices.show', compact('apprentice', 'courses', 'computers'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $courses = $this->fetchDataFromApi($url . '/courses');
        $computers = $this->fetchDataFromApi($url . '/computers');

        return view('apprentices.create', compact('courses', 'computers'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/apprentices', $request->all());

        return redirect()->route('apprentices.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $apprentice = $this->fetchDataFromApi($url . '/apprentices/' . $id);
        $courses = $this->fetchDataFromApi($url . '/courses');
        $computers = $this->fetchDataFromApi($url . '/computers');

        return view('apprentices.edit', compact('apprentice', 'courses', 'computers'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/apprentices/' . $id, $request->all());

        return redirect()->route('apprentices.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::delete($url . '/apprentices/' . $id);

        return redirect()->route('apprentices.index');
    }
}
