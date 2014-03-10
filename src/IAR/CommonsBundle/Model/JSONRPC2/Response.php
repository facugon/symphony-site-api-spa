<?php

namespace IAR\CommonsBundle\Model\JSONRPC2;

class Response
{
    protected $requestID = null;

    protected $content ;

    protected $status ;

    public function __construct($content, $status = 200)
    {
        $this->content = $content ;
        $this->statusCode = $status ;
    }

    public function isErrorResponse()
    {
        $code = strval( $this->statusCode ) ; // HTTP Error Status 4XX . Client Error Codes

        return $code[0] == '4' ;
    }

    public function getContent()
    {
        if( $this->isErrorResponse() )
        {
            return array(
                'jsonrpc' => '2.0',
                'id'      => $this->requestID,
                'error'   => $this->content,
            );
        }
        else  {
            return array(
                'jsonrpc' => '2.0',
                'id'      => $this->requestID,
                'result'  => $this->content,
            );
        }
    }

    public function __toString()
    {
        return $this->getContent() ;
    }
}
