jQuery(document).ready(function($) {    

var to_be_canvas_width = $("#to_be_canvas").width();
var to_be_canvas_height = $("#to_be_canvas").height();
var scr_width = $(window).width();
var scr_height = $(window).height();
var mycanvas = $("#myCanvas");

mycanvas.height(to_be_canvas_height);
mycanvas.width(to_be_canvas_width);
      
var no1 = $("#no1");

var no1_pos = no1.position();

var c=document.getElementById("myCanvas");

var ctx=c.getContext("2d");

lft = (to_be_canvas_width / 7.5);
tp = (to_be_canvas_height / 7.5);

alert(to_be_canvas_width + ' ' + no1_pos.left);

ctx.beginPath();
ctx.moveTo((to_be_canvas_width - no1_pos.left), 0);
ctx.bezierCurveTo(20, 100, 200,100,0,80);
ctx.lineWidth = 9;
ctx.strokeStyle = '#02AED6';
ctx.stroke();

});