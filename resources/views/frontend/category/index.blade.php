@extends('frontend.layouts.app_frontend')
@section('content')

    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-lg-12">

                <div class="breadcumb">
                    <a href="#">{{ $category->name }}</a>
                    <span class="breadcumb-icon mx-1"><i class="fa-solid fa-angles-right"></i></span>   
                    <span>Xe máy</span>
                </div>
                <h3 class="title">
                    Mua bán xe máy giá rẻ cập nhật tháng 05/2023
                </h3>
            </div>
        </div>
    </div>

    <div class="content-cartegory">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <ul class="list-product mt-4">
                        @foreach ($products ?? [] as $item)
                        <li>
                            <a href="{{ route('get.product.by_slug', ['slug' => $item->slug]) }}" title="{{ $item->name }}" class="product-detail-link d-flex position-relative">
                                <div class="product-detail-thumbnail">
                                    <img src="{{ pare_url_file($item->avatar) }}" alt="{{ $item->name }}" width="100%">
                                </div>
                                <div class="d-flex flex-column">
                                    <h3 class="product-detail-title">{{ $item->name }}</h3>   
                                    <p class="product-detail-price">{{ number_format($item->price, 0, ',', '.') }} đ</p> 
                                    <div style="flex: 1;"></div>
                                    <div class="product-footer d-flex align-items-center" style="font-size: 10px;">
                                        

                                        <img src="{{ pare_url_file($item->user->avatar ?? "") }}" alt="" width="16px" height="16px">
                                        <span class="d-none d-md-block">{{ $item->user->name ?? "[N/A]" }}</span>
                                        
                                       
                                        <div class="dot-divider">
            
                                        </div>
                                        <div class="product-time mx-1 d-flex align-items-center">
                                            <span class="mr-1"><i class="fa-solid fa-medal"></i></span>
                                            <span>Tin ưu tiên</span>
                                        </div>
                                        <div class="dot-divider">
                                            
                                        </div>
                                        <div class="product-address mx-1 d-flex align-items-center">
                                            <span>{{ $item->province->name ?? "[N/A]" }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-detail-heart position-absolute">
                                    <span><i class="fa-regular fa-heart"></i></span>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>

                    <div class="filterSuggestionWrapper">
                        <div class="filterSuggestionWrapper-title">
                            <div class="motorbikeIconTitle">

                            </div>
                            <div class="titleText">
                                Loại hộp số bạn cần tìm?
                            </div>
                            <div class="carIconTitle">

                            </div>
                        </div>
                        <div>
                            <div class="list-option">
                                <div class="option-item">
                                    <a href="#">Xe tay ga</a>
                                </div>
                                <div class="option-item">
                                    <a href="#">Xe tay ga</a>
                                </div>
                                <div class="option-item">
                                    <a href="#">Xe tay ga</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="panigation">
                        <div class="panigation-item">
                            <span ><i class="fa-solid fa-angle-left"></i></span>
                        </div>
                        <div class="panigation-item">
                            <span class="active">1</span>
                        </div>
                        <div class="panigation-item">
                            <span >2</span>
                        </div>
                        <div class="panigation-item">
                            <span ><i class="fa-solid fa-angle-right"></i></span>
                        </div>
                    </div> --}}
                    
                </div>
                <div class="col-lg-3 no-padding">
                    <div class="sidebar mt-4">
                        <div class="sidebar-item">
                            <a href="#">
                                <img src="/assets/img/Banner-blog-topcv-Sidebar-Right.webp" alt="" width="100%">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop