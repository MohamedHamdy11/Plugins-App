<?php



//actions ( point = hook )
$actions = [];

/**
 * add new action
 * @param $hook
 * @param $funcName
 */
function add_actions($hook,$funcName)
{
    global $actions;
    $actions[$hook][] = $funcName;
}

/**
 * execute action related to point
 * @param $hook
 */
function do_actions($hook)
{
    global $actions;
    if(isset($actions[$hook]))
    {
        foreach($actions[$hook] as $funcName)
        {
            if(function_exists($funcName))
                call_user_func($funcName);
        }
    }
}


//filters
$filters = [];

/**
 * add new filter
 * @param $hook
 * @param $funcName
 */
function add_filter($hook,$funcName)
{
    global $filters;
    $filters[$hook][] = $funcName;
}

/**
 * add filter
 * @param $hook
 * @param $content
 * @return mixed
 */
function do_filter($hook,$content)
{
    global $filters;
    if(isset($filters[$hook]))
    {
        foreach($filters[$hook] as $funcName)
        {
            if(function_exists($funcName))
                $content = call_user_func($funcName,$content);

        }
    }

    return $content;
}



//include all files plugins

foreach(glob('plugins/*.php') as $file)
{
    require($file);
}








