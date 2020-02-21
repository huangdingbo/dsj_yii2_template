<?php


namespace console\modules\demo\server;


class GetHwyInfoServer extends AbsGet123Server
{
    public function getDataKey()
    {
        return 'GetHWYInfoResult';
    }

    public function getParams()
    {
        $params = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
    <soap:Envelope xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:soap=\"http://schemas.xmlsoap.org/soap/envelope/\">
    <soap:Body>
        <GetHWYInfo xmlns=\"http://tempuri.org/\">
            <jsonHWY>
                {\"paras\":
                    {
                        \"IdentityGuid\":\"Epoint_WebSerivce_**##0601\"
                    }
                }
           </jsonHWY>
        </GetHWYInfo>
    </soap:Body>
    </soap:Envelope>";

        return $params;
    }


}