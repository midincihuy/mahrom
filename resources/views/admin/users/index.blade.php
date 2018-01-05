@extends('adminlte::page')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">{{ $title }}</div>
    <div class="panel-body">
      <table id="user">
        <thead>
          <tr>
          </tr>
          <th>User Name</th><th>Email</th><th>Roles</th>
        </thead>
        <tfoot>
          <tr>
            <th>User Name</th><th>Email</th><th>Roles</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
@endsection

@push('js')
  <script type="text/javascript">
    $('#user').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('ajax_user') !!}',
      columns: [
        { data: 'name', name: 'name' },
        { data: 'email', name: 'email' },
        { data: 'roles.0.name', name: 'roles.name' },
      ]
    });
  </script>
@endpush
