@extends('frontend.master')
@section('title','Chi tiet san pham')
@section('main')
<link rel="stylesheet" href="css/details.css">

<div id="wrap-inner">
	<div id="product-info">
		<div class="clearfix"></div>
		<h3>{{$item->prod_name}}</h3>
		<div class="row">
			<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
				<img height="250px" src="{{asset('storage/images/'.$item->prod_img)}}">
			</div>
			<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
				<p>Giá: <span class="price">{{number_format($item->prod_price,0,',','.')}}</span></p>
				<p>Bảo hành: {{$item->prod_warranty}}</p> 
				<p>Phụ kiện: {{$item->prod_accessories}}</p>
				<p>Tình trạng: {{$item->prod_condition}}</p>
				<p>Khuyến mại: {{$item->prod_promotion}}</p>
				<p>Còn hàng: @if($item->prod_status ==1) Con hang @else Het hang @endif</p>
				<p class="add-to-cart text-center"><a class="add_to_cart" data-url="{{route('addCart',['id'=>$item->prod_id])}}" href="#">Đặt hàng online</a></p>
			</div>
		</div>							
	</div>
	<div id="product-detail">
		<h3>Chi tiết sản phẩm</h3>
		<p class="text-justify">{!!$item->prod_description!!}</p>
	</div>
	<div id="comment">
		<h3>Bình luận</h3>
		<div class="col-md-9 comment">
			<form method="post">
				<div class="form-group">
					<label for="email">Email:</label>
					<input required type="email" class="form-control" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="name">Tên:</label>
					<input required type="text" class="form-control" id="name" name="name">
				</div>
				<div class="form-group">
					<label for="cm">Bình luận:</label>
					<textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-default">Gửi</button> 
					{{csrf_field()}}
				</div> 
			</form>
		</div>
	</div>
	<div id="comment-list"> 
		@foreach($comments as $comment)
		<ul>
			<li class="com-title">
				{{$comment->com_name}}
				<br>
				<span>{{date('d/m/Y H:i', strtotime($comment->created_at))}}</span>	
			</li>
			<li class="com-details">
				{{$comment->com_content}} 
			</li>
		</ul> 
		@endforeach 

	</div>
</div>	
@stop 				

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" ></script> 
<script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
<script>
	function addToCart(event){ 
		event.preventDefault();
		let urlCart = $(this).data('url'); 
		$.ajax({ 
			type: "GET", 
			url: urlCart, 
			dataType: 'json', 
			success: function(data) {
				if(data.code === 200) 
				alert('Them vao gio hang thanh cong'); 
			}, 
			error: function() {

			}
		}); 
	}
	$(function (){
		$('.add_to_cart').on('click', addToCart); 
	});
</script>