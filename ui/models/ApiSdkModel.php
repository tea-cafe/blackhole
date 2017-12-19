<?php
class ApiSdkModel extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->library('DbUtil');
    }

    public function getSdkCfgByAppId($arrParams) {
        $arrWhere = [
            'select' => '*',
            'where' => "app_id='".$arrParams['app_id']."'",
        ];
        $arrRet = $this->dbutil->getSdkData($arrWhere);
        if($arrRet) {
            return json_decode($arrRet[0]['data'], true);
        }
        return false;
    }
}
