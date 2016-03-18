<?php
namespace net\authorize\api\controller\base;

use InvalidArgumentException;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\handler\HandlerRegistryInterface;
use Goetas\Xsd\XsdToPhp\Jms\Handler\BaseTypesHandler;
use Goetas\Xsd\XsdToPhp\Jms\Handler\XmlSchemaDateHandler;

use \net\authorize\util\HttpClient;
use \net\authorize\util\Helpers;
use \net\authorize\util\LogFactory as LogFactory;


abstract class ApiOperationBase implements IApiOperation
{
    /**
     * @var \net\authorize\api\contract\v1\AnetApiRequestType
     */
    private $apiRequest = null;

    /**
     * @var \net\authorize\api\contract\v1\AnetApiResponseType
     */
    private $apiResponse = null;

    /**
     * @var String
     */
    private $apiResponseType = '';

    /**
     * @var \JMS\Serializer\Serializer;
     */
    public $serializer = null;

    /**
     * @var \net\authorize\util\HttpClient;
     */
    public $httpClient = null;
    private $logger = null;
    /**
     * Constructor.
     *
     * @param \net\authorize\api\contract\v1\AnetApiRequestType $request ApiRequest to send
     * @param string $responseType response type expected
     * @throws InvalidArgumentException if invalid request
     */
    public function __construct(\net\authorize\api\contract\v1\AnetApiRequestType $request, $responseType)
    {
        $this->logger = LogFactory::getLog(get_class($this));

        if ( null == $request)
        {
            throw new InvalidArgumentException( "request cannot be null");
        }

        if ( null == $responseType || '' == $responseType)
        {
            throw new InvalidArgumentException( "responseType cannot be null or empty");
        }

        if ( null != $this->apiResponse)
        {
            throw new InvalidArgumentException( "response has to be null");
        }

        $this->apiRequest = $request;
        $this->validate();

        $this->apiResponseType = $responseType;
        $this->httpClient = new HttpClient;

        $serializerBuilder = SerializerBuilder::create();
        $serializerBuilder->addMetadataDir( __DIR__ . '/../../yml/v1', 'net\authorize\api\contract\v1');//..\..\yml\v1\ //'/../lib/net/authorize/api/yml/v1'
        $serializerBuilder->configureHandlers(
            function (HandlerRegistryInterface $h)

            use($serializerBuilder)
            {
                $serializerBuilder->addDefaultHandlers();
                $h->registerSubscribingHandler(new BaseTypesHandler()); // XMLSchema List handling
                $h->registerSubscribingHandler(new XmlSchemaDateHandler()); // XMLSchema date handling
            }
        );
        $this->serializer = $serializerBuilder->build();
    }

    /**
     * Retrieves response
     * @return \net\authorize\api\contract\v1\AnetApiResponseType
     */
    public function getApiResponse()
    {
        return $this->apiResponse;
    }

    /**
     * Sends request and retrieves response
     * @return \net\authorize\api\contract\v1\AnetApiResponseType
     */
    public function executeWithApiResponse($endPoint = \net\authorize\api\constants\ANetEnvironment::CUSTOM)
    {
        $this->execute($endPoint);
        return $this->apiResponse;
    }

    public function execute($endPoint = \net\authorize\api\constants\ANetEnvironment::CUSTOM)
    {
        $this->beforeExecute();

        $this->logger->info("Request Serialization Begin");
        $this->logger->debug($this->apiRequest);
        $xmlRequest = $this->serializer->serialize($this->apiRequest, 'xml');
        $this->logger->info("Request  Serialization End");
        /*
                //$xmlRequest = '<?xml version="1.0" encoding="UTF-8"?>  <ARBGetSubscriptionListRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">  <merchantAuthentication>  <name>4YJmeW7V77us</name>  <transactionKey>4qHK9u63F753be4Z</transactionKey>  </merchantAuthentication>  <refId><![CDATA[ref1416999093]]></refId>  <searchType><![CDATA[subscriptionActive]]></searchType>  <sorting>  <orderBy><![CDATA[firstName]]></orderBy>  <orderDescending>false</orderDescending>  </sorting>  <paging>  <limit>10</limit>  <offset>1</offset>  </paging>  </ARBGetSubscriptionListRequest>  ';
        */
        $this->httpClient->setPostUrl( $endPoint);
        $xmlResponse = $this->httpClient->_sendRequest($xmlRequest);
        if ( null == $xmlResponse)
        {
            throw new \Exception( "Error getting valid response from api. Check log file for error details");
        }
        $this->logger->info("Response De-Serialization Begin");
        $this->apiResponse = $this->serializer->deserialize( $xmlResponse, $this->apiResponseType , 'xml');
        $this->logger->info("Response De-Serialization End");

        $this->afterExecute();
    }

    private function validate()
    {
        $merchantAuthentication = $this->apiRequest->getMerchantAuthentication();
        if ( null == $merchantAuthentication)
        {
            throw new \InvalidArgumentException( "MerchantAuthentication cannot be null");
        }

        $this->validateRequest();
    }

    protected function beforeExecute() {}
    protected function afterExecute()  {}
    protected function validateRequest() {} //need to make this abstract

    protected function now()
    {
        return date( DATE_RFC2822);
    }
}