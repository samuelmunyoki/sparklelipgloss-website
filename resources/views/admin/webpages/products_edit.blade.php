@extends('layouts.admin_form')

@section('content')
  @foreach($item as $attribute)
  <div class="px-1 py-1">
   

   <form  method="post"  class="form-control" enctype="multipart/form-data" action="{{ route('adminupdate', $attribute->prod_id) }}">
    @csrf
          @method('PUT')
       
            
            
            
          <div class="p-2">
           <div class="form-group p-2">
               <label for="Product Name">Product Name</label>
               <input type="text" class="form-control" name="prod_name" required placeholder=" Enter Product Name" value="{{ old('prod_name', $attribute->prod_name) }}">
               
           </div>
           
           <div class="form-group p-2">
               <label for="Product Category">Product Category</label>
               <select name="prod_cat" required  class="form-select form-select-sm">
                @if($attribute->prod_new === 1)
                 <option select="selected" value="1">
                     
                         New Arrival
                         </option>
                         <option value="0">Popular</option>
                        @else
                        <option select="selected" value="0">
                     
                         Popular
                         </option>
                         <option value="0">New Arrival</option>
                     @endif
                 
                     
                
                  
                  
                  

               </select>
           </div>
           
           <div class="form-group p-2">
               <label for="Product Current Price">Product Price</label>
               <input type="text" value="{{ old('prod_price_now', $attribute->prod_price_now) }}"class="form-control" name="prod_price" required placeholder="Enter Product Price">
              
           </div>
           
           <div class="form-group p-2">
               <label for="Product Current Price">Product Previous  Price</label>
               <input type="text" required value="{{ old('prod_price_now', $attribute->prod_prev_price) }}" class="form-control" name="prod_prev_price"  placeholder="Enter Product Previous Price">
              
           </div>


             <div class="custom-file p-2">
               <label class="custom-file-label" ></label>
               <input type="file" class="custom-file-input"  name="file_upload">
                
           </div>


           <div class="form-group p-2">
               <label for="Product Rating">Product Rating</label>
               <input type="number" value="{{ old('prod_price_now', $attribute->prod_rating) }}" min="0.5" max="5.0" step="0.5" required class="form-control" name="prod_rating" placeholder=" Enter Product Rating">
               
           </div>
           @endforeach
            <div class="justify-align-center px-2">
                <button type="submit" name="add" class=" btn btn-primary">Update</button>
                <a href="{{ route('adminhome') }}" class=" btn btn-primary">Cancel</a>
                
            </div>



         </div>
       </div>
           
</form>
@endsection