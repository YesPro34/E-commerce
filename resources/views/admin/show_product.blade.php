<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')

   <style>
            .center{
                margin: 0 auto;
                width: 70%;
                border: 2px solid white;
                text-align: center;
                margin-top: 40px;
            }

            .title{
                text-align: center;
                font-size: 40px;
                padding-top: 20px;
            }

            .imgProduct{
                width: 150px;
                height: 150px;
                padding: 5px;
            }

            .th_color{
                background-color: skyblue;
            }
            .th_color th{
                padding: 20px;
            }


   </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
     @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          @if(session()->has('message'))
                <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>   
                {{ session()->get('message') }}
                </div>
            @endif
            <h2 class="title" > Products Details</h2>
            <table class="center">
                <tr class="th_color">
                    <th>Title</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Discount Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount_price }}</td>
                        <td>
                            <img class="imgProduct" src="/product/{{ $product->image }}" alt="">
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Are you Sure, To delete the product')" href="delete_product/{{$product->id}}">Delete</a>
                            <a class="btn btn-success" href="update_product/{{$product->id}}">Edit</a>
                         </td>
                    </tr>
                @endforeach
            </table>
          </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.js')
  </body>
</html>