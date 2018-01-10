<?php
class ApiGetQuestion extends MY_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->config('activity_question');
        $arrQuestions = $this->config->item('activity_question');
        $arrQuestion = $arrQuestions[mt_rand(1,2)][mt_rand(0,99)];
        if (mt_rand(0,1)) {
            $arrRes = [
                'question' => $arrQuestion[0],
                'A' => $arrQuestion[2],
                'B' => $arrQuestion[1],
                'r' => 'B',
            ];
        } else {
            $arrRes = [
                'question' => $arrQuestion[0],
                'A' => $arrQuestion[1],
                'B' => $arrQuestion[2],
                'r' => 'A',
            ];
        }
        return $this->outJson($arrRes, ErrCode::OK);
    }
}
