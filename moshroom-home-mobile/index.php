<?php
/**
 * @author Tongz <root@rooot.me>
 * @datetime 2018/11/29-15:29
 */

/*
 *         ▂▃╬▄▄▃▂▁▁
 *  ●●●█〓███████████▇▇▇▅▅▅▅▅▅▅▅▅▅▅▅▅▇▅▅          BUG
 *  ▄▅██████☆☆☆██████▄▄▃▂
 *  ████████████████████████
 *  ◥⊙▲⊙▲⊙▲⊙▲⊙▲⊙▲⊙▲⊙▲⊙▲⊙▲⊙◤
 */

$domain = array_reverse(explode('.', $_SERVER['HTTP_HOST']));
$domain_name = $domain[1]. '.'. $domain[0];

if(!isMobile()) {
    Header("HTTP/1.1 301 Moved Permanently");
    Header("Location: https://$domain_name");
} else {
    echo file_get_contents('./home_page.html');
}


function isMobile(){
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE'])){
        return TRUE;
    }

    // 判断手机发送的客户端标志
    if (isset ($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array ('mobile','nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap'
        );
        // 从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))){
            return TRUE;
        }
    }
    if (isset ($_SERVER['HTTP_ACCEPT'])){ // 协议法，因为有可能不准确，放到最后判断
        // 如果只支持wml并且不支持html那一定是移动设备
        // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== FALSE) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === FALSE || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))){
            return TRUE;
        }
    }
    return FALSE;
}