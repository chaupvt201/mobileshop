@extends('frontend.master') 
@section('title','Gio hang') 
@section('main')
<link rel="stylesheet" href="css/cart.css">
	
<div class="cart_wrapper">
	@include('frontend.components.cart_component')
</div>
@stop 
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" ></script> 
<script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script> 
<script> 
function cartUpdate(event){ 
	event.preventDefault(); 
	let urlUpdateCart = $('.update_cart_url').data('url'); 
	let id = $(this).data('id'); 
	let quantity = $(this).parents('tr').find('input.quantity').val(); 
	$.ajax({
		type: "GET", 
		url: urlUpdateCart, 
		data: {id: id, quantity: quantity}, 
		success: function(data) {
			if(data.code === 200){
				$('.cart_wrapper').html(data.cart_component); 
				alert('Cap nhat thanh cong'); 
			}
		}, 
		error: function() {

		}
	}); 
} 

function cartDelete(event){
	event.preventDefault(); 
	let urlDelete = $('.delete_cart_url').data('url'); 
	let id = $(this).data('id'); 
	$.ajax({
		type: "GET", 
		url: urlDelete, 
		data: {id: id}, 
		success: function(data) {
			if(data.code === 200){
				$('.cart_wrapper').html(data.cart_component); 
				alert("cap nhat thanh cong"); 
			}
		}, 
		error: function() {

		}
	}); 
}
	$(function (){
		$(document).on('click', '.cart_update', cartUpdate) 
		$(document).on('click', '.cart_delete', cartDelete)
	})
</script>

					