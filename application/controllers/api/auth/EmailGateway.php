<?php

class EmailGateway {

    private $CI;
    private $config;

    /**
     * EmailGateway constructor.
     */
    function __construct()
    {
        $this->CI = &get_instance();
        $this->config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => '465',
            'smtp_timeout' => '7',
            'smtp_user' => getenv('EMAIL_USER'),
            'smtp_pass' => getenv('EMAIL_PASS'),
            'mailtype'  => 'html',
            'newline'  => "\r\n",
            'charset'   => 'utf-8'
        );
    }

    function sendEmailOtp($emailTo, $otpNumber) {
        $this->CI->load->library('email');
        $this->CI->email->initialize($this->config);
        $this->CI->email->from('heavlypedia.id@gmail.com', 'Heavlypedia ID');
        $this->CI->email->to($emailTo);
        $this->CI->email->subject('Kode OTP');
        $this->CI->email->message('Halo dari Heavlypedia, ini kode rahasia kamu : <b>'.$otpNumber.'</b> , jangan dibagikan kepada siapapun');
        $email = $this->CI->email->send();
        if($email) {
            return $email;
        } else {
            return $this->CI->email->print_debugger();
        }
    }

    function generateRandomNumber() {
        return rand(1000, 10000);
    }

}