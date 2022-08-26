@extends('layouts.app')
@section('content')

<!-- ナビゲーションメニュー -->
<div class="container mt-2 mb-2">
    <ul class="nav nav-tabs">
        <il class="nav-item">
            <a href="{{ url('items') }}" class="nav-link active">商品マスタ登録</a>
        </il>
        <il class="nav-item">
            <a href="{{ url('list') }}" class="nav-link">寄付商品一覧</a>
        </il>
        <il class="nav-item">
            <a href="{{ url('delivery') }}" class="nav-link">納品登録</a>
        </il>
    </ul>
</div>


    <div class="card-body">
        <div class="card-title">
            寄付商品マスタの登録
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
                <label for="NumofItems">入数/箱</label>
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

            <!-- 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                    商品マスタとして登録
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Item: 既に登録されてる商品のリスト -->
    @if (count($items) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>商品マスタ一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <!-- JAN -->
                                <td class="table-text">
                                    <div>{{ $item->JANcode }}</div>
                                </td>
                                <!-- 商品名 -->
                                <td class="table-text">
                                    <div>{{ $item->ItemName }}</div>
                                </td>
                                <!-- 商品重量 -->
                                <td class="table-text">
                                    <div>{{ $item->ItemWeight }}</div>
                                </td>
                            <!-- 商品寸法 -->
                            <td class="table-text">
                                    <div>{{ $item->ItemSize }}</div>
                                </td>

                                <!-- 商品マスタの編集 -->
                                <td>
                                <form action="{{ url('items/'.$item->id.'/edit') }}" method="GET"> {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary">商品マスタの編集 </button>
                                </form>
                                </td>

                                <!-- 寄付商品の登録 -->
                                <td>
                                <form action="{{ url('donations/'.$item->id.'/edit') }}" method="GET"> {{ csrf_field() }}
                                    <button type="submit" class="btn btn-success">寄付商品の登録 </button>
                                </form>
                                </td>
                            </tr>


                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>		
@endif



@endsection