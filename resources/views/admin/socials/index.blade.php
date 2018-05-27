@extends('admin/index')
       
@section('section')

<div class="col-lg-12">
    @if(Session::has('info'))
    <div class="submit-info">
        <p>ოპერაცია წარმატებით დასრულდა</p>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
           სოციალური ქსელები
        </div>
        <div class="card-body card-block">
            <form action="{{ url('admin/socials/edit') }}" method="post" class="form-horizontal" onsubmit="return admin.submitForm(this);">
            @foreach ($socials as $social)
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="{{ $social->title }}" class=" form-control-label">{{ $social->title }}</label>
                    </div>
                    <div class="col-12 col-md-9 form-input">
                        <input type="text" value="{{ $social->url }}" id="{{ $social->title }}" name="{{ $social->title }}" class="form-control" data-error="მიუთითეთ ლინკი">
                    </div>
                </div>
            @endforeach
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> რედაქტირება
            </button>
            </form>
        </div>
        <div class="card-footer">
            
        </div>
    </div>
</div>

@endsection
        
