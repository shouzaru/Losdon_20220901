@extends('layouts.app')
@section('content')

<!-- ナビゲーションメニュー -->
<div class="container mt-2 mb-2">
    <ul class="nav nav-tabs">
        <il class="nav-item">
            <a href="{{ url('items') }}" class="nav-link active">商品登録</a>
        </il>
        <il class="nav-item">
            <a href="{{ url('list') }}" class="nav-link">商品一覧</a>
        </il>
        <il class="nav-item">
            <a href="{{ url('delivery') }}" class="nav-link">納品登録</a>
        </il>
    </ul>
</div>


    <div class="card-body">
        <div class="card-title">
            寄付商品の登録
        </div>
        
        <!-- バリデーションエラーの表示に使用ここから-->
        <!-- resources/views/common/errors.blade.php -->
        @if (count($errors) > 0)
            <!-- Form Error List -->
            <div class="alert alert-danger">
                <div><strong>入力した文字を修正してください。</strong></div> 
                <div>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <!-- バリデーションエラーの表示に使用ここまで-->

        <!-- 登録フォーム -->
        <form action="{{ url('items') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}

            <!-- JANコード/ITFコード -->
            <div class="form-group">
                <label for="JAN">JANコード/ITFコード</label>
                <div class="col-sm-6">
                    <input type="text" name="JANcode" class="form-control">
                </div>
            </div>

            <!-- 商品名 -->
            <div class="form-group">
                <label for="ItemName">商品名</label>
                <div class="col-sm-6">
                    <input type="text" name="ItemName" class="form-control">
                </div>
            </div>

        <!-- 商品画像 -->
        <div class="form-group">
                <label for="ItemImage">商品画像</label>
                <div class="col-sm-6">
                    <input id="fileUploader" type="file" name="ItemImage" accept='image/' enctype="multipart/form-data" class="form-control" required autofocus>
                </div>
            </div>

        <!-- 商品重量 -->
        <div class="form-group">
                <label for="ItemWeight">商品重量</label>
                <div class="col-sm-6">
                    <input type="text" name="ItemWeight" class="form-control">
                </div>
            </div>

            <!-- 商品寸法 -->
        <div class="form-group">
                <label for="ItemSize">商品寸法</label>
                <div class="col-sm-6">
                    <input type="text" name="ItemSize" class="form-control">
                </div>
            </div>
            
            <!-- 箱寸法（外寸） -->
        <div class="form-group">
                <label for="BoxSize">箱寸法（外寸）</label>
                <div class="col-sm-6">
                    <input type="text" name="BoxSize" class="form-control">
                </div>
            </div>
            
            <!-- 商品重量 -->
        <div class="form-group">
                <label for="TempRange">温度帯（常温／冷蔵／冷凍）</label>
                <div class="col-sm-6">
                    <input type="text" name="TempRange" class="form-control">
                </div>
            </div>
            
            <!-- 入数 -->
        <div class="form-group">
                <label for="NumofItems">入数</label>
                <div class="col-sm-6">
                    <input type="text" name="NumofItems" class="form-control">
                </div>
            </div>
            
            <!-- 小売希望価格 -->
        <div class="form-group">
                <label for="RetailPrice">小売希望価格</label>
                <div class="col-sm-6">
                    <input type="text" name="RetailPrice" class="form-control">
                </div>
            </div>
            
            <!-- 在庫数量 -->
        <div class="form-group">
                <label for="Inventory">寄付としての提供数（企業での初期在庫）</label>
                <div class="col-sm-6">
                    <input type="text" name="Inventory" class="form-control">
                </div>
            </div>
            
            <!-- 賞味期限 -->
        <div class="form-group">
                <label for="BestBefore">賞味期限</label>
                <div class="col-sm-6">
                    <input type="date" name="BestBefore" class="form-control">
                </div>
            </div>
            
            <!-- 在庫地 -->
        <div class="form-group">
                <label for="StorageLocation">在庫地</label>
                <div class="col-sm-6">
                    <input type="text" name="StorageLocation" class="form-control">
                </div>
            </div>
            
            <!-- 在庫期限 -->
        <div class="form-group">
                <label for="InventoryDeadline">在庫期限</label>
                <div class="col-sm-6">
                    <input type="date" name="InventoryDeadline" class="form-control">
                </div>
            </div>
            
            <!-- 納期（出荷依頼してX日） -->
        <div class="form-group">
                <label for="DeliveryDate">納期（出荷依頼してX日）</label>
                <div class="col-sm-6">
                    <input type="text" name="DeliveryDate" class="form-control">
                </div>
            </div>
            
            <!-- 荷姿（パレット/バラ積み） -->
        <div class="form-group">
                <label for="Packing">荷姿（パレット/バラ積み）</label>
                <div class="col-sm-6">
                    <input type="text" name="Packing" class="form-control">
                </div>
            </div>
            

            <!-- 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                    登録
                    </button>
                </div>
            </div>
        </form>
    </div>




@endsection