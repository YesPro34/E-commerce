<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
   <style>
    .div_center{
        text-align: center;
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
    .category_text{
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
                <h2 class="h2_font">Add Categoty</h2>
                <form action="{{url('add_category')}}" method="POST">
                    @csrf
                    <input type="text" class="category_text" name="name" placeholder="write a category">
                    <input type="submit" class="addBtn" name="submit" placeholder="Add categoty ">
                </form>
            </div>

            <table class="table_center">
                <tr>
                    <td>Category name</td>
                    <td>Action</td>
                </tr> 
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->category_name }}</td>
                    <td> <a  onclick="return confirm('Are you Sure To Delete This !')"
                             href="delete_category/{{$category->id}}" class="btn btn-danger">Delete</a></td>
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