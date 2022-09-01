@extends('layouts.app')
@section('content')
    <div class="card-body">
        <div class="card-title">
            商品マスタ登録
        </div>
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
<div class="row">
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>JANコード/ITFコード</th>
                        <th>商品画像</th>
                        <th>商品名</th>
                        <th>商品寸法</th>
                        <th>商品重量</th>
                        <th>箱寸法（外寸）</th>
                        <th>入数</th>
                        <th>小売希望価格</th>

                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <!-- JAN -->
                                <td class="table-text">
                                    <div>{{ $item->JANcode }}</div>
                                </td>
                                <!-- 商品画像 -->
                                <td class="table-text">
                                <img class="table-img" src="storage/ItemImage/{{$item->ItemImage_path}}"  alt="Mage" />
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
                                 <!-- ボックスサイズ -->
                               <td class="table-text">
                                    <div>{{ $item->BoxSize }}</div>
                                </td>
                                 <!-- 入り数 -->
                               <td class="table-text">
                                    <div>{{ $item->NumofItems }}</div>
                                </td>
                                  <!-- 小売希望価格 -->
                               <td class="table-text">
                                    <div>{{ $item->RetailPrice }}</div>
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
                                    <button type="submit" class="btn btn-success">この商品を寄付する </button>
                                </form>
                                </td>
                            </tr>


                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>


@endsection