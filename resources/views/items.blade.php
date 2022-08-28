@extends('layouts.app')
 @section('content')
     <!-- Bootstrapの定形コード… -->
     <div class="card-body">
         <div class="card-title">
            トップページ/ここに商品登録した一覧が表示される
         </div>

<<<<<<< HEAD
     
     </div>
<!-- 検索フォーム -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                         <input class="form-control form-control-lg" id="item" type="text" placeholder="商品名を入力してください" data-sb-validations="required,email" />
                    </div>
                    <div class="col-lg-2"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
                 </div>
            </div>

     <!-- Item: 登録されてる商品のリスト -->
     @if (count($items) > 0)
     @if (count($donations) > 0)
     @foreach ($items as $item)
     @foreach ($donations as $donation)
     @if($item->id === $donation->item_id)
      <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- item image-->
                            <a href="{{ url('items/' .$item->id) }}">
                            <img class="card-img-top " src="storage/ItemImage/{{$item->ItemImage_path}}"  alt="Mage" />
                            </a>
                            <!-- item details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- item name-->
                                    <h5 class="fw-bolder">商品名：{{ $item->ItemName }}</h5>
                                    <!-- item 寄付数-->
                                    <p class="fs-6">寄付数：{{ $item->Inventory }}</p>
                                    <!-- 登録日 -->
                                    <p class="fs-6">登録日：{{date("Y/m/d",strtotime($donation->created_at))}}</p>
                                    
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
                                    <!-- item 納品済み -->
                                    <p class="fs-6">納品積み：{{$totalDel}}</p>  
                                    <!-- item 賞味期限-->
                                    <p class="fs-6">賞味期限：Xxx</p>
                                      <!-- item 在庫期限-->
                                    <p class="fs-6">在庫期限：Xxx</p>
                                    </div>
                            </div>
                            <!-- item-->
                            <!-- <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ url('items/' .$item->id) }}">詳細</a></div>
                            </div> -->

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
                                        <form action="{{ url('items/'.$item->id.'/edit') }}" method="GET"> {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">編集</button>
                                        </form>
                                    </td>
                                </tr>

                                <td>
            <form action="{{ route('deliveries.edit',$donation->id) }}" method="GET"> {{ csrf_field() }}
            <button type="submit" class="btn btn-success">納品情報登録画面へ</button>
            <input type="hidden" name="donation_id" value="{{$donation->id}}">  <!-- deliveryテーブルのdonatio_idカラムに入れるための値を送信 -->
            <input type="hidden" name="item_id" value="{{$donation->item_id}}">  <!-- deliveryテーブルのitem_idカラムに入れるための値を送信 -->
            </form>
        </td>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        @endforeach
        @endforeach
        @endif
        @endif

<!-- ここから翔さん記入 -->
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