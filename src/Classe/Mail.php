<?php

namespace App\Classe;

use Mailjet\Client;
use Mailjet\Resources;

class Mail
{
    private $api_key = '21c5b5ae0fb55113ae2d0c804a95fbbc';
    private $api_key_secret = 'fb2ae5a698957885e8ef194217257107';
   

    public function send($to_email,$to_name,$subject,$content) {
        
        $mj = new Client($this->api_key, $this->api_key_secret,true,['version' =>'v3.1']);
        
        $body = [
            'Messages' => [
              [
                'From' => [
                  'Email' => "adrichristophe@gmail.com",
                  'Name' => "Adrien"
                ],
                'To' => [
                  [
                    'Email' => $to_email,
                    'Name' => $to_name
                  ]
                ],
                "TemplateID" => 2027516,
                "TemplateLanguage"=> true,
                "Subject" => $subject,
                'Variables' => [
                'content' => $content, 
                
                ]
                
              ]
            ]
          ];
          $response = $mj->post(Resources::$Email, ['body' => $body]);
          $response->success();
          
        }
        
        
    }