<?php


namespace console\modules\demo\server;

/**
 * Class Get123OperationServer
 * @package console\modules\demo\server
 * 获取12345操作详情接口
 */
class Get123OperationServer extends AbsGet123Server
{
    private $caseGuid;

    public function setCaseGuid($caseGuid){
        $this->caseGuid = $caseGuid;

        return $this;
    }

    public function getDataKey()
    {
        return 'GetOperationResult';
    }

    public function getParams()
    {
        $params = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
    <soap:Envelope xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:soap=\"http://schemas.xmlsoap.org/soap/envelope/\">
    <soap:Body>
        <GetOperation xmlns=\"http://tempuri.org/\">
            <jsonCaseGuid>
                {\"paras\":
                    {
                        \"IdentityGuid\":\"Epoint_WebSerivce_**##0601\",
                        \"CaseGuid\":\"{$this->caseGuid}\"
                    }
                }
           </jsonCaseGuid>
        </GetOperation>
    </soap:Body>
    </soap:Envelope>";

        return $params;
    }

}