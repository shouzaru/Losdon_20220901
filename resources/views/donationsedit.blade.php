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
            <a href="{{ url('delivery') }}" class="nav-link">納品登録</a>
        </il>
    </ul>
</div>



<div>
    <p><img src="{{asset('storage/ItemImage')}}{{'/'}}{{$item->ItemImage_path}}" alt="IMage" class="img-fluid"></p>
    <table>
        <tr>
            <th>商品名</th>
            <td>{{ $item->ItemName }}</td>
        </tr>
    </table>
</div>



<!--納品登録ボタン-->
<table>        
    <tr>
        <td>
            <form action="{{ url('donations') }}" method="POST"> 
                {{ csrf_field() }}

            <input type="hidden" name="item_id" value="{{$item->id}}">  <!-- donationsテーブルのitem_idカラムに入れるための値を送信 -->
            <p>今回の寄付数<input type="text" name="Inventory"></p>
            <p>賞味期限<input type="date" name="BestBefore"></p>
            <p>在庫地<input type="text" name="StorageLocation"></p>
            <p>在庫期限<input type="date" name="InventoryDeadline"></p>
            <p>納期<input type="text" name="DeliveryDate"></p>
            <p>荷姿<input type="text" name="Packing"></p>
            <p>備考<textarea name="remarks"></textarea></p>
            <button type="submit" class="btn btn-success">寄付商品として登録</button>
            </form>
        </td>
    </tr>
</table>







@endsection