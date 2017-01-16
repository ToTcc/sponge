<?php

namespace App\Presenters;

/**
* Menu View Presenters
*/
class ProjectPresenter extends CommonPresenter
{
    /**
     * render project jstree
     *
     * @param $form
     *
     * @return string
     */
    public function renderProjectTreeForm($form)
    {
        $tree = '<div id="jstree"><ul>';
        foreach ($form as $key => $value) {
            $tree .= '<li id="' .$value["project_id"] .'-P' .'" data-jstree=\'' .'{"type":"project"}\'>' .$value["project_name"];
//            $tree .= '<li data-jstree=\'' .'{"type":"project"}\'>' .'<span name="project" id="'.$value["project_id"] .'">' .$value["project_name"] .'</span>';
            if(isset($value['children'])) {
                $module = $value['children'];
                $tree .= '<ul>';
                foreach ($module as $moduleKey => $moduleValue) {
                    $tree .= '<li id="' .$moduleValue["module_id"] .'-M' .'" data-jstree=\'' .'{"type":"module"}\'>' .$moduleValue["module_name"];
//                    $tree .= '<li data-jstree=\'' .'{"type":"module"}\'>' .'<span name="module" id="' .$moduleValue["module_id"] .'">' .$moduleValue["module_name"] .'</span>';
                    if(isset($value['children'])) {
                        $interface = $moduleValue['children'];
                        $tree .='<ul>';
                        foreach ($interface as $interfaceKey => $interfaceValue) {
                            $tree .= '<li id="' .$interfaceValue["interface_id"] .'-I' .'" data-jstree=\'' .'{"type":"interface"}\'>' .$interfaceValue["interface_name"] .'</li>';
//                            $tree .= '<li data-jstree=\'' .'{"type":"interface"}\'>' .'<span name="interface">' .$interfaceValue["interface_name"] .'</span>' .'</li>';
                        }
                        $tree .='</ul>';
                    }
                    $tree .= '</li>';
                }
                $tree .= '</ul>';
            }
            $tree .= '</li>';
        }
        $tree .= '</ul></div>';

        return $tree;

    }

}
