<?php



use App\Models\Product\ProductUnit;

$product_units=ProductUnit::all();

?>




@extends("layouts.master")

@section('page')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

<style>
    .form-container {
        max-width: 1000px;
        margin: 50px auto;
        background: #ffffff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }

    .form-container h2 {
        margin-bottom: 25px;
        text-align: center;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #0d6efd;
    }

    .btn-primary {
        width: 100%;
        padding: 10px;
    }
</style>

<div class="container">
    <div class="form-container">
        <h2>Create New Product</h2>
        <form action="{{ url('products') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter product name" required>
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Product Photo</label>
                <input type="file" name="photo" id="photo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="regular_price" class="form-label">Regular Price</label>
                <input type="text" name="regular_price" id="regular_price" class="form-control"  required>
            </div>

            <div class="mb-3">
                <label for="offer_price" class="form-label">Offer Price</label>
                <input type="text" name="offer_price" id="offer_price" class="form-control" >
            </div>

            <div class="mb-3">
                <label for="barcode" class="form-label">Barcode</label>
                <input type="text" name="barcode" id="barcode" class="form-control">
            </div>
            <div class="mb-3">
                <label for="barcode" class="form-label">Product Unit</label>
                <select onchange="loadSection()" name="product_unit_id" id="product_unit_id" class="form-select" required>
                    @foreach($product_units as $product_unit)
                        <option value="{{ $product_unit->id }}">{{ $product_unit ->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="barcode" class="form-label">Product Section</label>
                <select onchange="loadCategory()"  name="product_section_id" id="product_section_id" class="form-select" required>
                    
                </select>
            </div>
            <div class="mb-3">
                <label for="barcode" class="form-label">Product Category</label>
                <select name="product_category_id" id="product_category_id" class="form-select" required>
                   
                </select>
            </div>


            <button type="submit" class="btn btn-primary">💾 Save Product</button>
        </form>
    </div>
</div>

<script>
     var base_url="http://localhost/laravel12/project_app/public/api";

     async function loadSection() {
        let id=document.querySelector("#product_unit_id").value;
        let endpoint=`productsections/${id}/filter`;
        let url =`${base_url}/${endpoint}`;

        try{

            const response=await fetch(
                url,{
                    method:"GET",
                    headers:{
                        "Accept":"application/json",
                    }
                }
            );
            let json=await response.json();
           

            let sections=json.productsections;



            let html=sections.map((section)=>{
                return `<option value="${section.id}">${section.name}</option>`
            });

          document.querySelector("#product_section_id").innerHTML = html.join('');


        }catch (error){
                console.error("Error:",error);
        }
        
     }

     async function loadCategory() {
        let id=document.querySelector("#product_section_id").value;
        let endpoint=`productcategorys/${id}/filter`;
        let url =`${base_url}/${endpoint}`;

        try{

            const response=await fetch(
                url,{
                    method:"GET",
                    headers:{
                        "Accept":"application/json",
                    }
                }
            );
            let json=await response.json();
           

            let productcategorys=json.productcategorys;



            let html=productcategorys.map((productcategory)=>{
                return `<option value="${productcategory.id}">${productcategory.name}</option>`
            });

          document.querySelector("#product_category_id").innerHTML = html.join('');


        }catch (error){
                console.error("Error:",error);
        }
        
     }

</script>

@endsection
