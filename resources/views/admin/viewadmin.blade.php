  @extends('layouts.admin')

@section('content')

        <div class="col-md-12" id="users">
        <div class="panel panel-primary"  style="margin: 20px 20px;">
            <div class="panel-heading">
            </div>
          <div class="panel-body">
            <table class="table table-bordered">
              <thead>
                <th>S.N</th>
                <th>Admin Name</th>
                 <th>Amdin Email</th>
                <th>Role</th>
              </thead>
              <tbody>
                  <?php $i = 0 ?>
                  @foreach($admin as $data)
                <tr class="data{{$data->id}}">
                  <?php $i++ ?>
                  <td>{{ $i}}</td>
                  <td >{{ $data->name }}</td>
                  <td >{{ $data->email }}</td>
                  <td>{{ $data->role}}</td>
                </tr>
                  @endforeach 
              </tbody>
            </table>
          </div>
        </div>
           </div>
        
@endsection
