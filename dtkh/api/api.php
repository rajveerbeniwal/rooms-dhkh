<?php

ob_start();
include('../configuration.php');
include('../library/nusoap/nusoap.php');


// Create the server instance
$server = new nusoap_server();
// Initialize WSDL support
$server->configureWSDL('Get latest news ', 'http://tienkiem.net'); // don gian chi la chuc nag mo ta
//add a custom data type
$server->wsdl->addComplexType(
        'Content',
        'complexType',
        'struct',
        'all',
        '',
        array(
            'id' => array(
                'name' => 'id',
                'type' => 'xsd:string',
            ),
			'alias' => array(
                'name' => 'alias',
                'type' => 'xsd:string',
            ),
            'title' => array(
                'name' => 'title',
                'type' => 'xsd:string',
            ),
            'created' => array(
                'name' => 'created',
                'type' => 'xsd:string',
            ),
            'ccalias' => array(
                'name' => 'ccalias',
                'type' => 'xsd:string',
            ),
        )
);

$server->wsdl->addComplexType(
        'ContentArray',
        'complexType',
        'array',
        '',
        'SOAP-ENC:Array',
        array(),
        array(
            array('ref' => 'SOAP-ENC:arrayType', 'wsdl:arrayType' => 'tns:Content[]')
        ),
        'tns:Content'
);


// GET LATEST NEWS
$server->register('getLatestNews',
        array("catID" => "xsd:string", "limit" => "xsd:string", "ws_username" => "xsd:string", "ws_password" => "xsd:string"),
        array("result" => "tns:ContentArray"),
        'uri:http://tienkiem.net',
        'uri:http://127.0.0.1/tienkiem.net/api/api.php/getLatestNews',
        'rpc',
        'encode'
);

// FUNCTION CONFIG DB,HOST,USERNAME,PASSWORD...
function jv_config($host, $username, $password, $db) {
    require_once("../configuration.php");
    $jconfig = new JConfig();

    return array(
        "localhost" => $jconfig->host,
        "user" => $jconfig->user,
        "password" => $jconfig->password,
        "db" => $jconfig->db
    );
}

// Insert,Update ....into database .... by sms gateway
function getLatestNews($catID, $limit, $ws_username, $ws_password) {
    try {
        if ($ws_username == 'xgo_api' && $ws_password == 'l4phskvtplklcfp172aavoegc3') {
            require_once("../configuration.php");
            $jconfig = new JConfig();

            $localhost = $jconfig->host;
            $user = $jconfig->user;
            $password = $jconfig->password;
            $db = $jconfig->db;
            // DATA DEFAULT
            // CONNECT DB
            $link = mysql_connect($localhost, $user, $password);
            mysql_select_db($db);
            mysql_query('SET NAMES utf8 ');
            // get id of username
            $query = 'SELECT a.id,a.alias, a.title, DATE_FORMAT(a.created, "%d/%m") AS created,cc.alias as ccalias '.
                    ' FROM tb_content AS a' .
                    ' LEFT JOIN tb_content_frontpage AS f ON f.content_id = a.id' .
                    ' LEFT JOIN tb_categories AS cc ON cc.id = a.catid' .
                    ' WHERE a.catid in ' . $catID .
                    ' AND a.state = 1' .
                    ' order by a.created desc, a.id desc '.
                    ' limit ' . $limit;

            $contents = array();
            $result = mysql_query($query);
            if ($result) {
                while ($row = mysql_fetch_array($result)) {
                    $content['id'] = $row['id'];
					$content['alias'] = $row['alias'];
                    $content['title'] = $row['title'];
                    $content['created'] = $row['created'];
                    $content['ccalias'] = $row['ccalias'];
                    $contents[] = $content;
                }
                return $contents;
            }
            return null;
        }
        return null;
    } catch (Exception $e) {
        return null;
    }
}

function objectToArray($object) {
    if (!is_object($object) && !is_array($object)) {
        return $object;
    }
    if (is_object($object)) {
        $object = get_object_publics($object);
    }
    return array_map('objectToArray', $object);
}

// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>