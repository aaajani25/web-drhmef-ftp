<?php
class Test extends MX_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
    }
    public function index() {
        $this->load->helper('form');
        $this->load->view('test/contact_email_form');
    }
    public function send_mail() {
        $from_email = "notification_drh@finances.gouv.ci";
        $to_email = $this->input->post('email');
        //Load email library
        $this->load->library('email');
        $config = array();

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.office365.com';
        $config['smtp_user'] = 'notification_drh@finances.gouv.ci';
        $config['smtp_pass'] = 'Facil@12345';
        $config['smtp_port'] = 587;
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        $this->email->from($from_email, 'Notification');
        $this->email->to($to_email);
        $this->email->subject('test Notification');
        $this->email->message('activation notification drh ');
        //Send mail
        if($this->email->send())
            $this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
        else
            $this->session->set_flashdata("email_sent",$this->email->print_debugger()
            );
        $this->load->view('test/contact_email_form');
    }
}
?>