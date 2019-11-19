/*global $ , console , alert , document, window */
$(function () {
    'use strict';
    jQuery(".cover h1").fitText(1.5);
    jQuery(".wakeel_table .sec .icon a i").fitText(0.1, {minFontSize: '20px',maxFontSize: '20px'});
    jQuery(".wakeel_table .sec .desc h4").fitText(2.5, { minFontSize: '16px'});
    $('[data-toggle="popover"]').popover();
});
