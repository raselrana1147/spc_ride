<?php

return [
  'gcm' => [
      'priority' => 'high',
      'dry_run' => false,
      'apiKey' => config('constants.android_push_key'),
  ],
  'fcm' => [
        'priority' => 'high',
        'dry_run' => false,
        'apiKey' => config('constants.android_push_key'),
  ],
  'apn' => [
      
  ]
];
