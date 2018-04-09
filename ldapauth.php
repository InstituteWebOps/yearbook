<?php
session_start();
$output = array("status" => "", "details" => "");

// $_POST = array("username"=>"newton", "password"=>"password");
// $_POST = array("username"=>"ae15b001", "password"=>"MEHyJusY");

if(!isset($_POST['username']))
{
    $output['status'] = "fail";
    $output['details'] = "No parameters passed";
} else {

    // $server = "ldap.forumsys.com";
    $server = "ldap.iitm.ac.in";
    $ldapport = 389;

    // using ldap bind
    // $ldaprdn  = 'cn=read-only-admin,dc=example,dc=com';     // ldap rdn or dn    
    // $ldappass = 'password';  // associated server password
    $ldaprdn  = 'cn=students,ou=bind,dc=ldap,dc=iitm,dc=ac,dc=in';     // ldap rdn or dn
    $ldappass = 'rE11Bg_oO~iC';  // associated server password

    // connect to ldap server
    $ldapconn= @ldap_connect($server, $ldapport);

    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

    if (!$ldapconn) {
        $output['status'] = "fail";
        $output['details'] = "Failed to reach the server";
    } else {

        // binding to ldap server
        $ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);

        // verify binding
        if ($ldapbind) {

            // $filter = "(uid=".$_POST['username'].")";
            $filter = "(&(objectclass=*)(uid=".$_POST['username']."))";
            $result = ldap_search($ldapconn, "dc=ldap,dc=iitm,dc=ac,dc=in", $filter);
            if(!$result)
            {
                $output['status'] = "fail";
                $output['details'] = "Failed to reach the server";
            } else {
                $entries = @ldap_get_entries($ldapconn, $result);
                foreach($entries as $val)
                {
                    $logindn =  $val['dn'];
                }
                if(@ldap_bind($ldapconn, $logindn, $_POST['password']))
                {
                    $output['status'] = "success";
                    $output['details'] = "User authenticated";
                    $_SESSION['rollno'] = $_POST['username'];
                } else {
                    $output['status'] = "fail";
                    $output['details'] = "Could not authenticate user";
                }
            }
        } else {
            $output['status'] = "fail";
            $output['details'] = "Failed to connect to the server";
        }
    }
}
echo json_encode($output);

?>