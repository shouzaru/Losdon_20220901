@extends('layouts.app')
@section('content')

<!-- ナビゲーションメニュー -->
<div class="container mt-2 mb-2">
    <ul class="nav nav-tabs">
        <il class="nav-item">
            <a href="{{ url('items') }}" class="nav-link">商品マスタ登録</a>
        </il>
        <il class="nav-item">
            <a href="{{ url('list') }}" class="nav-link active">寄付商品一覧</a>
        </il>
        <il class="nav-item">
            <a href="{{ url('deliverylist') }}" class="nav-link">納品登録</a>
        </il>
    </ul>
</div>

<!-- Item: 登録されてる商品のリスト -->
@if (count($items) > 0)
@if (count($donations) > 0)
@foreach ($items as $item)
@foreach ($donations as $donation)
@if($item->id === $donation->item_id)
<div>
    <p><img src="storage/ItemImage/{{$item->ItemImage_path}}" alt="IMage" class="img-fluid"></p>
    <table>
        <tr>
            <th>商品名</th>
            <td>{{ $item->ItemName }}</td>
        </tr>

        <tr>
            <th>登録日</th>
            <td>{{date("Y/m/d",strtotime($donation->created_at))}}</td>
        </tr>
        <tr>
            <th>今回の寄付数</th>
            <td>{{ $donation->Inventory }}</td>

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

<!-- 削除ボタン と 編集ボタン と 納品数入力ボタン-->
<table>
    <tr>
        <td>
            <form action="{{ url('items/'.$item->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger" onclick='return confirm("本当に削除しますか")'>削除</button>
            </form>
        </td>
    </tr>
    
    <tr>
        <td>
            <form action="" method="GET"> {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">寄付商品の編集</button>
            </form>
        </td>
    </tr>    
</table>
@endif
@endforeach
@endforeach
@endif
@endif
@endsection