<?php

return [
  'gcm' => [
      'priority' => 'normal',
      'dry_run' => false,
      'apiKey' => 'My_ApiKey',
  ],
  'fcm' => [
        'priority' => 'normal',
        'dry_run'  => false,
        'apiKey'   => '',
  ],
  'apn' => [
        'certificate' => config_path('iosCertificates/aps_dev_cert.pem'),
        'passPhrase' => '123', //Optional
        'passFile' => config_path('iosCertificates/aps_dev_key.pem') , //Optional
        'dry_run' => true
  ]
];