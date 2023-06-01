<?php
namespace Tualo\Office\Whiteboard\Routes;

use Tualo\Office\Basic\TualoApplication as App;
use Tualo\Office\Basic\Route as BasicRoute;
use Tualo\Office\Basic\IRoute;

class JsLoader implements IRoute{
    public static function register(){
        BasicRoute::add('/whiteboard/loader.js',function($matches){
            App::contenttype('application/javascript');
            $list = [
                "js/controller/Portal.js",
                "js/model/Portal.js",
                "js/controller/Main.js",
                "js/model/Main.js",
                "js/view/Portal.js",
                "js/view/main/Main.js",
                "js/Viewport.js",
                "js/Routes.js"
            ];
            $content = '';
            foreach( $list as $item ){
                $content .= file_get_contents( dirname(__DIR__,1).'/'.$item ).PHP_EOL.PHP_EOL;
            }
            App::body( $content );
            
        },array('get'),false);

    }
}