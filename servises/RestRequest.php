<?php
class RestRequest  
{  
    protected $request_vars;  
    protected $data;
    protected $method;
    protected $http_accept;
  
    public function __construct()  
    {  
        $this->request_vars      = array();  
        $this->data              = '';
        $this->http_accept       = 'json';
        $this->method            = 'get';  
    }
  
    public function setData($data)  
    {  
        $this->data = $data;  
    }  
  
    public function setMethod($method)  
    {  
        $this->method = $method;  
    }  
  
    public function setRequestVars($request_vars)  
    {  
        $this->request_vars = $request_vars;  
    }
  
    public function getData()  
    {  
        return $this->data;  
    }  
  
    public function getMethod()  
    {  
        return $this->method;  
    }
    
    public function getHttpAccept()  
    {
        return $this->http_accept;  
    }
  
    public function getRequestVars()  
    {  
        return $this->request_vars;  
    }  
}
?>