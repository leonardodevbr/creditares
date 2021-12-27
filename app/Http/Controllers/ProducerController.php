<?php

namespace App\Http\Controllers;

use App\Models\Log;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;

class ProducerController extends Controller
{
    public function index()
    {
        $producers = $this->getAll();

        foreach ($producers as &$producer) {
            $producer->logs = Log::where('entity_id', $producer->id)
                ->orderBy('created_at', 'DESC')
                ->get()
                ->toArray();
        }

        return view('producers.index', compact('producers'));
    }

    public function show($id)
    {
        $producer = $this->getById($id);

        if (empty($producer)) {
            return redirect(route('producers.index'))
                ->withErrors(['error' => 'Produtor não encontrado.']);
        }

        $logs = Log::where('entity_id', $id)
            ->orderBy('created_at', 'DESC')
            ->get()
            ->toArray();

        $this->log($id);

        return view('producers.show', compact('producer', 'logs'));
    }

    private function getAll()
    {
        $producers = [];

        try {
            $client = new Client([
                'base_uri' => env('API_CREDITARES_BASE_URL')
            ]);

            $params = [
                'query' => [
                    'key' => env('API_CREDITARES_KEY')
                ]
            ];

            $request = $client->get('produtores', $params);

            $response = json_decode($request->getBody()->getContents());

            if (isset($response->error)) {
                return redirect(route('home'))
                    ->withErrors(['error' => $response->error]);
            }

            $producers = $response;

        } catch (ClientException $e) {
            return back()
                ->withErrors(['error' => $e->getResponse()->getBody()->getContents()]);
        }

        return $producers;
    }

//  Essa funcao foi criada por não existir um endpoint específico para a exibiçao de um produtor.
    private function getById($id)
    {
        $producers = $this->getAll();
        $producer = [];

        foreach ($producers as $item) {
            if ($item->id == $id) {
                $producer = $item;
            }
        }

        return $producer;
    }

    private function log($entityId)
    {
        try {
            $log = Log::create([
                'type' => 'producers',
                'entity_id' => $entityId,
                'message' => 'Produtor visualizado'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Log cadastrado com sucesso.',
                'data' => $log
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => []
            ], 400);
        }
    }
}
