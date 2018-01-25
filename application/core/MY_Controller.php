<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class MY_Controller extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        ini_set('post_max_size', '500M');
		ini_set('upload_max_filesize', '500M');
		$this->load->library('session');
		$this->load->helper('cookie');
		$this->load->helper('url');
		$this->load->database();
		$this->load->library('email');
		$this->load->helper('file');
		$this->load->library('Image_lib');
		$this->load->library('Upload');
        $this->load->helper('string');
        $this->load->model('querycreator');
        $themeTitle = 'fixed-width-light';
        $this->data['base_path'] = $this->config->item('base_path');
        $this->data['base_url'] = $this->config->item('base_url');
        $this->data['base_upload'] = $this->config->item('base_upload');
        $this->data['base_upload_path'] = $this->config->item('base_upload_path');
        $this->data['theme_base_dist'] = $this->config->item('base_url').'assets/theme/'.$themeTitle.'/dist/';
        $this->data['theme_base_src'] = $this->config->item('base_url').'assets/theme/'.$themeTitle.'/src/';
        $this->data['theme_base_vendors'] = $this->config->item('base_url').'assets/theme/'.$themeTitle.'/vendors/';
        $this->data['theme_title'] = $themeTitle;
        switch($themeTitle){
            case 'fixed-width-light':
                $this->data['theme_no'] = 'theme-1';
                break;
            case 'fixed-width-dark':
                $this->data['theme_no'] = 'theme-2';
                break;
            default :
                $this->data['theme_no'] = 'theme-1';
                break;
        }
        
    }

    /* 
        Created By : Snehal Gohel
        Created Date : 13 Dec 2017
        Purpose : encrypt data
    */
    function encrypt($data)
    {
        for($i = 0, $key = 27, $c = 48; $i <= 255; $i++){
            $c = 255 & ($key ^ ($c << 1));
            $table[$key] = $c;
            $key = 255 & ($key + 1);
        }
        $len = strlen($data);
        for($i = 0; $i < $len; $i++){
            $data[$i] = chr($table[ord($data[$i])]);
        }
        return base64_encode($data);
    }
     
    /* 
        Created By : Snehal Gohel
        Created Date : 13 Dec 2017
        Purpose : decrypt data
    */  
    function decrypt($data)
    {
        $data = base64_decode($data);
        for($i = 0, $key = 27, $c = 48; $i <= 255; $i++){
            $c = 255 & ($key ^ ($c << 1));
            $table[$c] = $key;
            $key = 255 & ($key + 1);
        }
        $len = strlen($data);
        for($i = 0; $i < $len; $i++){
            $data[$i] = chr($table[ord($data[$i])]);
        }       
        return $data;
    }

    /*  
        Purpose : Date Time Format
    */
    function dateTimeFormat($datetime){
        if ($datetime != '0000-00-00 00:00:00') {
           $date = date_create_from_format("Y-m-d",date('Y-m-d',strtotime($datetime)));
            $time = date_create_from_format("H:i:s",date('H:i:s',strtotime($datetime)));
            return date_format($date,"j M").' at '.date_format($time, 'G:i A');
        }
        else
        {
            return '';
        }
    }
    function dateTimeFormatWithYear($datetime){
        if ($datetime != '0000-00-00 00:00:00') {
           $date = date_create_from_format("Y-m-d",date('Y-m-d',strtotime($datetime)));
            $time = date_create_from_format("H:i:s",date('H:i:s',strtotime($datetime)));
            return date_format($date,"j M Y").' at '.date_format($time, 'G:i A');
        }
        else
        {
            return '';
        }
    }
    /*  
        Purpose : Date Format
    */
    function dateFormat($date){
        if ($date != '0000-00-00') {
           $date = date_create_from_format("Y-m-d",date('Y-m-d',strtotime($date)));
            return date_format($date,"j M");
        }
        else
        {
            return '';
        }
    }
    function dateFormatWithYear($date){
        if ($date != '0000-00-00') {
           $date = date_create_from_format("Y-m-d",date('Y-m-d',strtotime($date)));
            return date_format($date,"j M Y");
        }
        else
        {
            return '';
        }
    }
    /*  
        Purpose : Date Format
    */
    function timeFormat($time){
        if ($time != '00:00:00') {
            $time = date_create_from_format("H:i:s",date('H:i:s',strtotime($time)));
            return date_format($time, 'G:i A');
        }
        else
        {
            return '';
        }
    }
    

    /* 
        Created By : Snehal Gohel
        Created Date : 13 Dec 2017
        Purpose : Send Mail
    */
    function send_email($vEmailCode,$vEmail,$bodyArr,$postArr)
    {
        $email_info = $this->Common_model->getSingleRecordByFieldWithoutStatus('emailtemplates','vEmailCode',$vEmailCode);
        $subject = strtr($email_info['vEmailSubject'], "\r\n" , "  " );

        $body = stripslashes($email_info['tEmailMessage']);
        $from_name = $email_info['vFromName'];
        $from_email = $email_info['vFromEmail'];
        $body = str_replace($bodyArr,$postArr, $body);
        $to = stripcslashes($vEmail);
        require_once(APPPATH.'third_party/PHPMailer-master/PHPMailerAutoload.php');
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;       
        $mail->SMTPDebug = 0;                     // Enable SMTP authentication
        $mail->Username = 'demo1.testing1@gmail.com';                 // SMTP username
        $mail->Password = 'demo12345678';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                  // TCP port to connect to

        $mail->From = $from_email;
        $mail->FromName = $from_name;
        $mail->addAddress($to);
        $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = '';
        
        if(!$mail->send()) {
            $res = 0;
        } else {
            $res = 1;
        }
        return $res;        
    }
    
    /* 
        Created By : Snehal Gohel
        Created Date : 13 Dec 2017
        Purpose :File Upload in Specific Folder
    */
    function do_upload_various_files($folderId,$folder,$image){
        if(!is_dir('assets/uploads/'.$folder.'/')){
            @mkdir('assets/uploads/'.$folder.'/', 0777);
        }
        if(!is_dir('assets/uploads/'.$folder.'/'.$folderId)){
            @mkdir('assets/uploads/'.$folder.'/'.$folderId, 0777);
        }
        
        $name = date('YmdHis').'_'.$_FILES[$image]['name'];
        $file_name = preg_replace("/[^a-zA-Z0-9.]/", "_", $name);

        $basepath = $this->data['base_upload_path'].$folder.'/'.$folderId.'/'.$file_name;
        if(move_uploaded_file($_FILES[$image]['tmp_name'],$basepath)){

            return $file_name;
        }
        else {
            return '';
        }
    }

    /* 
        Purpose :Static Push Notification
    */

    function staticPushNotification(){
        $pushNotification['msg'] = 'Bill24 Notification Testing@Ongoing';
        $pushNotification['tDeviceToken'] = 'fY1WLyNfmz0:APA91bGSzCHFREDkjWZDEZiun0Eg2BkSiBiwxDKPDUffE73BvfXq1kOGyyY-2X-DGOfqD2XhGN6MWq2hRNfF2Ws8VFbPUtTu79HlBabRsYZUmsbBcuP1He8bgFLwKWMQYzOa3dDf6YVP';
        $pushNotification['eUserType'] = 'Consumer'; // Provider // Consumer
        $pushNotification['eDeviceType'] = 'Android';
        $this->pushNotification($pushNotification);
    }

    /* 
        Purpose :Send Push Notification
    */
    function sendNotification($iUserId,$eUserType,$pushNotoficationMsg,$notificationArr)
    {
        if ($eUserType == 'Consumer') {
            $columnsToSelect = 'tDeviceId,tDeviceToken,tDeviceName,eDeviceType';
            $comparisonColumnsAndValues = array('eStatus !=' => array('Archive','where'),'eNotification' => array('On','where'),'iConsumerId' => array($iUserId,'where'));
            $userDeviceDetails = $this->querycreator->selectQuery('consumers',$columnsToSelect,$comparisonColumnsAndValues,'Single',NULL);
        }
        else
        {
            $columnsToSelect = 'tDeviceId,tDeviceToken,tDeviceName,eDeviceType';
            $comparisonColumnsAndValues = array('eStatus !=' => array('Archive','where'),'eNotification' => array('On','where'),'iProviderId' => array($iUserId,'where'));
            $userDeviceDetails = $this->querycreator->selectQuery('providers',$columnsToSelect,$comparisonColumnsAndValues,'Single',NULL);
        }
        if ($userDeviceDetails != NULL) {
            $this->querycreator->insertSingle('notification',$notificationArr);
            $pushNotification['msg'] = $pushNotoficationMsg;        
            $pushNotification['tDeviceToken'] = $userDeviceDetails['tDeviceToken'];       
            $pushNotification['eUserType'] = $eUserType;        
            $pushNotification['eDeviceType'] = $userDeviceDetails['eDeviceType'];        
            $this->pushNotification($pushNotification);
        }
        //print_r($user_device_details);exit;
       
        return;
    }
    

     /* 
        Purpose : Push Notification
    */
    function pushNotification($data){
        if($data['eDeviceType']=='iOS'){
            $url = $this->data['base_url'].'pushnotification/pushnotify_iOS/push.php';
        }
        else {
            $url = $this->data['base_url'].'pushnotification/pushnotify_Android/sendSinglePush.php';
        }
        $fields_string = '';
        foreach($data as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        $fields_string = rtrim($fields_string,'&');

        $ch = curl_init();
        
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,count($data));
        curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
        
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,  CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        //print_r($result);exit;
        curl_close($ch);
        return json_decode($result,true);
    }
}