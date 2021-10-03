@extends('layouts.admin_form')

@section('content')
  <div class="px-1 py-1">

   <form  method="post"  class="form-control" enctype="multipart/form-data" action="{{ route('adminstore') }}">
    @csrf

          <div class="p-2">
           <div class="form-group p-2">
               <label for="Product Name">Product Name</label>
               <input type="text" class="form-control" name="prod_name" required placeholder=" Enter Product Name">
               
           </div>
           
           <div class="form-group p-2">
               <label for="Product Category">Product Category</label>
               <select name="prod_cat"  class="form-select form-select-sm">
                  <option value="1">New Arrival</option>
                  <option value="0">Popular</option>
                  

               </select>
           </div>
           
           <div class="form-group p-2">
               <label for="Product Current Price">Product Price</label>
               <input type="text" class="form-control" name="prod_price" required placeholder="Enter Product Price">
              
           </div>


             <div class="custom-file p-2">
               <label class="custom-file-label" ></label>
               <input type="file" class="custom-file-input"  name="file_upload">
                
           </div>


           <div class="form-group p-2">
               <label for="Product Rating">Product Rating</label>
               <input type="number" min="0.5" max="5.0" step="0.5" required class="form-control" name="prod_rating" placeholder=" Enter Product Rating">
               
           </div>
           
            <div class="justify-align-center px-2">
                <button onclick="return confirm('Add Item to Database?')" type="submit" name="add" class=" btn btn-primary">Add</button>
                <a href="{{ route('adminhome') }}" class=" btn btn-primary">Cancel</a>
                
            </div>



         </div>
       </div>
           
</form>
@endsection