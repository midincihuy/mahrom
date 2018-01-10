@extends('adminlte::page')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">{{ $title }}</div>
    <div class="panel-body">
      <table id="role">
        <thead>
          <tr>
            <th>Name</th><th>Guard Name</th><th>Permission</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Name</th><th>Guard Name</th><th>Permission</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
@endsection

@push('js')
  <script type="text/javascript">
    $('#role').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('ajax_role') !!}',
      columns: [
        { data: 'name', name: 'name' },
        { data: 'guard_name', name: 'guard_name' },
        { data: 'permissions', name: 'permissions' },
      ]
    });
  </script>
@endpush
