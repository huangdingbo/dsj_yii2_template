<?php /** @noinspection LossyEncoding */


namespace console\modules\demo\server;

/**
 * Class Get123CaseTaskServer
 * @package console\modules\demo\server
 *
 * 获取12345工单详情数据
 */
class Get123CaseTaskServer extends AbsGet123Server
{
    private $caseGuid;

    public function setCaseGuid($caseGuid){
        $this->caseGuid = $caseGuid;

        return $this;
    }

    public function getParams()
    {
        $params = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
    <soap:Envelope xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:soap=\"http://schemas.xmlsoap.org/soap/envelope/\">
    <soap:Body>
        <GetCaseTaskInfo xmlns=\"http://tempuri.org/\">
            <jsonCaseGuid>
                {\"paras\":
                    {
                        \"IdentityGuid\":\"Epoint_WebSerivce_**##0601\",
                        \"CaseGuid\":\"{$this->caseGuid}\"
                    }
                }
           </jsonCaseGuid>
        </GetCaseTaskInfo>
    </soap:Body>
    </soap:Envelope>";

        return $params;
    }

    public function getDataKey()
    {
        return 'GetCaseTaskInfoResult';
    }
}