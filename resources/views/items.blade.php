@extends('layouts.app')
 @section('content')
     <!-- Bootstrapの定形コード… -->
     <div class="card-body">
         <div class="card-title">
            トップページ/ここに商品登録した一覧が表示される
         </div>

     
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
     @foreach ($items as $item)
      <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">


                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- item image-->
                            <a href="{{ url('/show') }}">
                            <img class="card-img-top " src="storage/ItemImage/{{$item->ItemImage_path}}"  alt="Mage" />
                            </a>
                            <!-- item details-->
                            <div class="card-body p-4">
                            <a href="{{ url('/show') }}">
                            <p class="fs-7">9498594859494</p>
                            </a>
                                <div class="text-center">
                                    <!-- item name-->
                                    <h5 class="fw-bolder">商品名：{{ $item->ItemName }}</h5>
                                    <!-- item 提供数-->
                                    <p class="fs-6">提供数：{{ $item->Inventory }}</p>
                                      <!-- item 納品積み-->
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
                                    <p class="fs-6">納品積み：{{$totalDel}}</p>  
                                    <!-- item 賞味期限-->
                                    <p class="fs-6">賞味期限：Xxx</p>
                                      <!-- item 在庫期限-->
                                    <p class="fs-6">在庫期限：Xxx</p>
                                </>
                            </div>
                            <!-- item-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ url('items/' .$item->id) }}">詳細</a></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
              
                
            </div>
            @endforeach
                @endif
        </section>

      


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


   


@endsection