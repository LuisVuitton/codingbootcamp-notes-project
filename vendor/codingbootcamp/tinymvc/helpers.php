<?php


//alias for \codingbootcamp\tinymvc\request::get - it will do the same thing, but accesible from everywhere

function request ($name, $default = null)
{
    return \codingbootcamp\tinymvc\request::get($name, $default);
}



//alias for \polakjan\tinymvc\config::get

function config ($key, $default = null)
{

    return \polakjan\tinymvc\config::get($key, $default);

}