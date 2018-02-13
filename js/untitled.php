<?php

// use \SsoSetting;
class SamlSsoController extends Attendee\BaseController {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */

    public function __construct()
    {

        $log_path = app_path() . '/storage/logs/saml_sso.log';
        $this->log = new Logger('SSO Logs');
        $this->log->pushHandler(new StreamHandler($log_path, Logger::INFO));

         //
    // SsoAuthKey::where('attendee_id', $attendee->id)->where('auth_id', 'acadia_saml')->first();
    // $client = SsoSetting::where('client_identifier', $client_identifier)->first();
     $this->settings = array (
    // If 'strict' is True, then the PHP Toolkit will reject unsigned
    // or unencrypted messages if it expects them signed or encrypted
    // Also will reject the messages if not strictly follow the SAML
    // standard: Destination, NameId, Conditions ... are validated too.
    'strict' => false,

    // Enable debug mode (to print errors)
    'debug' => false,

    // Set a BaseURL to be used instead of try to guess
    // the BaseURL of the view that process the SAML Message.
    // Ex. http://sp.example.com/
    //     http://example.com/sp/
    'baseurl' => null,

    // Service Provider Data that we are deploying
    'sp' => array (
        // Identifier of the SP entity  (must be a URI)
        'entityId' => 'https://auth.mtgarchitect.com/sp',
        // Specifies info about where and how the <AuthnResponse> message MUST be
        // returned to the requester, in this case our SP.
        'assertionConsumerService' => array (
            // URL Location where the <Response> from the IdP will be returned
            'url' => 'https://auth.mtgarchitect.com/saml/pacira/acs',
            // SAML protocol binding to be used when returning the <Response>
            // message.  Onelogin Toolkit supports for this endpoint the
            // HTTP-Redirect binding only
            'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
        ),
        // If you need to specify requested attributes, set a
        // attributeConsumingService. nameFormat, attributeValue and
        // friendlyName can be omitted. Otherwise remove this section.
        "attributeConsumingService"=> array(
                "ServiceName" => "MtgArchitect",
                "serviceDescription" => "MtgArchitect SSO",
                "requestedAttributes" => array(
                    array(
                        "name" => "",
                        "isRequired" => false,
                        "nameFormat" => "",
                        "friendlyName" => "",
                        "attributeValue" => ""
                    )
                )
        ),
        // Specifies info about where and how the <Logout Response> message MUST be
        // returned to the requester, in this case our SP.
        // 'singleLogoutService' => array (
        //     // URL Location where the <Response> from the IdP will be returned
        //     'url' => '',
        //     // SAML protocol binding to be used when returning the <Response>
        //     // message.  Onelogin Toolkit supports for this endpoint the
        //     // HTTP-Redirect binding only
        //     'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
        // ),
        // Specifies constraints on the name identifier to be used to
        // represent the requested subject.
        // Take a look on lib/Saml2/Constants.php to see the NameIdFormat supported
        'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified',

        // Usually x509cert and privateKey of the SP are provided by files placed at
        // the certs folder. But we can also provide them with the following parameters
        'x509cert' => 'MIIDyjCCArICCQD776gSOM8I4TANBgkqhkiG9w0BAQsFADCBpjELMAkGA1UEBhMC
VVMxEDAOBgNVBAgMB05ld1lvcmsxETAPBgNVBAcMCE5ldyBZb3JrMRYwFAYDVQQK
DA1HcmFtZXJjeSBUZWNoMRQwEgYDVQQLDAtFdmVudGZpbml0eTEeMBwGA1UEAwwV
cGVla0BncmFtZXJjeXRlY2guY29tMSQwIgYJKoZIhvcNAQkBFhVwZWVrQGdyYW1l
cmN5dGVjaC5jb20wHhcNMTcwMjIyMDExNzI5WhcNMTgwMjIyMDExNzI5WjCBpjEL
MAkGA1UEBhMCVVMxEDAOBgNVBAgMB05ld1lvcmsxETAPBgNVBAcMCE5ldyBZb3Jr
MRYwFAYDVQQKDA1HcmFtZXJjeSBUZWNoMRQwEgYDVQQLDAtFdmVudGZpbml0eTEe
MBwGA1UEAwwVcGVla0BncmFtZXJjeXRlY2guY29tMSQwIgYJKoZIhvcNAQkBFhVw
ZWVrQGdyYW1lcmN5dGVjaC5jb20wggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEK
AoIBAQCh8M3dI0H9aoLpeONhJI7yETAY1V06ADmtGrQ7Joiiac64b04+VFIYHhfd
mo7VUF/oo8oVZSG4MJFOpqEDJA4DzZQ5S/VYNDUKlU9iDLxuOuaCv0iDB6NXnp77
rtqqgD1vbADitJyeSKqevu4WPKbIA9qvXD5WZCYUURzVd+eKFpaNJY8kDLqw6jZy
cjW5PZyhV2BLqDWLk0nduk5j2JKYoKMZi3HrqE76M8w3n0DjLndQD//WBDP1F6k2
i3HDK7TiCBfUsa8SALbY0798pp9VMZCB6JoGYslIhdpVUV77yZs3yn8MB0W7wUbF
9ytQJy5RXdZZxttbhQtjdXZhkIjXAgMBAAEwDQYJKoZIhvcNAQELBQADggEBAAEW
Y+yFkygdb8t+Sa6BQN1fTsX8vVk2Ss67pXLL4bBAxiJEqGDhjZOzYzTesjanrSnz
zmQQbchA/vCPp5rvw1InAbGv4CexjvLn7El8+WBBrTUWvWvTjHd6o5lhnmUYJ4hi
Fd6+4oZgjMJ71psCCXjmd6+GHZ5vjxbbq881xrvz7i7X+CTZnDyWgGKTi+i9pAv2
Sm41FdC1oZRKEPJk9TBhI3odkuhldRQ9QdPoAzvLK/qYGh+sKLNoH17QCfLtgsCs
vFTfDF/Ndir7qgaP9jVxFeuFKDD3vJbid0ab+ZsaPlKUrOdilBifb7qCyxO9UQui
33ej1lqlg+T3nf8uXkM=',
        'privateKey' => 'MIIEogIBAAKCAQEAofDN3SNB/WqC6XjjYSSO8hEwGNVdOgA5rRq0OyaIomnOuG9O
PlRSGB4X3ZqO1VBf6KPKFWUhuDCRTqahAyQOA82UOUv1WDQ1CpVPYgy8bjrmgr9I
gwejV56e+67aqoA9b2wA4rScnkiqnr7uFjymyAPar1w+VmQmFFEc1XfnihaWjSWP
JAy6sOo2cnI1uT2coVdgS6g1i5NJ3bpOY9iSmKCjGYtx66hO+jPMN59A4y53UA//
1gQz9RepNotxwyu04ggX1LGvEgC22NO/fKafVTGQgeiaBmLJSIXaVVFe+8mbN8p/
DAdFu8FGxfcrUCcuUV3WWcbbW4ULY3V2YZCI1wIDAQABAoIBAA/U4dtXohDrQ8cd
aWVK1Kq3oXMcENQlx32z2aDawIrYOzxurUCMr8Xp0z136bTS+b1dndj/nQ9LuDjv
M1iCQth+VZpQYbjwyaqyNCOKyTUhjv2DQ8yDh6V+PV6vlnMKvHbTITcInzMeOYfx
dIc6ALgXIF76bqG1gr+DuoToBvvJ17ghAwpd7CawLzHKwmd9jSKqynBcIJ7EXZMD
M0wuT7C5Bin4zF/diT3qbAuZzIOXPSFwDR18+l5dwqVPpzXG2cLTq2qjgNezslBv
dn3o576u/L/DUI6xiu9E6RiF49uTwHoPZAPT23i0tZM49n/sTundxWGDc+MY/aQ8
Su6iXzkCgYEAzTwAbEFm3PqaltEZ4Ihp4cUhuItpgiBSfM0sVoUrokYL56bhi5NJ
aljsYbYF5suL2WSRYIy6UYhQuQNUPWkWtBKMnDVvRhRGvN8K3+Y5DZ8wAk8yXSi5
F9fEaUOzKSTqmEGMdP3N+ztOItPc1VKgOwJw/l6fm6oH4tOu6DEI19UCgYEAyf9T
R24jB0hCCwiiSLbh2XU+wtXWsgZS967UmTzytSVco1q7Ohtmo+w14HTRucWnn18K
fLPZLGkEHGONAoJbBmrQszBiRqkT1mjKy1CbxcAgL0Wb0Fgf+octY5YS3hOezLVw
QueXVhELXNihFGL73nvttnx/nbp74+hcgTTpv/sCgYB59M3LhpG5frGeLWNTKbzB
jIMdRrrLuKlLwCA4yanEJBuu7FvatQtLRswwxBl9rDbOWBSLaxTMnlRZnMDSPUBg
gSVNLfORkTr3wRKVOhltHstIlAc5lJlosa7lXnV4XZeKIml0m91rDTLBP2Ra316X
sjuy7EesGL3W7DNjhr/agQKBgGZHgkOI4POvAsHTfViUQYd6dmzxGeTKjvga7ksp
MTvHz0BnkKW7eh1GXYFppUgLbPSliwnZhv2Vrx8wyRWcK7r0GvigZyKgOgs2xHhu
OHHI9oL5HAxCku6nw7PJKYSJKr88n7tAyMAroTVB+033UNE2rwbXw0Z6RoEABtbl
k/ZBAoGAIOd52YM+YD+UYJoXtAbx+cUXOYmBrE25khZ7YiKPgRLAwMnOFI1ca8Dt
aMMhI/0zCXaFxEAlpCCIC8D3lE/KfnRx/32l75+ZCCOQZVsFKVWHMGHU040ezISJ
PBh0zSX2DZa6aAaNxHJUBpPXIeSUUm9DXEsF7bMMjqWJED2+b3s=',
    ),

    // Identity Provider Data that we want connect with our SP
    'idp' => array (
        // Identifier of the IdP entity  (must be a URI)
        'entityId' => 'https://auth.mtgarchitect.com/auth/pacira/idp',
        // SSO endpoint info of the IdP. (Authentication Request protocol)
        'singleSignOnService' => array (
            // URL Target of the IdP where the SP will send the Authentication Request Message
            'url' => '',
            // SAML protocol binding to be used when returning the <Response>
            // message.  Onelogin Toolkit supports for this endpoint the
            // HTTP-POST binding only
            'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
        ),
        // SLO endpoint info of the IdP.
        // 'singleLogoutService' => array (
        //     // URL Location of the IdP where the SP will send the SLO Request
        //     'url' => '',
        //     // SAML protocol binding to be used when returning the <Response>
        //     // message.  Onelogin Toolkit supports for this endpoint the
        //     // HTTP-Redirect binding only
        //     'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
        // ),
        // Public x509 certificate of the IdP
        'x509cert' => '',
        /*
         *  Instead of use the whole x509cert you can use a fingerprint
         *  (openssl x509 -noout -fingerprint -in "idp.crt" to generate it,
         *   or add for example the -sha256 , -sha384 or -sha512 parameter)
         *
         *  If a fingerprint is provided, then the certFingerprintAlgorithm is required in order to
         *  let the toolkit know which Algorithm was used. Possible values: sha1, sha256, sha384 or sha512
         *  'sha1' is the default value.
         */
        // 'certFingerprint' => '',
        // 'certFingerprintAlgorithm' => 'sha1',
    ),
);
    }
 public function Auth($client_identifier)
  {
    //
  }

  public function Sso($client_identifier)
  {
        // //wonky hack
        // if (isset($_SESSION['samlNameId']))
        // {
        //     $nameId = $_SESSION['samlNameId'];


        //     $attendee = $this->findOrCreateAttendee($nameId);

        //     if ($attendee) {
        //         $new_key = SsoAuthKey::where('attendee_id', $attendee->id)->where('auth_id', 'saml_sso')->first();

        //         if (!$new_key)
        //         {
        //             $new_key = new SsoAuthKey;
        //         }
        //         $new_key->attendee_id = $attendee->id;
        //         $new_key->access_token = trim($nameId);
        //         $new_key->refresh_token = "NULL";
        //         $new_key->expires_at = null;
        //         $new_key->auth_id = 'saml_sso';
        //         $new_key->save();



        //         /**
        //          * TEMP LOGIN TOKEN GENERATED HERE
        //          */
        //         $attendee->sso_temp_token = md5($new_key->id);

        //         // update password_updated_at field and set them a new password
        //         if (! $attendee->password_updated_at) {
        //             $this->log->addInfo('Attendee password updated');
        //             $attendee->password = Hash::make(uniqid($attendee->last_name));
        //             $attendee->password_updated_at = Carbon::now()->toDateTimeString();
        //         }

        //         $attendee->save();
        //         $this->log->addInfo('TEMP LOGIN CODE: ' . $attendee->sso_temp_token);
        //         /**
        //          * This forces open the paperless app
        //          */
        //         $app_scheme = \Config::get('app.url_scheme');
        //         unset($_SESSION['samlNameId']);
        //         echo '<html><head><META HTTP-EQUIV="refresh" CONTENT="5; URL='.$app_scheme.'://?'.$attendee->sso_temp_token.'"></head><body>Logging in as Attendee "'.$attendee->first_name.' '.$attendee->last_name.'", redirecting to URL='.$app_scheme.'://?'.$attendee->sso_temp_token.'</html>';
        //         exit;
        //     } else {
        //         echo 'Attendee not found for ID: '.$nameId;
        //     }
        // }else if ( Input::has('SAMLResponse') )
        // {
        //     $settings = $this->settings;
        //     $auth = new OneLogin_Saml2_Auth($settings);

        //     if (isset($_SESSION) && isset($_SESSION['AuthNRequestID'])) {
        //         $requestID = $_SESSION['AuthNRequestID'];
        //     } else {
        //         $requestID = null;
        //     }

        //     $auth->processResponse($requestID);
        //     $errors = $auth->getErrors();

        //     if (!empty($errors)) {
        //         print_r('<p>'.implode(', ', $errors).'</p>');
        //         exit();
        //     }

        //     if (!$auth->isAuthenticated()) {
        //         echo "<p>Not authenticated</p>";
        //         exit();
        //     }

        //     $_SESSION['samlUserdata'] = $auth->getAttributes();
        //     $_SESSION['samlNameId'] = $auth->getNameId();
        //     // if (isset($_POST['RelayState']) && OneLogin_Saml2_Utils::getSelfURL() != $_POST['RelayState']) {
        //     //     $auth->redirectTo($_POST['RelayState']);
        //     // }

        //     $attributes = $_SESSION['samlUserdata'];
        //     $nameId = $_SESSION['samlNameId'];

        //     // echo '<h1>Identified user: '. htmlentities($nameId) .'</h1>';

        //     // if (!empty($attributes)) {
        //         // echo '<h2>'._('User attributes:').'</h2>';
        //         // echo '<table><thead><th>'._('Name').'</th><th>'._('Values').'</th></thead><tbody>';
        //         // foreach ($attributes as $attributeName => $attributeValues) {
        //         //     echo '<tr><td>' . htmlentities($attributeName) . '</td><td><ul>';
        //         //     foreach ($attributeValues as $attributeValue) {
        //         //         echo '<li>' . htmlentities($attributeValue) . '</li>';
        //         //     }
        //         //     echo '</ul></td></tr>';
        //         // }
        //         // echo '</tbody></table>';

        //         $attendee = $this->findOrCreateAttendee($nameId);

        //         if ($attendee) {
        //             $new_key = SsoAuthKey::where('attendee_id', $attendee->id)->where('auth_id', 'saml_sso')->first();

        //             if (!$new_key)
        //             {
        //                 $new_key = new SsoAuthKey;
        //             }
        //             $new_key->attendee_id = $attendee->id;
        //             $new_key->access_token = trim($nameId);
        //             $new_key->refresh_token = "NULL";
        //             $new_key->expires_at = null;
        //             $new_key->auth_id = 'saml_sso';
        //             $new_key->save();



        //             /**
        //              * TEMP LOGIN TOKEN GENERATED HERE
        //              */
        //             $attendee->sso_temp_token = md5($new_key->id);

        //             // update password_updated_at field and set them a new password
        //             if (! $attendee->password_updated_at) {
        //                 $this->log->addInfo('Attendee password updated');
        //                 $attendee->password = Hash::make(uniqid($attendee->last_name));
        //                 $attendee->password_updated_at = Carbon::now()->toDateTimeString();
        //             }

        //             $attendee->save();
        //             $this->log->addInfo('TEMP LOGIN CODE: ' . $attendee->sso_temp_token);
        //             /**
        //              * This forces open the paperless app
        //              */
        //             $app_scheme = \Config::get('app.url_scheme');
        //             unset($_SESSION['samlNameId']);
        //             echo '<html><head><META HTTP-EQUIV="refresh" CONTENT="5; URL='.$app_scheme.'://?'.$attendee->sso_temp_token.'"></head><body>Logging in as Attendee "'.$attendee->first_name.' '.$attendee->last_name.'", redirecting to URL='.$app_scheme.'://?'.$attendee->sso_temp_token.'</html>';
        //             exit;
        //         } else {
        //             echo 'Attendee not found for ID: '.$nameId;
        //         }

        //     }else{


            //
                $settings = $this->settings;
                $auth = new OneLogin_Saml2_Auth($settings);
                try {
                    $auth->login();
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            // }
  }

  public function Acs($client_identifier)
  {
    //Attribute Consumer Service
        $settings = $this->settings;
        $auth = new OneLogin_Saml2_Auth($settings);

        if (isset($_SESSION) && isset($_SESSION['AuthNRequestID'])) {
            $requestID = $_SESSION['AuthNRequestID'];
        } else {
            $requestID = null;
        }

        $auth->processResponse($requestID);
        $errors = $auth->getErrors();

        if (!empty($errors)) {
            print_r('<p>'.implode(', ', $errors).'</p>');
            exit();
        }

        if (!$auth->isAuthenticated()) {
            echo "<p>Not authenticated</p>";
            exit();
        }

        $_SESSION['samlUserdata'] = $auth->getAttributes();
        $_SESSION['samlNameId'] = $auth->getNameId();


        $attributes = $_SESSION['samlUserdata'];
        $nameId = $_SESSION['samlNameId'];


            $attendee = $this->findOrCreateAttendee($nameId);

            if ($attendee) {
                $new_key = SsoAuthKey::where('attendee_id', $attendee->id)->where('auth_id', 'saml_sso')->first();

                if (!$new_key)
                {
                    $new_key = new SsoAuthKey;
                }
                $new_key->attendee_id = $attendee->id;
                $new_key->access_token = trim($nameId);
                $new_key->refresh_token = "NULL";
                $new_key->expires_at = null;
                $new_key->auth_id = 'saml_sso';
                $new_key->save();



                /**
                 * TEMP LOGIN TOKEN GENERATED HERE
                 */
                $attendee->sso_temp_token = md5($new_key->id);

                // update password_updated_at field and set them a new password
                if (! $attendee->password_updated_at) {
                    $this->log->addInfo('Attendee password updated');
                    $attendee->password = Hash::make(uniqid($attendee->last_name));
                    $attendee->password_updated_at = Carbon::now()->toDateTimeString();
                }

                $attendee->save();
                $this->log->addInfo('TEMP LOGIN CODE: ' . $attendee->sso_temp_token);
                /**
                 * This forces open the paperless app
                 */
                $app_scheme = \Config::get('app.url_scheme');
                unset($_SESSION['samlNameId']);
                echo '<html><head><META HTTP-EQUIV="refresh" CONTENT="5; URL='.$app_scheme.'://?'.$attendee->sso_temp_token.'"></head><body>Logging in as Attendee "'.$attendee->first_name.' '.$attendee->last_name.'", redirecting to URL='.$app_scheme.'://?'.$attendee->sso_temp_token.'</html>';
                exit;
            } else {
                echo 'Attendee not found for ID: '.$nameId;
            }

  }
    public function testLogin()
    {
        $attendee = $this->findOrCreateAttendee('0975905');

        if ($attendee) {
            $new_key = SsoAuthKey::where('attendee_id', $attendee->id)->where('auth_id', 'saml_sso')->first();

            if (!$new_key)
            {
                $new_key = new SsoAuthKey;
            }
            $new_key->attendee_id = $attendee->id;
            $new_key->access_token = trim('0975905');
            $new_key->refresh_token = "NULL";
            $new_key->expires_at = null;
            $new_key->auth_id = 'saml_sso';
            $new_key->save();



            /**
             * TEMP LOGIN TOKEN GENERATED HERE
             */
            $attendee->sso_temp_token = md5($new_key->id);

            // update password_updated_at field and set them a new password
            if (! $attendee->password_updated_at) {
                $this->log->addInfo('Attendee password updated');
                $attendee->password = Hash::make(uniqid($attendee->last_name));
                $attendee->password_updated_at = Carbon::now()->toDateTimeString();
            }

            $attendee->save();
            $this->log->addInfo('TEMP LOGIN CODE: ' . $attendee->sso_temp_token);
            /**
             * This forces open the paperless app
             */
            $app_scheme = \Config::get('app.url_scheme');
            echo '<html><head><META HTTP-EQUIV="refresh" CONTENT="5; URL='.$app_scheme.'://?'.$attendee->sso_temp_token.'"></head><body>Logging in as Attendee "'.$attendee->first_name.' '.$attendee->last_name.'", redirecting to URL='.$app_scheme.'://?'.$attendee->sso_temp_token.'</html>';
            exit;
        } else {
            echo 'Attendee not found for ID: '.'0975905';
        }
    }
  public function LogoutRequest($client_identifier)
  {
    //
  }
  public function LogoutResponse($client_identifier)
  {
    //
  }

  public function Metadata($client_identifier)
  {
    //
    // SsoAuthKey::where('attendee_id', $attendee->id)->where('auth_id', 'acadia_saml')->first();
    // $client = SsoSetting::where('client_identifier', $client_identifier)->first();
    $settings = $this->settings;
        try {
            // $auth = new OneLogin_Saml2_Auth();
            $settings = new OneLogin_Saml2_Settings($settings, true);
            $metadata = $settings->getSPMetadata();
            $errors = $settings->validateMetadata($metadata);
            if (empty($errors)) {
                // header('Content-Type: text/xml');
                return Response::make($metadata, '200')->header('Content-Type', 'text/xml');
            } else {
                throw new OneLogin_Saml2_Error(
                    'Invalid SP metadata: '.implode(', ', $errors),
                    OneLogin_Saml2_Error::METADATA_SP_INVALID
                );
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

  }


     /**
     * In the event that attendee cannot be found by PRID ( we don't have it or they aren't in
     * the system)
     * - attempt to find them by concatenating first.last@astrazeneca.com
     * - if that fails, create a temp attendee with ATTENDEENOTFOUND + time() as email
     */
    private function findOrCreateAttendee($response)
    {
        /**
         * PRID is actually NTID is AZ system
         */
        $this->log->addInfo('NAMEID: ' . $response);
        $attendee = Attendee::whereRaw('lower(prid) = :prid', ['prid' => strtolower($response)])->first();

        if ($attendee) {
            $this->log->addInfo('FOUND');
            return $attendee;
        }

        return $attendee;
    }

}


