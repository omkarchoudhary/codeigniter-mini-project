<?php
class Export extends My_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Export_model', 'export');
    }

    public function index(){
    $data['title'] = 'Display Feedback Data';
    $data['feedbackInfo'] = $this->export->employee_list();
    $this->load->view('users/feedback_list', ['data'=>$data]);
}

public function createXLS(){
    $this->load->library("excel");
    $object = new PHPExcel();
  
    $object->setActiveSheetIndex(0);
  
    $table_columns = array("Name", "Email", "Feedback");
  
    $column = 0;
  
    foreach($table_columns as $field)
    {
     $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
     $column++;
    }
  
    $feedbackInfo = $this->export->employee_list();
  
    $excel_row = 2;
  
  
    foreach($feedbackInfo as $row)
    {
     $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->name);
     $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->email);
     $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->feedback1);
     $excel_row++;
    }
  
    $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="feedback Data.xls"');
          $object_writer->save('php://output');
    }

public function login(){
    $this->load->view('Users/login');
}

}
?>