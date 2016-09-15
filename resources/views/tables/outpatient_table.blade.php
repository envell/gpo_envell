@extends('outpatient_doctor')

@section('content')


 <table class="table table-bordered table-striped" width="100%" id="postsTable">
                        <thead>
            <tr>
                <th rowspan="2">Профиль койки</th>
                <th colspan="4">Факт</th>
                <th colspan="2">Норматив</th>
                <th colspan="2">% выполнения норматива</th>
            </tr>
                <tr>

                    <th>Средняя занятость койки</th>
                    <th>Прогноз на конец года</th>
                    <th>Ср. срок лечения</th>
                    <th>Оборот койки</th>
                    <th>Занятость койки</th>
                    <th>Ср. длит.</th>
                    <th>Занятость койки</th>
                    <th>Ср. длит.</th>
              
                                   
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
                language: {
  "processing": "Подождите...",
  "search": "Поиск:",
  "lengthMenu": "Показать _MENU_ записей",
  "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
  "infoEmpty": "Записи с 0 до 0 из 0 записей",
  "infoFiltered": "(отфильтровано из _MAX_ записей)",
  "infoPostFix": "",
  "loadingRecords": "Загрузка записей...",
  "zeroRecords": "Записи отсутствуют.",
  "emptyTable": "В таблице отсутствуют данные",
  "paginate": {
    "first": "Первая",
    "previous": "Предыдущая",
    "next": "Следующая",
    "last": "Последняя"
  },
  "aria": {
    "sortAscending": ": активировать для сортировки столбца по возрастанию",
    "sortDescending": ": активировать для сортировки столбца по убыванию"
  },

            select: {
                rows: {
                    _: "Выбрано %d записей",
                    0: "Не одна запись не выбрана",
                    1: "Выбрана 1 запись",
                    2: "Выбрано 2 записи",
                    3: "Выбрано 3 записи",
                    4: "Выбрано 4 записи"
                }
            }

},  
    
            order: [[0, 'asc']],
            buttons: [
                'csv', 'excel', 'pdf', 'print', 'reset', 'reload'
            ],
           
              ajax: {
                 url: '{!! route( 'outpatient_doctor' ) !!}',
                  data: function ( d ) {
                d.start_date = $("input[name='range_start']").val(),
                d.end_date =   $("input[name='range_end']").val();
            },
              },
            columns: [
          
                {data: 'bed_name', name: 'bed_name' },
                {data: 'avg_bed_occupancy', name: 'avg_bed_occupancy'},
                {data: 'avg_year_prediction', name: 'avg_year_prediction'},
                {data: 'avg_treat_dur', name: 'avg_treat_dur'},
                {data: 'bed_rotation', name: 'bed_rotation'},
                {data: 'bed_occupancy_norm', name: 'bed_occupancy_norm'},
                {data: 'treatment_dur_norm', name: 'treatment_dur_norm'},
                {data: 'bed_occupancy_norm_percent', name: 'bed_occupancy_norm_percent'},
                {data: 'treatment_dur_norm_percent', name: 'treatment_dur_norm_percent'},
          
            ],
   
    });
    
    $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
table1.ajax.reload();
});
});
</script>
{!! $dataTable->scripts() !!}
@endpush