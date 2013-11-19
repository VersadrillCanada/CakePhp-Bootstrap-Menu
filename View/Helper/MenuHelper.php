<?php
/**
 * Bootstrap Menu Helper
 *
 * This helper will build Dynamic Menu
 * Maxime Macameau <macameaum@versadrillcanada.com>
 * @package BootstrapMenu
 * @subpackage BootstrapMenu.views.helpers
 */
App::uses('AppHelper', 'View/Helper');
class MenuHelper extends AppHelper {
    /** Helper dependencies
     *
     * @var array
     * @access public
     */
        public $helpers = array('Html');

    /**
     * Array of global menu
     *
     * @var array
     * @access protected
     */
        protected $_menu = array();

    /**
     * Constructor.
     *
     * @access public
     */
        public function __construct(View $View) {
            parent::__construct($View);
    }

    /**
     * Returns the whole menu HTML.
     *
     * @param string optional Array key.
     * @param array optional Aditional Options.
     * @param array optional Data which has the key.
     * @return string HTML menu
     * @access public
     */
        public function build(Array $menus = null) {
            $html='';

            $html.='<nav class="navbar navbar-default" role="navigation">';
            $html.=   $this->_buildHeader($menus["brand"]);
            $html.=   $this->_buildCollapse($menus["nav"]);
            $html.='</nav>';
            return html_entity_decode($html);
        }

    /**
     * Returns the whole menu HTML.
     *
     * @param string optional Array key.
     * @param array optional Aditional Options.
     * @param array optional Data which has the key.
     * @return string HTML menu
     * @access public
     */
        public function _buildHeader(Array $brand) {
            $html='';
            $html.='<div class="navbar-header">';
            $html.='   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">';
            $html.='   <span class="sr-only">Toggle navigation</span>';
            $html.='   <span class="icon-bar"></span>';
            $html.='    <span class="icon-bar"></span>';
            $html.='    <span class="icon-bar"></span>';
            $html.='    </button>';
            $html.=    $this->_buildBrand($brand);
            $html.='</div>';
            return $html;
        }

    /**
     * Returns a menu Brand HTML.
     *
     * @param array Array of brand parameter
     * @return string HTML menu item
     * @access public
     */
        public function _buildBrand($brand) {
            extract($brand);
            if (!isset($link)) {
                $link="#";
            }
            if (!isset($label)) {
                $label="";
            }
            if (!isset($class)) {
                $class="";
            }
            return $this->Html->link($label,$link,array("class"=>'navbar-brand $class'));

        }

    /**
     * Returns a menu Brand HTML.
     *
     * @param array Array of brand parameter
     * @return string HTML menu item
     * @access public
     */
        public function _buildCollapse($data) {
            $html='';
            $side=null;
            $html.='<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">';
            foreach ($data as $value) {;
                if(isset($value["side"])&&!empty($value["side"])){
                    $side=' navbar-'.$value["side"];
                }
                $html.=$this->_buildNav($value["content"],$side);
            }
            $html.='</div>';
            return $html;

        }

    /**
     * Returns a menu Brand HTML.
     *
     * @param array Array of brand parameter
     * @return string HTML menu item
     * @access public
     */
        public function _buildNav($data,$side) {
            $html='';

            $html.="<ul class='nav navbar-nav $side'>";
            foreach ($data as $value) {
                $html.=     $this->_buildLi($value);
            }
            $html.='</ul>';
            return $html;
        }

    /**
     * Returns a menu Brand HTML.
     *
     * @param array Array of brand parameter
     * @return string HTML menu item
     * @access public
     */
        public function _buildLi($data){
            $html='';
            $options=null;
            $active=null;
            extract($data);
            if (!isset($link)) {
                $link="#";
            }
            if (!isset($label)) {
                $label="";
            }
            if (isset($class)) {
               $option["class"] ="";
            }

            if (isset($submenu)) {

                $html.="<li class='dropdown'>";
                $html.=     $this->_buildLink($label,$link,true);
                $html.=     $this->_buildDropDownMenu($submenu);
                $html.='</li>';
            }else{
                $html.="<li $active>";
                $html.=     $this->_buildLink($label,$link);
                $html.='</li>';
            }
            return $html;
        }

    /**
     * Returns a menu Brand HTML.
     *
     * @param array Array of brand parameter
     * @return string HTML menu item
     * @access public
     */
        public function _buildDropDownMenu($data){
           // debug($data);
            $html='';
            $options=null;
            $active=null;
            $html.='<ul class="dropdown-menu">';
            foreach ($data as $value) {
                $html.=     $this->_buildLi($value);
            }
            $html.='</ul>';
            return $html;
        }
    /**
     * Returns a menu Brand HTML.
     *
     * @param array Array of brand parameter
     * @return string HTML menu item
     * @access public
     */
        public function _buildLink($label,$link,$dropdown=false){
            $active=null;
            $options=null;
            $html='';
            if (!isset($link)) {
                $link="#";
            }
            if (!isset($label)) {
                $label="";
            }
            if (isset($class)) {
               $option["class"] ="";
            }
            if($dropdown){
                $options["class"] ="dropdown-toggle";
                $options["data-toggle"] ="dropdown";
                $label.=' <b class="caret"></b>';
            }
           /* if($this->Request->controller == $link){
                $active = "active";
            }*/
            if($link!="#"){
                //$label.=" ".$this->requestAction(array('plugin'=>'BootstrapMenu','controller'=>'permissions','action'=>'check',$link["controller"],$link["action"]));
            }
            $html.=     $this->Html->link($label,$link,$options);
            return $html;
        }
}
 ?>