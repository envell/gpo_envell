@extends('doctor_staff')

@section('content')


 <table class="table table-bordered table-striped" width="100%" id="postsTable">
                        <thead>
            <tr>
                <th rowspan="1">Должность</th>
                <th rowspan="1">Ставок по штату</th>
                <th rowspan="1">Ставок занято</th>
                <th rowspan="1">Физических лиц по основному месту работы</th>
                <th rowspan="1">Физических лиц по внутреннему/внешнему совместительству</th>
                <th rowspan="1">Физических лиц в декретеу</th>
                <th rowspan="1">Укомплектованность штатов занятыми должностями</th>
                <th rowspan="1">Укомплектованность штатов фзическими лицами</th>
                <th rowspan="1">Коэффициент совместительства</th>
            </tr>
                
                </thead>
            </table>
            

@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
  <script type="text/javascript">
        var startDate;
var endDate;
$(function() {
        
var range = $('input[name="daterange"]').daterangepicker({
    "locale": {
        
        "separator": " - ",
        "applyLabel": "ОК",
        "cancelLabel": "Отмена",
        "fromLabel": "От",
        "toLabel": "До",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "Вс",
            "Пн",
            "Вт",
            "Ср",
            "Чт",
            "Пт",
            "Сб"
        ],
        "monthNames": [
            "Январь",
            "Февраль",
            "Март",
            "Апрель",
            "Май",
            "Июнь",
            "Июль",
            "Август",
            "Сентябрь",
            "Октябрь",
            "Ноябрь",
            "Декабрь"
        ],
        "firstDay": 1,
    },
    "startDate": "2016/02/26",
    "endDate": "2016/03/03",
    "format": "YYYY-MM-DD"
},
function(start, end, label) {
  console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
       $('input[name=range_start]').val(start.format('YYYY-MM-DD')); 
       $('input[name=range_end]').val(end.format('YYYY-MM-DD')); 
});   

      });

$(function() {
       var table1 = $('#postsTable').DataTable({
            dom: 'Bfrtip',
            processing: true,
            serverSide: true,
            scrollX: true,
            order: [[0, 'asc']],
            buttons: [
                'csv', 'excel', 'pdf', 'print', 'reset', 'reload'
            ],
           
              ajax: {
                  url: '{!! route( 'doctor_staff' ) !!}',
                  data: function ( d ) {
                d.start_date = $("input[name='range_start']").val(),
                d.end_date =   $("input[name='range_end']").val();
            },
              },
            columns: [
          
                {data: 'position_name', name: 'position_name' },
                {data: 'stake_numbers', name: 'stake_numbers'},
                {data: 'stake_employed', name: 'stake_employed'},
                {data: 'persons_at_the_main_place', name: 'persons_at_the_main_place'},
                {data: 'persons_at_the_internal_external_moonlighting', name: 'persons_at_the_internal_external_moonlighting'},
                {data: 'persons_at_decreet', name: 'persons_at_decreet'},
                {data: 'staffing_occupied_posts', name: 'staffing_occupied_posts'},
                {data: 'staffing_individuals', name: 'staffing_individuals'},
                {data: 'coefficient_of_combining', name: 'coefficient_of_combining'},
          
            ],
   
    });
    
    $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
table1.ajax.reload();
});
});
</script>
{!! $dataTable->scripts() !!}
@endpush