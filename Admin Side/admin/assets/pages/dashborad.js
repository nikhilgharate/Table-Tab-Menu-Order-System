!function(e){"use strict";var a=function(){};a.prototype.createAreaChart=function(e,a,r,i,t,o,b,y){Morris.Area({element:e,pointSize:3,lineWidth:1,data:i,xkey:t,ykeys:o,labels:b,resize:!0,gridLineColor:"#eef0f2",hideHover:"auto",lineColors:y})},a.prototype.createBarChart=function(e,a,r,i,t,o){Morris.Bar({element:e,data:a,xkey:r,ykeys:i,labels:t,gridLineColor:"#eef0f2",barSizeRatio:.4,resize:!0,hideHover:"auto",barColors:o})},a.prototype.init=function(){var e=[{y:"2009",a:10,b:20},{y:"2010",a:75,b:65},{y:"2011",a:50,b:40},{y:"2012",a:75,b:65},{y:"2013",a:50,b:40},{y:"2014",a:75,b:65},{y:"2015",a:90,b:60},{y:"2016",a:90,b:75}];this.createAreaChart("morris-area-example",0,0,e,"y",["a","b"],["Series A","Series B"],["#3292e0","#bdbdbd"]);var a=[{y:"2009",a:100,b:90},{y:"2010",a:75,b:65},{y:"2011",a:50,b:40},{y:"2012",a:75,b:65},{y:"2013",a:50,b:40},{y:"2014",a:75,b:65},{y:"2015",a:100,b:90},{y:"2016",a:90,b:75}];this.createBarChart("morris-bar-example",a,"y",["a","b"],["Series A","Series B"],["#3292e0","#dedede"])},e.Dashboard=new a,e.Dashboard.Constructor=a}(window.jQuery),function(e){"use strict";e.Dashboard.init()}(window.jQuery);