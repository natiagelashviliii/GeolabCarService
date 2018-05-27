@extends('admin/index')
       
@section('section')

    <div class="col-md-12">
        <!-- DATA TABLE -->
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
            	<thead class="subscribes-theade">
            		<th>Email</th>
            		<th>Subscribe Date</th>
            		<tr class="spacer"></tr>
            	</thead>
                <tbody class="subscribes-tbody">
                    @foreach($Data as $subscriber)
                    <tr class="tr-shadow">
                        <td class="desc">{{ $subscriber->email }}</td>
                        <td class="desc">{{ date('d-m-Y', strtotime($subscriber->created_at)) }}</td>
                    </tr>
                    <tr class="spacer"></tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
            	{{ $Data->render() }}
            </div>
        </div>
        <!-- END DATA TABLE -->
    </div>
@endsection
        
