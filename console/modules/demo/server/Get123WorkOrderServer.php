<?php


namespace console\modules\demo\server;


/**
 * Class Get123WorkOrderServer
 * @package console\modules\demo\server
 * 获取12345工单数据
 */
class Get123WorkOrderServer extends AbsGet123Server
{
    private $startDate;

    private $endDate;

    private $page;

    private $pageSize = 10;

    public function setStartDate($startDate){
        $this->startDate = $startDate;

        return $this;
    }

    public function setEndDate($endDate){
        $this->endDate = $endDate;

        return $this;
    }

    public function setPage($page){
        $this->page = $page;

        return $this;
    }

    public function setPageSize($pageSize){
        $this->pageSize = $pageSize;

        return $this;
    }

    public function getDataKey()
    {
        return 'GetCaseInfoResult';
    }

    public function getParams()
    {
        return "<?xml version=\"1.0\" encoding=\"utf-8\"?>
    <soap:Envelope xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:soap=\"http://schemas.xmlsoap.org/soap/envelope/\">
    <soap:Body>
        <GetCaseInfo xmlns=\"http://tempuri.org/\">
            <jsonCaseInfo>
                {\"paras\":
                    {
                        \"IdentityGuid\":\"Epoint_WebSerivce_**##0601\",
                        \"StartDate\":\"{$this->startDate}\",
                        \"EndDate\":\"{$this->endDate}\",
                        \"CurrentPageIndex\":\"{$this->page}\",
                        \"PageSize\":\"{$this->pageSize}\"
                    }
                }
           </jsonCaseInfo>
        </GetCaseInfo>
    </soap:Body>
    </soap:Envelope>";
    }
}