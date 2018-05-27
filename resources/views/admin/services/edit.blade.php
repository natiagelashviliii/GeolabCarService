@extends('admin/index')
       
@section('section')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            სერვისის რედაქტირება
        </div>
        <div class="card-body card-block">
            <form action="{{ url('admin/services/editservicepost') }}" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit="return admin.submitForm(this);">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="Title" class=" form-control-label">დასახელება</label>
                    </div>
                    <div class="col-12 col-md-9 form-input">
                        <input type="text" id="Title" name="Title" class="form-control" value="{{ $Data->title }}" data-error="მიუთითეთ სათაური">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="ServiceLogo" class=" form-control-label">სურათი</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="ServiceLogo" name="ServiceLogo" class="form-control-file">
                        <img class="slider-form-img" src="{{ asset('storage/services/')  }}/{{ $Data->image }}">
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="ServiceID" value="{{ $Data->id }}">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
            </form>
        </div>
        <div class="card-footer">
            <!-- <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Reset
            </button> -->
        </div>
    </div>
</div>

@endsection
        
