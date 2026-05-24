<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MarketController extends Controller
{
    public function index()
    {
        return view('market.index');
    }

    public function chartData(Request $request)
    {
        $symbol = strtoupper($request->query('symbol', 'BTCUSDT'));
        $type   = $request->query('type', 'crypto');
        $range  = $request->query('range', '1w');

        $interval = match($range) {
            '1d' => $type === 'crypto' ? '15m'  : '15min',
            '1w' => $type === 'crypto' ? '1h'   : '1h',
            '1m' => $type === 'crypto' ? '4h'   : '4h',
            '1y' => $type === 'crypto' ? '1d'   : '1day',
            default => $type === 'crypto' ? '1h' : '1h',
        };

        $limit = match($range) {
            '1d' => 96,
            '1w' => 168,
            '1m' => 180,
            '1y' => 365,
            default => 168,
        };

        try {
            if ($type === 'crypto') {
                return $this->fetchCryptoData($symbol, $interval, $limit);
            } else {
                return $this->fetchStockData($symbol, $interval, $limit);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch market data: ' . $e->getMessage()], 500);
        }
    }

    private function fetchCryptoData(string $symbol, string $interval, int $limit)
    {
        $response = Http::timeout(10)->get('https://api.binance.com/api/v3/klines', [
            'symbol'   => $symbol,
            'interval' => $interval,
            'limit'    => $limit,
        ]);

        if (!$response->successful()) {
            return response()->json(['error' => 'Binance API error: ' . $response->body()], 500);
        }

        $candles = collect($response->json())->map(fn($k) => [
            'time'  => intval($k[0] / 1000),
            'open'  => floatval($k[1]),
            'high'  => floatval($k[2]),
            'low'   => floatval($k[3]),
            'close' => floatval($k[4]),
        ])->values();

        return response()->json($candles);
    }

    private function fetchStockData(string $symbol, string $interval, int $limit)
    {
        $apiKey = config('services.twelvedata.key');

        if (!$apiKey || $apiKey === 'your_key_here') {
            return response()->json([
                'error' => 'Stock data requires a Twelve Data API key. Get your free key at twelvedata.com/pricing, then set TWELVE_DATA_KEY in your .env file.'
            ], 500);
        }

        $response = Http::timeout(10)->get('https://api.twelvedata.com/time_series', [
            'symbol'      => $symbol,
            'interval'    => $interval,
            'outputsize'  => $limit,
            'apikey'      => $apiKey,
            'format'      => 'JSON',
        ]);

        if (!$response->successful()) {
            return response()->json(['error' => 'Twelve Data API error'], 500);
        }

        $data = $response->json();

        if (isset($data['status']) && $data['status'] === 'error') {
            return response()->json(['error' => $data['message'] ?? 'Unknown API error'], 500);
        }

        if (!isset($data['values'])) {
            return response()->json(['error' => 'No data returned for this symbol.'], 500);
        }

        // Twelve Data returns newest-first, so reverse
        $candles = collect(array_reverse($data['values']))->map(fn($v) => [
            'time'  => strtotime($v['datetime']),
            'open'  => floatval($v['open']),
            'high'  => floatval($v['high']),
            'low'   => floatval($v['low']),
            'close' => floatval($v['close']),
        ])->values();

        return response()->json($candles);
    }
}
