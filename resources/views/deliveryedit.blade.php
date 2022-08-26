@extends('layouts.app')
@section('content')





<div>
    <p><img src="{{asset('storage/ItemImage')}}{{'/'}}{{$item->ItemImage_path}}" alt="IMage" class="img-fluid"></p>
    <table>
    <tr>
            <th>donation->id</th>
            <td></td>
        </tr>
    <tr>
    <tr>
            <th>Item->item_id</th>
            <td>{{$item->id}}</td>
        </tr>

    <tr>
            <th>donation->item_id</th>
            <td></td>
        </tr>

        <tr>
            <th>商品名</th>
            <td>{{ $item->ItemName }}</td>
        </tr>
        <tr>
        <th>今回の寄付数</th>
            <td></td>
        </tr>
        <tr>
            <th>納品済み</th>
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



<!-- 納品履歴 -->
<h3>納品履歴</h3>
    @foreach($deliveries as $delivery)  <!-- 納品テーブルから1件ずつ取り出す -->
        @if($delivery->donation_id === $donation->id) <!-- 納品テーブルの'item_id' と 商品テーブルの'id' が一致した時のみ -->
        <p> {{date("Y/m/d",strtotime($delivery->date))}}{{'：'}}{{$delivery->DeliveryQuantity}}</p>  <!-- 納品テーブルから 登録日時：納品数量 を取り出して表示する -->
        @endif
    @endforeach

<!--納品登録ボタン-->
<table>        
    <tr>
        <td>
            <form action="{{ url('deliveries') }}" method="POST"> 
                {{ csrf_field() }}

            <input type="hidden" name="donation_id" value="{{$donation->id}}">  <!-- deliveryテーブルのitem_idカラムに入れるための値を送信 -->
            <input type="hidden" name="item_id" value="{{$donation->item_id}}">  <!-- deliveryテーブルのitem_idカラムに入れるための値を送信 -->
            <p>納品日：<input type="date" name="date"></p>
            <p>納品数量：<input type="text" name="DeliveryQuantity"></p>
            <button type="submit" class="btn btn-success">納品登録</button>
            </form>
        </td>
    </tr>
</table>







@endsection