@extends('doctor_clinic')

@section('content')


 <table class="table table-bordered table-striped" width="100%" id="postsTable">
                        <thead>
            <tr>
                <th rowspan="3">ФИО врача</th>
                <th rowspan="3">Должность</th>
                <th rowspan="3">Количество ставок</th>
                <th colspan="9">Число посещений</th>
                <th rowspan="3">Всего посещений</th>
                <th colspan="6">Удельный вес посещений</th>
                <th rowspan="3">Нагрузка на занятую должность</th>
                <th rowspan="3">Нагрузка на год</th>
                <th rowspan="3">Выполнение нагрузки</th>
            </tr>
            
                <tr>
                    <th colspan="3">В поликлинике</th>
                    <th colspan="3">На дому</th>
                    <th colspan="3">По видам оплаты</th>
                    <th rowspan="2">На дому</th>
                    <th rowspan="2">По заболеванию</th>
                    <th rowspan="2">Профилактические</th>
                    <th rowspan="2">ОМС</th>
                    <th rowspan="2">Бюджет</th>
                    <th rowspan="2">Платные</th>
                </tr>
                <tr>
                    <th>Всего</th>
                    <th>По заболеванию</th>
                    <th>Профилактические</th>
                    <th>Всего</th>
                    <th>По заболеванию</th>
                    <th>Профилактические</th>
                    <th>ОМС</th>
                    <th>Бюджет</th>
                    <th>Платные</th>
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
    "endDate": "2016/12/01",
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
                 url: '{!! route( 'doctor_clinic' ) !!}',
                  data: function ( d ) {
                d.start_date = $("input[name='range_start']").val(),
                d.end_date =   $("input[name='range_end']").val();
            },
              },
            columns: [
          
                {data: 'name', name: 'name' },
                {data: 'position_name', name: 'position_name' },
                {data: 'stake_numbers_fact', name: 'stake_numbers_fact'},
                {data: 'all_in_hospital', name: 'all_in_hospital'},
                {data: 'hospital_disease', name: 'hospital_disease'},
                {data: 'hospital_profilactic', name: 'hospital_profilactic'},
                {data: 'all_in_home', name: 'all_in_home'},
                {data: 'home_disease', name: 'home_disease'},
                {data: 'home_profilactic', name: 'home_profilactic'},
                {data: 'payment_omc', name: 'payment_omc'},
                {data: 'payment_budget', name: 'payment_budget'},
                {data: 'payment_paid', name: 'payment_paid'},
                {data: 'total_visits', name: 'total_visits' },
                {data: 'percent_at_home', name: 'percent_at_home' },
                {data: 'percent_disease', name: 'percent_disease'},
                {data: 'percent_profilactic', name: 'percent_profilactic'},
                {data: 'percent_omc', name: 'percent_omc'},
                {data: 'percent_budget', name: 'percent_budget'},
                {data: 'percent_paid', name: 'percent_paid'},
                {data: 'load_for_positions', name: 'load_for_positions'},
                {data: 'attendance_for_the_year', name: 'attendance_for_the_year'},
                {data: 'performing_load', name: 'performing_load'},
          
            ],
   
    });
    
    $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
table1.ajax.reload();
});
});
</script>
{!! $dataTable->scripts() !!}
@endpush