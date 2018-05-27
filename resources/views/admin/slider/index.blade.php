@extends('admin/index')
       
    @section('section')

    <div class="col-md-12">
        <!-- DATA TABLE -->
        <div class="table-data__tool">
            <div class="table-data__tool-right">
                <a href="{{ url('admin/slider/add') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>დამატება
                </a>
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <tbody class="slider-tbody">
                    @foreach($slider as $slide)
                    <tr class="tr-shadow">
                        <td>
                            <img src="{{ asset('storage/slider/')  }}/{{$slide->image}}" alt="image">
                        </td>
                        <td class="desc">{{ $slide->title }}</td>
                        <td>{{ $slide->created_at }}</td>
                        <td>
                            <div class="table-data-feature">
                                <a href="{{ url('admin/slider/changesliderstatus/') }}/{{ $slide->id }}" class="item" data-toggle="tooltip" data-placement="top" title="Status">
                                    <i class="far fa-star" style="{{ $slide->status_id == 0 ? 'color: red' : 'color: green'  }}"></i>
                                </a>
                                <a href="{{ url('admin/slider/edit/') }}/{{ $slide->id }}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="{{ url('admin/slider/deleteslider/') }}/{{ $slide->id }}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
    @endsection
        
