

{{-- <div class="my-1">
    <i class="ph-star fs-base lh-base align-top text-warning"></i>
    <i class="ph-star fs-base lh-base align-top text-warning"></i>
    <i class="ph-star fs-base lh-base align-top text-warning"></i>
    <i class="ph-star fs-base lh-base align-top text-warning"></i>
    <i class="ph-star fs-base lh-base align-top text-warning"></i>
</div>


<div class="text-muted">{{ $item->viewer()  }} viewers</div> --}}

@php
    $jmlstar = $item->viewer();
    $viewer = $jmlstar;

    /* Rumus ala-ala untuk menghitung perolahan bintang */
    $totalStar = \App\Models\Viewer::whereHas('item', function($query) use($item) {
        $query->where('category_id', $item->category_id);
    })->count();
    $totalItem = \App\Models\Item::where('category_id', $item->category_id)->count();
    $avgStar = $totalStar / $totalItem;
    $nilaiStar = $jmlstar / $totalStar;
    $jmlstar = ceil($nilaiStar * $avgStar);
@endphp
<div class="mt-1 mb-0 p-0">
    @for ($j = 1; $j <= $jmlstar; $j++)
    @if($j<=5) 
    <i class="fas fa-star fs-base lh-base align-top text-warning"></i>
    @endif
    @endfor
    @if($jmlstar < 5) 
        @for ($j = 1; $j <= 5-$jmlstar; $j++)
        <i class="ph-star fs-base lh-base align-top text-warning"></i>
        @endfor
    @endif
</div>
<div class="@if(isset($class)) {{ $class }} @else text-white @endif fs-base fw-normal pt-0 mt-0" style="@if(!\App\Helpers\Helper::isPrima($i) && !isset($class)) text-shadow: 2px 1px 2px rgba(0, 0, 0, 0.85); @endif">{{ $viewer }} viewers</div>