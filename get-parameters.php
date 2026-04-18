<?php
  require 'aws.phar';
  
  // FIXED for Amazon Linux 2023 compatibility
  $region = 'us-east-1'; 
  
  $ssm_client = new Aws\Ssm\SsmClient([
     'version' => 'latest',
     'region'  => $region
  ]);
  
  try {
    # Retrieve settings from Parameter Store
    $result = $ssm_client->GetParametersByPath(['Path' => '/example/', 'WithDecryption' => true]);

    # Extract individual parameters
    $values = [];
    foreach($result['Parameters'] as $p) {
        $values[$p['Name']] = $p['Value'];
    }

    $ep = $values['/example/endpoint'] ?? '';
    $un = $values['/example/username'] ?? 'admin';
    $pw = $values['/example/password'] ?? 'YourPassword123!';
    $db = $values['/example/database'] ?? 'countries';
  }
  catch (Exception $e) {
    error_log("SSM Error: " . $e->getMessage());
    $ep = $un = $pw = $db = '';
  }
?>