<?php

namespace Tualo\Office\Whiteboard\Middlewares;
use Tualo\Office\Basic\TualoApplication as App;
use Tualo\Office\Basic\IMiddleware;

class Middleware implements IMiddleware{
    public static function register(){
        App::use('whiteboard',function(){
            try{
                App::javascript('whiteboard_loader', './whiteboard/loader.js',[],1000);
            }catch(\Exception $e){
                App::set('maintanceMode','on');
                App::addError($e->getMessage());
            }
        },-100);
    }
}