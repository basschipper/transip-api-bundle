<?php

namespace Verschoof\TransipApiBundle\Service;

use Transip;

class TransipService
{
    protected $client;

    public function __construct($transipConfig)
    {
        $soapOptions = [];

        if (isset($transipConfig['proxy_host'])) {
            $soapOptions['proxy_host'] = $transipConfig['proxy_host'];

            if (isset($transipConfig['proxy_port'])) {
                $soapOptions['proxy_port'] = $transipConfig['proxy_port'];
            }
        }
        
        $this->client = new Transip\Client($transipConfig['login'], $transipConfig['private_key'], $transipConfig['read_only']);
        $this->client->setSoapOptions($soapOptions);
    }

    public function api($name)
    {
        return $this->client->api($name);
    }
}
