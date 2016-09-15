<?php
use App\Http\Controllers\Controller;
use DB;

 class TableImport extends Controller {

}					

 public function ImplementationUpload ()
{
Excel::selectSheetsByIndex(0)->load('test2.xls', function($reader) {
$i=0;
$rows = $reader->all();
            foreach ($rows as $row) {
				foreach($row as $mas[$i])
					{						
					echo ' '.$mas[$i];
					$i++;
					
					}
                //echo $row->id.' '.$row->treated_patients.' '.$row->held_beddays."<br />";
				DB::table('plans')->insertGetId(array(
												
												 'bed_occupancy' => $mas[$i-4], 
												 'average_treatment_duration' => $mas[$i-3],
												 'queue_hospitalizations' => $mas[$i-2],
												 'department_id' => $mas[$i-1]
												 
												));			
				
				}
		;
			

});

}						
public function doUpload()
    {
        $input=Input::file('File');
        $filename=$input->getRealPath();
        var_dump($input);
        //var_dump($filename);
        Excel::load($filename, function($input) {
              $results = $input->all();
              $input->dump();
        });


    }
}