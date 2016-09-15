@extends('outpatient_doctor')

@section('content')
    <table class="table table-bordered table-striped" id="users-table">
        <thead>
            <tr>
                <th>id</th>
                <th>Имя</th>
                <th>Email</th>
            </tr>
        </thead>
    </table>
@stop

@push('scripts')
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
<script>
$(document).ready(function()  {
    $('#users-table').DataTable({
   dom: 'Bfrtip',
            processing: true,
            serverSide: true,
            buttons: [
                'csv', 'excel', 'pdf', 'print', 'reset', 'reload'
            ],
        ajax: '{!! route('outpatient_table') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' }
        ]
    });
});
</script>
@endpush