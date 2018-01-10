@extends('adminlte::page')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">{{ $title }}</div>
    <div class="panel-body">
      <table id="permission">
        <thead>
          <tr>
          </tr>
          <th>Name</th><th>Guard Name</th>
        </thead>
        <tfoot>
          <tr>
            <th>Name</th><th>Guard Name</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
@endsection

@push('js')
  <script type="text/javascript">
    $('#permission').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('ajax_permission') !!}',
      columns: [
        { data: 'name', name: 'name' },
        { data: 'guard_name', name: 'guard_name' },
      ]
    });
  </script>
@endpush
