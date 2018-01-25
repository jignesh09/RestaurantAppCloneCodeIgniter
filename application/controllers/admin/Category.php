<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {
	 function __construct() {
        parent::__construct();
    }
    /* 
        Purpose : Display Category page
    */
    public function index(){
        $columnsToSelect = 'iCategoryId,tTitle,tImage,eStatus';
        $comparisonColumnsAndValues = array('eStatus !=' => array('Archive','where'));
        $sortingColumnsAndValues = array('eStatus'=>'ASC','iCategoryId'=>'DESC');
        $allData = $this->querycreator->selectQuery('category',$columnsToSelect,$comparisonColumnsAndValues,'Multiple',$sortingColumnsAndValues);
        foreach ($allData as $key => $value) {
            if(file_exists($this->data['base_upload_path'].'category/'.$value['iCategoryId'].'/'.$value['tImage']) && (!empty($value['tImage'])))
            {
                $allData[$key]['tImage'] = $this->data['base_upload'].'category/'.$value['iCategoryId'].'/'.$value['tImage'];
            }
            else
            {
                $allData[$key]['tImage'] = $this->data['base_upload'].'no-image.png';
            }
        }
        $this->data['all_Data']=$allData;
        $this->data['message']=$this->session->flashdata('message');
        $this->data['page'] = 'Category';
        $this->data['title'] = 'Restaurant App - Category';
        $this->data['contentFile'] = 'category/listCategory.tpl';
        $this->smarty->view('sideBarLayout.tpl', $this->data);
    }
    /* 
        Purpose : Add Category 
    */
    public function add(){
        if($this->input->post())
        {
            $postDetails = $this->input->post();
            $iCategoryId = $this->querycreator->insertSingle('category',$postDetails);
            if($iCategoryId>0)
            {
                if($_FILES['tImage']['name'])
                { 
                    $image_uploaded = $this->do_upload_various_files($iCategoryId,'category','tImage');
                    $targetColumnsAndValues['tImage']=$image_uploaded;
                    $comparisonColumnsAndValues = array('iCategoryId' => array($iCategoryId,'where'));
                    $totalRows = $this->querycreator->updateQuery('category',$comparisonColumnsAndValues,$targetColumnsAndValues);
                }
                $this->session->set_flashdata('message', 'Record Added Successfully.');
                redirect($this->data['base_url'].'admin/Category');
            }
        }
        $this->data['mode'] = 'Add';
        $this->data['data'] = $this->data;
        $this->data['message']=$this->session->flashdata('message');
        $this->data['page'] = 'Category';
        $this->data['title'] = 'Restaurant App - Category';
        $this->data['contentFile'] = 'category/addEditCategory.tpl';
        $this->smarty->view( 'sideBarLayout.tpl', $this->data );
    }
    /* 
        Purpose : Edit Category 
    */
    public function edit($iCategoryId){
        if($this->input->post())
        {   
            $targetColumnsAndValues = $this->input->post();
            $iCategoryId = trim($targetColumnsAndValues['iCategoryId']);
            unset($targetColumnsAndValues['iCategoryId']);
            if($_FILES['tImage']['name'])
            { 
                $image_uploaded = $this->do_upload_various_files($iCategoryId,'category','tImage');
                $targetColumnsAndValues['tImage']=$image_uploaded;
            }
            $comparisonColumnsAndValues = array('iCategoryId' => array($iCategoryId,'where'));
            $totalRows = $this->querycreator->updateQuery('category',$comparisonColumnsAndValues,$targetColumnsAndValues);
            if($totalRows>0)
            {
               $this->session->set_flashdata('message', 'Record Updated Successfully.');
            }       
           redirect($this->data['base_url'].'admin/Category');
           exit();
        }
        $columnsToSelect = 'iCategoryId,tTitle,tImage,eStatus';
        $comparisonColumnsAndValues = array('iCategoryId' => array($iCategoryId,'where'));
        $singleRecord = $this->querycreator->selectQuery('category',$columnsToSelect,$comparisonColumnsAndValues,'Single',NULL);
        if(file_exists($this->data['base_upload_path'].'category/'.$singleRecord['iCategoryId'].'/'.$singleRecord['tImage']) && (!empty($singleRecord['tImage'])))
        {
            $singleRecord['tImage'] = $this->data['base_upload'].'category/'.$singleRecord['iCategoryId'].'/'.$singleRecord['tImage'];
        }
        else
        {
            $singleRecord['tImage'] = '';
        }
        $this->data['mode'] = 'Edit';
        $this->data['singleRecord'] = $singleRecord;
        $this->data['message']=$this->session->flashdata('message');
        $this->data['page'] = 'Category';
        $this->data['title'] = 'Restaurant App - Category';
        $this->data['contentFile'] = 'category/addEditCategory.tpl';
        $this->smarty->view( 'sideBarLayout.tpl', $this->data );
    }
    /* 
        Purpose : Active,Inactive,Archive and Delete Category 
    */
    function action_update()
    {
        $ids = $this->input->post('iId');
        $action=$this->input->post('action');
        if($action=='Deleted')
        {
            $comparisonColumnsAndValues = array('iCategoryId' => array($ids,'where_in'));
            $totalRows = $this->querycreator->deleteQuery('category',$comparisonColumnsAndValues);
        }
        else
        {
            $category_arr['eStatus'] = $action;
            $comparisonColumnsAndValues = array('iCategoryId' => array($ids,'where_in'));
            $totalRows = $this->querycreator->updateQuery('category',$comparisonColumnsAndValues,$category_arr);
        }
        $record_title = ($totalRows>1) ? "Records" : "Record";
        $display_msg = ($action=='Archive') ? 'Total ('.$totalRows.') '.$record_title.' Archived Successfully.' : 'Total ('.$totalRows.') '.$record_title.' Updated Successfully.';
        $this->session->set_flashdata('message', $display_msg);
        redirect($this->data['base_url'].'admin/Category');
        exit();
    } 
    /* 
        Purpose : Remove Category 
    */  
    function removeImage(){
        $foldername=$this->uri->segment('4');
        $iCategoryId = $this->uri->segment('5'); 
        $columnsToSelect = 'iCategoryId,tTitle,tImage,eStatus';
        $comparisonColumnsAndValues = array('iCategoryId' => array($iCategoryId,'where'));
        $singleRecord = $this->querycreator->selectQuery('category',$columnsToSelect,$comparisonColumnsAndValues,'Single',NULL);
        if ($singleRecord != NULL && file_exists($this->data['base_upload_path'].'category/'.$singleRecord['iCategoryId'].'/'.$singleRecord['tImage'])) {
            $path = $this->data['base_upload_path'].$foldername.'/'.$iCategoryId.'/'.$singleRecord['tImage'];
            unlink($path);
            $targetColumnsAndValues['tImage'] = '';
            $comparisonColumnsAndValues = array('iCategoryId' => array($iCategoryId,'where'));
            $totalRows = $this->querycreator->updateQuery('category',$comparisonColumnsAndValues,$targetColumnsAndValues);
        }
        redirect($this->data['base_url']."admin/Category/edit/".$iCategoryId);
    }

}
?>