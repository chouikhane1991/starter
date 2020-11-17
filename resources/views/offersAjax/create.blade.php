@extends('layouts.app')

@section('content')
    <div class="container">

    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                {{__('messages.Add your offer')}}

            </div>
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
            @endif
            <br>
            <form method="POST" id="offerForm" action="{{route('addtodata')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">choose photo</label>
                    <input type="file" class="form-control" name="photo"  >
                    @error('photo')
                    <small  class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">OFFER NAME en</label>
                    <input type="text" class="form-control" name="name_en" aria-describedby="emailHelp" placeholder="Enter offer name ">
                    @error('name_en')
                    <small  class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">OFFER NAME ar</label>
                    <input type="text" class="form-control" name="name_ar" aria-describedby="emailHelp" placeholder="Enter offer name ">
                    @error('name_ar')
                    <small  class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">OFFER PRICE</label>
                    <input type="text" class="form-control" name="price" aria-describedby="emailHelp" placeholder="Enter offer price">
                    @error('price')
                    <small  class="form-text text-danger">{{$message}}</small>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">OFFER details en</label>
                    <input type="text" class="form-control" name="details_en" aria-describedby="emailHelp" placeholder="Enter offer price">
                    @error('details_en')
                    <small  class="form-text text-danger">{{$message}}</small>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">OFFER details ar</label>
                    <input type="text" class="form-control" name="details_ar" aria-describedby="emailHelp" placeholder="Enter offer price">
                    @error('details_ar')
                    <small  class="form-text text-danger">{{$message}}</small>
                    @enderror

                </div>


                <button id="save" class="btn btn-primary">{{ __('messages.save') }}</button>
            </form>


        </div>
    </div>
    </div>
@endsection

@section('scripts')

    <script >
        $(document).on('click','#save',function(e){
            e.preventDefault();
            var formadata= new FormData($('#offerForm')[0]);
            $.ajax({

                    method: "POST",
                    enctype: 'multipart/form-data',
                    url: "{{route('ajax.offer.store')}}",
                    data: formadata,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {

                    },
                    error: function (reject) {

                    }
                }
            );

        });


    </script>

    @endsection
