<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends MY_Controller {
	 function __construct() {
        parent::__construct();
    }
    /* 
        Purpose : Display Item page
    */
    public function index(){
        $columnsToSelect = 'i.iItemId,i.iCategoryId,i.tTitle,i.tImage,i.eStatus,c.tTitle categoryTitle';
        $comparisonColumnsAndValues = array('i.eStatus !=' => array('Archive','where'));
        $sortingColumnsAndValues = array('i.eStatus'=>'ASC','i.iItemId'=>'DESC');
        $tableComparisonColumns = array('item i'=>'','category c'=> 'c.iCategoryId=i.iCategoryId');
        $allData = $this->querycreator->joinInnerQuery($tableComparisonColumns,$columnsToSelect,$comparisonColumnsAndValues,'Multiple',$sortingColumnsAndValues);
        foreach ($allData as $key => $value) {
            if(file_exists($this->data['base_upload_path'].'item/'.$value['iItemId'].'/'.$value['tImage']) && (!empty($value['tImage'])))
            {
                $allData[$key]['tImage'] = $this->data['base_upload'].'item/'.$value['iItemId'].'/'.$value['tImage'];
            }
            else
            {
                $allData[$key]['tImage'] = $this->data['base_upload'].'no-image.png';
            }
        }
        $this->data['all_Data']=$allData;
        $this->data['message']=$this->session->flashdata('message');
        $this->data['page'] = 'Item';
        $this->data['title'] = 'Restaurant App - Item';
        $this->data['contentFile'] = 'item/listItem.tpl';
        $this->smarty->view('sideBarLayout.tpl', $this->data);
    }
    /* 
        Purpose : Add Item 
    */
    public function add(){
        if($this->input->post())
        {
            $postDetails = $this->input->post();
            $iItemId = $this->querycreator->insertSingle('item',$postDetails);
            if($iItemId>0)
            {
                if($_FILES['tImage']['name'])
                { 
                    $image_uploaded = $this->do_upload_various_files($iItemId,'item','tImage');
                    $targetColumnsAndValues['tImage']=$image_uploaded;
                    $comparisonColumnsAndValues = array('iItemId' => array($iItemId,'where'));
                    $totalRows = $this->querycreator->updateQuery('item',$comparisonColumnsAndValues,$targetColumnsAndValues);
                }
                $this->session->set_flashdata('message', 'Record Added Successfully.');
                redirect($this->data['base_url'].'admin/Item');
            }
        }
        $columnsToSelect = 'iCategoryId,tTitle,tImage,eStatus';
        $comparisonColumnsAndValues = array('eStatus !=' => array('Archive','where'));
        $sortingColumnsAndValues = array('eStatus'=>'ASC','iCategoryId'=>'DESC');
        $this->data['categoryArray'] = $this->querycreator->selectQuery('category',$columnsToSelect,$comparisonColumnsAndValues,'Multiple',$sortingColumnsAndValues);
        $this->data['mode'] = 'Add';
        $this->data['data'] = $this->data;
        $this->data['message']=$this->session->flashdata('message');
        $this->data['page'] = 'Item';
        $this->data['title'] = 'Restaurant App - Item';
        $this->data['contentFile'] = 'item/addEditItem.tpl';
        $this->smarty->view( 'sideBarLayout.tpl', $this->data );
    }
    /* 
        Purpose : edit Item 
    */
    public function edit($iItemId){
        if($this->input->post())
        {   
            $targetColumnsAndValues = $this->input->post();
            $iItemId = trim($targetColumnsAndValues['iItemId']);
            unset($targetColumnsAndValues['iItemId']);
            if($_FILES['tImage']['name'])
            { 
                $image_uploaded = $this->do_upload_various_files($iItemId,'item','tImage');
                $targetColumnsAndValues['tImage']=$image_uploaded;
            }
            $comparisonColumnsAndValues = array('iItemId' => array($iItemId,'where'));
            $totalRows = $this->querycreator->updateQuery('item',$comparisonColumnsAndValues,$targetColumnsAndValues);
            if($totalRows>0)
            {
               $this->session->set_flashdata('message', 'Record Updated Successfully.');
            }       
           redirect($this->data['base_url'].'admin/Item');
           exit();
        }
        $columnsToSelect = 'iItemId,iCategoryId,tTitle,tImage,eStatus';
        $comparisonColumnsAndValues = array('iItemId' => array($iItemId,'where'));
        $singleRecord = $this->querycreator->selectQuery('item',$columnsToSelect,$comparisonColumnsAndValues,'Single',NULL);
        if(file_exists($this->data['base_upload_path'].'item/'.$singleRecord['iItemId'].'/'.$singleRecord['tImage']) && (!empty($singleRecord['tImage'])))
        {
            $singleRecord['tImage'] = $this->data['base_upload'].'item/'.$singleRecord['iItemId'].'/'.$singleRecord['tImage'];
        }
        else
        {
            $singleRecord['tImage'] = '';
        }
        $columnsToSelect = 'iCategoryId,tTitle,tImage,eStatus';
        $comparisonColumnsAndValues = array('eStatus !=' => array('Archive','where'));
        $sortingColumnsAndValues = array('eStatus'=>'ASC','iCategoryId'=>'DESC');
        $this->data['categoryArray'] = $this->querycreator->selectQuery('category',$columnsToSelect,$comparisonColumnsAndValues,'Multiple',$sortingColumnsAndValues);
        $this->data['mode'] = 'Edit';
        $this->data['singleRecord'] = $singleRecord;
        $this->data['message']=$this->session->flashdata('message');
        $this->data['page'] = 'Item';
        $this->data['title'] = 'Restaurant App - Item';
        $this->data['contentFile'] = 'item/addEditItem.tpl';
        $this->smarty->view( 'sideBarLayout.tpl', $this->data );
    }
    /* 
        Purpose : Active,Inactive,Archive and Delete Item 
    */
    function actionUpdate()
    {
        $ids = $this->input->post('iId');
        $action=$this->input->post('action');
        if($action=='Deleted')
        {
            $comparisonColumnsAndValues = array('iItemId' => array($ids,'where_in'));
            $totalRows = $this->querycreator->deleteQuery('item',$comparisonColumnsAndValues);
        }
        else
        {
            $category_arr['eStatus'] = $action;
            $comparisonColumnsAndValues = array('iItemId' => array($ids,'where_in'));
            $totalRows = $this->querycreator->updateQuery('item',$comparisonColumnsAndValues,$category_arr);
        }
        $record_title = ($totalRows>1) ? "Records" : "Record";
        $display_msg = ($action=='Archive') ? 'Total ('.$totalRows.') '.$record_title.' Archived Successfully.' : 'Total ('.$totalRows.') '.$record_title.' Updated Successfully.';
        $this->session->set_flashdata('message', $display_msg);
        redirect($this->data['base_url'].'admin/Item');
        exit();
    }   
    /* 
        Purpose : Remove Item 
    */
    function removeImage(){
        $foldername=$this->uri->segment('4');
        $iItemId = $this->uri->segment('5'); 
        $columnsToSelect = 'iItemId,tTitle,tImage,eStatus';
        $comparisonColumnsAndValues = array('iItemId' => array($iItemId,'where'));
        $singleRecord = $this->querycreator->selectQuery('item',$columnsToSelect,$comparisonColumnsAndValues,'Single',NULL);
        if ($singleRecord != NULL && file_exists($this->data['base_upload_path'].'item/'.$singleRecord['iItemId'].'/'.$singleRecord['tImage'])) {
            $path = $this->data['base_upload_path'].$foldername.'/'.$iItemId.'/'.$singleRecord['tImage'];
            unlink($path);
            $targetColumnsAndValues['tImage'] = '';
            $comparisonColumnsAndValues = array('iItemId' => array($iItemId,'where'));
            $totalRows = $this->querycreator->updateQuery('item',$comparisonColumnsAndValues,$targetColumnsAndValues);
        }
        redirect($this->data['base_url']."admin/Item/edit/".$iItemId);
    }

}
?>