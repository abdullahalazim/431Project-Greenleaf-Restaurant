@extends('layouts.admin.app')
@section('admin_content')
@section('title', 'Create Product')
@section('css')
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/select2/select2.min.css">
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
@endsection

<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"> {{ isset($product) ? 'Product Update Form' : 'Product Create Form' }} </h3>
            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!--Form error message show -->
        @if(!empty($product))
        <form class="" method="post" action="@route('admin.product.update', $product->id)" enctype="multipart/form-data">
            @method('PUT')
            @else
                <form action="@route('admin.product.store')" method="POST" enctype="multipart/form-data">
            @endif
            @csrf
            <div class="row">
                <div class="col-12 col-sm-8 col-lg-8">
                    <div class="form-gorup">
                        <label for="">Product Title</label>
                        <input type="text" required name="name" class="form-control" placeholder="Product title" value="{{ @$product->name }}"  id="">
                    </div>
                </div>
                <div class="col-12 col-sm-4 col-lg-4">
                    <div class="form-gorup">
                        <label for="">Price</label>
                        <input type="number" required name="price" class="form-control" placeholder="Product Price" value="{{ @$product->price }}"  id="">
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-7">
                    <div class="form-gorup">
                        <label for="">--Select Category--</label>
                        <select required name="category_id" class="form-control" id="">
                            <option value="">Select Product</option>
                            @foreach ($categories as $item)
                            <option value="{{ $item->id }}" {{ $item->id == @$product->category_id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-5">
                    <div class="form-gorup">
                        <label for="">--Select Unit--</label>
                        <select required name="unit" class="form-control" id="">
                            <option value="">Select Product</option>
                            <option value="Pc" {{ "Pc" == @$product->unit ? 'selected' : '' }}>Piches</option>
                            <option value="Kg" {{ "kg" == @$product->unit ? 'selected' : '' }}>Kg</option>
                            <option value="litter" {{ "litter" == @$product->unit ? 'selected' : '' }}>Litter</option>
                        </select>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="form-gorup">
                        <label for="">Product Image</label>
                        @if(isset($product))
                        <input type="file" name="image[]" multiple class="form-control"  id="">
                        @else
                        <input type="file" required name="image[]" multiple class="form-control"  id="">
                        @endif

                    </div>
                </div>

                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="form-gorup">
                        <label for="">--Select Product Place--</label>
                        <select required name="place" class="form-control" id="">
                            <option value="">Select Product</option>
                            <option value="1" {{ 1 == @$product->place ? 'selected' : '' }}>Latest Product</option>
                            <option value="2" {{ 2 == @$product->place ? 'selected' : '' }}>Popular Product</option>
                            <option value="3" {{ 3 == @$product->place ? 'selected' : '' }}>Regualr Product</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card-body pad">
                        <div class="mb-3">
                            <textarea required class="textarea" name="description" placeholder="Place some text here"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!!  @$product->description  !!}</textarea>
                        </div>
                    </div>
                </div>

            </div>
            <div class="from-gorup float-right">
                @if (!empty($product))
                <input type="submit" class="btn btn-primary text-center" value="Update Product" name="" id="">
                @else
                <input type="submit" class="btn btn-primary text-center" value="Create New Product" name="" id="">
                @endif
            </div><!--submit button end -->
         </form>
    </div>
</section>



@section('js')
<!-- CK Editor -->
<script src="{{ asset('admin') }}/plugins/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('admin') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="{{ asset('admin') }}/plugins/select2/select2.full.min.js"></script>
<script>
  $(function () {
    $('.select2').select2()
  })
</script>
{{-- select2 end --}}
@endsection

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
            });
        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });
        $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        ClassicEditor
          .create(document.querySelector('#editor1'))
          .then(function (editor) {
            // The editor instance
          })
          .catch(function (error) {
            console.error(error)
          })
        // bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5({
          toolbar: { fa: true }
        })
      })
    </script>

@endsection
