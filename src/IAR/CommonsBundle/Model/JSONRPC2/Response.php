<?php

namespace IAR\CommonsBundle\Model\JSONRPC2;

class Response {
    public function result ( $data, $id=null ) {
        return array(
            'jsonrpc' => '2.0',
            'id' => $id,
            'result' => $data,
        );
    }

    public function error ( $data, $id=null ) {
        return array(
            'jsonrpc' => '2.0',
            'id' => $id,
            'error' => $data,
        );
    }
}
