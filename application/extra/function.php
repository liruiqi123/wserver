<?php
    /**
    * 公共方法
    */
        public  function ajaxReturn($data,$type='',$json_option=0) {
                //if(empty($type)) $type  =   C('DEFAULT_AJAX_RETURN');
                if(empty($type)) $type  =   "JSON";
                switch (strtoupper($type)){
                    case 'JSON' :
                        // 返回JSON数据格式到客户端 包含状态信息
                        header('Content-Type:application/json; charset=utf-8');
                        exit(json_encode($data,$json_option));
                    case 'XML'  :
                        // 返回xml格式数据
                        header('Content-Type:text/xml; charset=utf-8');
                        exit(xml_encode($data));
                    case 'JSONP':
                        // 返回JSON数据格式到客户端 包含状态信息
                        header('Content-Type:application/json; charset=utf-8');
                        $handler  =   isset($_GET[C('VAR_JSONP_HANDLER')]) ? $_GET[C('VAR_JSONP_HANDLER')] : C('DEFAULT_JSONP_HANDLER');
                        exit($handler.'('.json_encode($data,$json_option).');');
                    case 'EVAL' :
                        // 返回可执行的js脚本
                        header('Content-Type:text/html; charset=utf-8');
                        exit($data);
                    default     :
                        // 用于扩展其他返回格式数据
                        Hook::listen('ajax_return',$data);
                }
            }

?>