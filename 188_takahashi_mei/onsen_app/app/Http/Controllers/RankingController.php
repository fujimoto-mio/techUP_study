<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Onsen;

class RankingController extends Controller
{
    private $rankingTypes = [
        'overall' => '人気の温泉',
        'review_count' => 'レビュー数が多い温泉'
    ];

    // ランキング一覧
    public function index()
    {
        $rankingTypes = $this->rankingTypes;

        return view('rankings.index', compact('rankingTypes'));
    }

    // ランキング詳細
    public function show($type)
    {
        if (!array_key_exists($type, $this->rankingTypes)) {
            abort(404);
        }

        if ($type === 'overall') {

            $rankings = Onsen::with('tags')
                ->select(
                    'onsens.id',
                    'onsens.name',
                    'onsens.address',
                    'onsens.description',
                    DB::raw('AVG(reviews.rating) as avg_rating'),
                    DB::raw('COUNT(reviews.id) as review_count'),
                    DB::raw('AVG(reviews.rating) * LOG(COUNT(reviews.id) + 1) as score')
                )
                ->join('reviews', 'onsens.id', '=', 'reviews.onsen_id')
                ->groupBy(
                    'onsens.id',
                    'onsens.name',
                    'onsens.address',
                    'onsens.description'
                )
                ->havingRaw('COUNT(reviews.id) >= 3')
                ->orderByDesc('score')
                ->orderByDesc('review_count')
                ->orderBy('onsens.id')
                ->get();
        } elseif ($type === 'review_count') {

            $rankings = Onsen::with('tags')
                ->select(
                    'onsens.id',
                    'onsens.name',
                    'onsens.address',
                    'onsens.description',
                    DB::raw('AVG(reviews.rating) as avg_rating'),
                    DB::raw('COUNT(reviews.id) as review_count')
                )
                ->join('reviews', 'onsens.id', '=', 'reviews.onsen_id')
                ->groupBy(
                    'onsens.id',
                    'onsens.name',
                    'onsens.address',
                    'onsens.description'
                )
                ->orderByDesc('review_count')
                ->orderByDesc('avg_rating')
                ->orderBy('onsens.id')
                ->get();
        }

        return view('rankings.show', [
            'rankings' => $rankings,
            'title' => $this->rankingTypes[$type]
        ]);
    }
}