/**
 * 2019-2023 Team Ever
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 *  @author    Team Ever <https://www.team-ever.com/>
 *  @copyright 2019-2023 Team Ever
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

$(document).ready(function() {
    var cssTextarea = document.getElementById("EVERPSCSS");
    var cssEditor = CodeMirror.fromTextArea(cssTextarea, {
      mode: "text/css",
      theme: "dracula",
      lineNumbers: true
    });
    var jsTextarea = document.getElementById("EVERPSJS");
    var jsEditor = CodeMirror.fromTextArea(jsTextarea, {
      mode: "text/javascript",
      theme: "dracula",
      lineNumbers: true
    });
});
$(function () {
    var myTextarea = document.getElementById("EVERPSCSS");
    var editor = CodeMirror.fromTextArea(myTextarea, {
        mode: "javascript",
        theme: "dracula",
        lineNumbers: true
    });
});