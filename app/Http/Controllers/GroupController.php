<?php

namespace App\Http\Controllers;

use App\Models\{Group, Voo};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class GroupController extends Controller
{
    public function index()
    {
        $voos = Voo::all()->toArray();
        $out = array_filter($voos, fn ($voo) => $voo['outbound']);
        $in = array_filter($voos, fn ($voo) => $voo['inbound']);
        $mapVoos = array_map(function ($out) use ($in) {
            $id = Uuid::uuid4();
            foreach ($in as $value) {
                if ($value['fare'] == $out['fare'] && $value['origin'] == $out['destination']) {
                    $cost = ($value['price'] + $out['price']);
                    $idas[] = $value;
                }
            }
            $arrayMap = [
                'uniqueId' => $id,
                'totalPrice' => $cost,
                'inbound' => $idas,
                'outbound' => array($out),
            ];
            $item = Group::create($arrayMap)->toArray();
            return array_merge($item, $arrayMap);
        }, $out);
        return response()->json(array_merge(
            ['flights' => $voos],
            ['groups' => array_values($mapVoos)],
            ['totalGroups' => count($mapVoos)],
            ['cheapestPrice' => $mapVoos[0]['totalPrice']],
            ['creapestGroup' => $mapVoos[0]['uniqueId']]
        ), 200);
    }
}
