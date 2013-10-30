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
 * Current user group
 *
 * @var String
 * @access protected
 */
    protected $_group = null;

/**
 * Current depth of menu
 *
 * @var Integer
 * @access protected
 */
    protected $_depth = 0;



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
?>
<div class="navbar navbar-default navbar-static-top">
  <div class="navbar-inner">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#nav-collapse"></button>
        <?php
            if (isset($menus['brand'])){
               echo $this->_buildBrand($menus['brand']);
            }
        ?>
      <div class="nav-collapse collapse" id="nav-collapse">
        <ul class="nav">
         <?php
           /* foreach ($menus as $menu) {

                foreach($menu as $key =>$value){

                    if($key=="label"){
                        $label = $value;
                    }
                    if($key=="link"){
                        $link = $value;
                    }
                    if(!isset($link)){
                        $link = array();
                    }
                    if($key=="submenu"){
                        $submenu = $value;
                    }
                }
            echo "<li>";
            echo $this->Html->link($label,$link,array('escape'=>false,
                    'class'=>'$class'
                ));

            echo "</li>";
            }*/
           ?>
        </ul>
      </div>
  </div>
</div>
 <?php   }

/**
 * Returns a menu item HTML.
 *
 * @param array Array of menu item
 * @param int optional Position of the item.
 * @return string HTML menu item
 * @access protected
 */
    protected function _buildItem(&$item, $pos = -1, &$isActive = false) {

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
        return"<a href='$link' class='navbar-brand $class'>$label</a>";
    }

 /**
 * Returns a menu Brand HTML.
 *
 * @param array Array of brand parameter
 * @return string HTML menu item
 * @access protected
 */
    protected function _buildMenu() {
        return"<a href='$link' class='navbar-brand $class'>$label</a>";
    }

}