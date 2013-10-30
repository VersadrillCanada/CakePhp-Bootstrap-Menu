<?php
App::uses('Controller', 'Controller');
App::uses('View', 'View');
App::uses('MenuHelper', 'Plugin/BootstrapMenu/View/Helper');
class MenuHelperTest extends CakeTestCase {
    public $Menu = null;
    public function setUp() {
        parent::setUp();
        $Controller = new Controller();
        $View = new View($Controller);
        $this->Menu = new MenuHelper($View);

    }

    public function tearDown() {
        parent::tearDown();
    }
 /*
 *                  Section Brand
 */

    public function testCreatBrandWithOutLink() {
        $menus = array(
            'brand'=>array('link'=>'')
        );
        extract($menus['brand']);
        $result = $this->Menu->_buildBrand($menus["brand"]);
        $expected  = "<a href='$link' class='navbar-brand '></a>";
        $this->assertEqual($result, $expected);
    }
    public function testCreatBrandWithLink() {
        $menus = array(
            'brand'=>array('link'=>'index.php')
        );
        extract($menus['brand']);
        $result = $this->Menu->_buildBrand($menus["brand"]);
        $expected  = "<a href='$link' class='navbar-brand '></a>";
        $this->assertEqual($result, $expected);
    }
    public function testCreatBrandWithOutClass() {
        $menus = array(
            'brand'=>array('class'=>'')
        );
        extract($menus['brand']);
        $result = $this->Menu->_buildBrand($menus["brand"]);
        $expected  = "<a href='#' class='navbar-brand $class'></a>";
        $this->assertEqual($result, $expected);
    }
    public function testCreatBrandWithClass() {
        $menus = array(
            'brand'=>array('class'=>'btn')
        );
        extract($menus['brand']);
        $result = $this->Menu->_buildBrand($menus["brand"]);
        $expected  = "<a href='#' class='navbar-brand $class'></a>";
        $this->assertEqual($result, $expected);
    }
    public function testCreatBrandWithOutLabel() {
        $menus = array(
            'brand'=>array('label'=>'')
        );
        extract($menus['brand']);
        $result = $this->Menu->_buildBrand($menus["brand"]);
        $expected  = "<a href='#' class='navbar-brand '>$label</a>";
        $this->assertEqual($result, $expected);
    }
    public function testCreatBrandWithLabel() {
        $menus = array(
            'brand'=>array('label'=>'lien')
        );
        extract($menus['brand']);
        $result = $this->Menu->_buildBrand($menus["brand"]);
        $expected  = "<a href='#' class='navbar-brand '>$label</a>";
        $this->assertEqual($result, $expected);
    }
    public function testCreatBrandWithOutParameter() {
        $menus = array(
            'brand'=>array()
        );
        $result = $this->Menu->_buildBrand($menus["brand"]);
        $expected  = "<a href='#' class='navbar-brand '></a>";
        $this->assertEqual($result, $expected);
    }
    public function testCreatBrandWithAllParameter() {
        $menus = array(
            'brand'=>array('link'=>'index.php','class'=>'btn','label'=>'lien')
        );
        extract($menus['brand']);
        $result = $this->Menu->_buildBrand($menus["brand"]);
        $expected  = "<a href='$link' class='navbar-brand $class'>$label</a>";
        $this->assertEqual($result, $expected);
    }

 /*
 *                  Section Brand
 */
}