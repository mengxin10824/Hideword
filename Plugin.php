<?php
/**
 * 你知道的太多了~
 *
 * @package Hideword
 * @author xiaobai0
 * @version 1.0
 * @link https://rbq.lu
 */

class Hideword_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     *
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Archive')->header = array('Hideword_Plugin', 'header');
        Typecho_Plugin::factory('Widget_Archive')->footer = array('Hideword_Plugin', 'footer');
        return "插件启动成功";
    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate()
    {
        return "插件禁用成功";
    }

    /**
     * 获取插件配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
        $jquery = new Typecho_Widget_Helper_Form_Element_Checkbox('jquery', array('jquery' => '禁止加载jQuery'), false, _t('Jquery设置'), _t('插件需要jQuery，如果已经引用JQuery，则勾选。'));
        $form->addInput($jquery);
    }


    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form)
    {

    }


    /**
     * 页头输出相关代码
     *
     * @access public
     * @param unknown header
     * @return unknown
     */
    public static function header()
    {
        $path = Helper::options()->pluginUrl . '/Hideword/';
        $options = Helper::options()->plugin('Hideword');
        echo '<link rel="stylesheet" type="text/css" href="' . $path . 'css/hideword.css" />';
    }


    /**
     * 页脚输出相关代码
     *
     * @access public
     * @param unknown footer
     * @return unknown
     */
    public static function footer()
    {
        $path = Helper::options()->pluginUrl . '/Hideword/';
        $options = Helper::options()->plugin('Hideword');
        if (!$options->jquery) {
            echo '<script type="text/javascript" src="' . $path . 'js/jquery.min.js"></script>';
        }
        echo '<script type="text/javascript" src="' . $path . 'js/hideword.js"></script>';
    }
}




