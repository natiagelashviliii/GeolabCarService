@extends('admin/index')

@section('section')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            სლაიდერის დამატება
        </div>
        <div class="card-body card-block">
            <form action="{{ url('admin/slider/addsliderpost') }}" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit="return admin.submitForm(this);">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="Title" class=" form-control-label">დასახელება</label>
                    </div>
                    <div class="col-12 col-md-9 form-input">
                        <input type="text" id="Title" name="Title" class="form-control" data-error="მიუთითეთ დასახელება">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="SliderImage" class=" form-control-label">სურათი</label>
                    </div>
                    <div class="col-12 col-md-9 form-input">
                        <input type="file" id="SliderImage" name="SliderImage" class="form-control-file file" data-error="ატვირთეთ ფაილი">
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> დამატება
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

