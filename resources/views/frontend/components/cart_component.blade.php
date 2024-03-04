<div id="wrap-inner" class="delete_cart_url" data-url="{{route('deleteCart')}}">
	<div id="list-cart">
		<h3>Giỏ hàng</h3>
		<form>
			<table class="table table-bordered .table-responsive text-center update_cart_url" data-url="{{route('updateCart')}}">
				<tr class="active"> 
				    <td width="11.111%">ID</td>
					<td width="11.111%">Ảnh mô tả</td>
					<td width="22.222%">Tên sản phẩm</td>
					<td width="22.222%">Số lượng</td>
					<td width="16.6665%">Đơn giá</td>
					<td width="16.6665%">Thành tiền</td> 
                    <td width="11.112%">Cap nhat</td>
					<td width="11.112%">Xóa</td>
				</tr> 
				@php 
				$total =0
				@endphp
				@foreach($cart as $id=> $item) 
				@php 
				$total += $item['price'] * $item['quantity']
				@endphp 
				<tr> 
					<td>{{$id}}</td>
					<td><img class="img-responsive" width="150px" src="{{asset('storage/images/'.$item['image'])}}"></td>
					<td>{{$item['name']}}</td>
					<td>
						<div class="form-group">
							<input class="form-control cart_number quantity" type="number" value="{{$item['quantity']}}" min='1'>
						</div>
					</td>
					<td><span class="price">{{number_format($item['price'],0,'.',',')}}</span></td>
					<td><span class="price">{{number_format($item['price'] * $item['quantity'])}} d</span></td> 
                    <td><a href="#" data-id="{{$id}}" class="btn btn-success cart_update">Cap nhat</a></td> 
					<td><a data-id="{{$id}}" href="#" class="btn btn-danger cart_delete">Xóa</a></td>
				</tr> 
				@endforeach 
			</table>
			<div class="row" id="total-price">
				<div class="col-md-6 col-sm-12 col-xs-12">										
						Tổng thanh toán: <span class="total-price">{{number_format($total)}} d</span>
																								
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<a href="#" class="my-btn btn">Mua tiếp</a>
					<a href="#" class="my-btn btn">Xóa giỏ hàng</a>
				</div>
			</div>
		</form>             	                	
	</div>

	<div id="xac-nhan">
		<h3>Xác nhận mua hàng</h3>
		<form>
			<div class="form-group">
				<label for="email">Email address:</label>
				<input required type="email" class="form-control" id="email" name="email">
			</div>
			<div class="form-group">
				<label for="name">Họ và tên:</label>
				<input required type="text" class="form-control" id="name" name="name">
			</div>
			<div class="form-group">
				<label for="phone">Số điện thoại:</label>
				<input required type="number" class="form-control" id="phone" name="phone">
			</div>
			<div class="form-group">
				<label for="add">Địa chỉ:</label>
				<input required type="text" class="form-control" id="add" name="add">
			</div>
			<div class="form-group text-right">
				<a href="{{asset('payment')}}" class="btn btn-success">Thực hiện đơn hàng</a>
			</div>
		</form>
	</div>
</div> 