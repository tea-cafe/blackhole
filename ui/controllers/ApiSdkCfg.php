<?php
class ApiSdkCfg extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('ApiSdkModel');
    }

    /**
     * @param void
     * @return void
     */
    public function getSdkCfg() {
        $arrParams = $this->input->get(NULL, true);
        if(count($arrParams) != 2
            || !isset($arrParams['app_id'])
            || !isset($arrParams['slot_id'])) {
            return $this->outJson([], ErrCode::ERR_INVALID_PARAMS);
        }

        if($arrParams['app_id'] == '6bq3bpop'
            && $arrParams['slot_id'] == 'ganuxntb') {
            $data = [];
            $strEcho = '{
                "ganuxntb": {
                    "strategy": {
                        "YEZI": 100
                    },
                "map": {
                    "YEZI": {
                        "app_id": "6bq3bpop",
                        "slot_id": "ganuxntb"
                            }
                        }
                    }
                }';
            $data = json_decode($strEcho, true);
            return $this->outJson($data, ErrCode::OK);
        }

        $arrRet = $this->ApiSdkModel->getSdkCfgByAppId($arrParams);
        return $arrRet?$this->outJson($arrRet, ErrCode::OK) : $this->outJson([], ErrCode::ERR_SYSTEM);
    }
}
