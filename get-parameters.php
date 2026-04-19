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

    $ep = trim($values['/example/endpoint'] ?? '');
    $un = trim($values['/example/username'] ?? 'admin');
    $pw = trim($values['/example/password'] ?? 'CSVC-A3-G7Group!');
    $db = trim($values['/example/database'] ?? 'countries');
  }
  catch (Exception $e) {
    error_log("SSM Error: " . $e->getMessage());
    $ep = $un = $pw = $db = '';
  }
?>