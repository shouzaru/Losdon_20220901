@extends('layouts.app')
@section('content')

<!-- ナビゲーションメニュー -->
<div class="container mt-2 mb-2">
    <ul class="nav nav-tabs">
        <il class="nav-item">
            <a href="{{ url('items') }}" class="nav-link">商品登録</a>
        </il>
        <il class="nav-item">
            <a href="{{ url('list') }}" class="nav-link">商品一覧</a>
        </il>
        <il class="nav-item">
            <a href="{{ url('delivery') }}" class="nav-link active">納品登録</a>
        </il>
    </ul>
</div>

<!-- Item: 登録されてる商品のリスト -->
@if (count($items) > 0)
@foreach ($items as $item)
<div>
    <!-- <a href="{{route('deliveries.edit',$item->id)}}"><img src="storage/ItemImage/{{$item->ItemImage_path}}" alt="IMage" class="img-fluid"></a> -->
    <p><img src="storage/ItemImage/{{$item->ItemImage_path}}" alt="IMage" class="img-fluid"></p>
    <table>
        <tr>
            <th>商品名</th>
            <td>{{ $item->ItemName }}</td>
        </tr>
        <tr>
            <th>寄付としての提供数（企業での初期在庫）</th>
            <td>{{ $item->Inventory }}</td>
        </tr>
        <tr>
            <th>納品済み</th>
            <!-- 納品済み数を計算 -->
            @php
            $totalDel=0;
            foreach($deliveries as $delivery){
                if($delivery->item_id === $item->id){
                $del = $delivery->DeliveryQuantity;
                $totalDel = $totalDel + $del;
                }
            }
            @endphp
            <td>{{$totalDel}}</td>
        </tr>

        <tr>
            <th>賞味期限</th>
            <td></td>
        </tr>
        <tr>
            <th>在庫期限</th>
            <td></td>
        </tr>
    </table>
</div>



<table>
    <tr>
        <td>
            <form action="{{ route('deliveries.edit',$item->id) }}" method="GET"> {{ csrf_field() }}
            <button type="submit" class="btn btn-success">納品情報登録画面へ</button>
            </form>
        </td>
    </tr>    
</table>


@endforeach
@endif
@endsection