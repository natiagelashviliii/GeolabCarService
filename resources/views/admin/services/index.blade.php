@extends('admin/index')
       
    @section('section')

    <div class="col-md-12">
        <!-- DATA TABLE -->
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <tbody class="services-tbody">
                    @foreach($services as $service)
                    <tr class="tr-shadow">
                        <td>
                            <img src="{{ asset('storage/services/')  }}/{{$service->image}}" alt="image">
                        </td>
                        <td class="desc">{{ $service->title }}</td>
                        <td>
                            <div class="table-data-feature">
                                <a href="{{ url('admin/services/edit/') }}/{{ $service->id }}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="far fa-edit"></i>
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
        
