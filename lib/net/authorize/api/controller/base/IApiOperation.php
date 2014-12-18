<?php
namespace net\authorize\api\controller\base;

interface IApiOperation
{
    public function getApiResponse();
    public function executeWithApiResponse( $endPoint = null);
    public function execute( $endPoint = null);
    /*
        //TS GetApiResponse();
        AuthorizeNet.Api.Contracts.V1.ANetApiResponse GetErrorResponse();
        //TS ExecuteWithApiResponse(AuthorizeNet.Environment environment = null);
        //void Execute(AuthorizeNet.Environment environment = null);
        AuthorizeNet.Api.Contracts.V1.messageTypeEnum GetResultCode();
        List<string> GetResults();
    */
}