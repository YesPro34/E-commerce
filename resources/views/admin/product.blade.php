<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- required=""d meta tags -->
   @include('admin.css')
   <style>
    .div_center{

        text-align: center;
        justify-content: center;
        padding-top: 40px;
    }

    .h2_font{
        font-size: 40px;
        padding-bottom: 40px;
    }
    .addBtn{
        background-color: greenyellow; /* Set the background color */
        border: none; /* Remove the border */
        color: white; /* Set the text color */
        font-size: 16px; /* Set the font size */
        padding: 12px 24px; /* Set the padding */
        cursor: pointer; /* Set the cursor to pointer */
    }
    .product_text{
        color: black;
        font-family: bold;
    }

    .table_center{
        margin: auto;
        width: 50%;
        text-align: center;
        margin-top: 30px;
        border: 3px solid green;
    }

    label{
        display: inline-block;
        width: 200px;
    }
    .div_style{
        padding-bottom: 15px;
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
            <div class="div_center">
                <h2 class="h2_font">Add Product</h2>
                <form action="{{url('add_product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_style">
                        <label for="">Title:</label>
                         <input type="text" class="product_text" required="" name="title" placeholder="Title">
                    </div>
             
                    <div class="div_style">
                        <label for="">Description:</label>
                        <input type="text" class="product_text" required="" name="description" placeholder="Description">
                    </div>
                    
                   
                    
                    <div class="div_style">
                        <label for="">Quantity:</label>
                        <input type="number" min="0" class="product_text" required="" name="quantity" placeholder="Quantity">
                    </div>
                   
                    <div class="div_style">
                        <label for="">Price:</label>
                        <input type="number" class="product_text" required="" name="price" placeholder="Price">
                    </div>
                   
                    <div class="div_style">
                        <label for="">Discount price:</label>
                        <input type="number" class="product_text"  name="discount_price" placeholder="Discount price">
                    </div>
                    <div class="div_style">
                        <label for="">Category:</label>
                        <select class="product_text" name="category" required="">
                            <option value="" selected="">Add a category</option>
                            @foreach($categories as $category )
                                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="div_style">
                        <label for="">Product Image :</label>
                        <input type="file" class="product_text" required="" name="image" placeholder="Image...">
                    </div>
                    
                    <div  class="div_style">
                        <input type="Submit"  required="" name="submit" value="Add product" class="btn btn-primary">
                    </div>
                    
                </form>
            </div>
          
        </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.js')
  </body>
</html>