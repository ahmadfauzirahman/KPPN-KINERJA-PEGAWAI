/*
 Highcharts JS v6.1.2 (2018-08-31)
 Exporting module

 (c) 2010-2017 Torstein Honsi

 License: www.highcharts.com/license
*/
(function(h){"object"===typeof module&&module.exports?module.exports=h:"function"===typeof define&&define.amd?define(function(){return h}):h(Highcharts)})(function(h){(function(f){var h=f.defaultOptions,r=f.doc,x=f.Chart,q=f.addEvent,J=f.removeEvent,D=f.fireEvent,u=f.createElement,E=f.discardElement,F=f.css,y=f.merge,B=f.pick,v=f.each,G=f.objectEach,A=f.extend,z=f.win,I=z.navigator.userAgent,H=f.SVGRenderer,K=f.Renderer.prototype.symbols,L=/Edge\/|Trident\/|MSIE /.test(I),M=/firefox/i.test(I);A(h.lang,
    {printChart:"Print chart",downloadPNG:"Download PNG image",downloadJPEG:"Download JPEG image",downloadPDF:"Download PDF document",downloadSVG:"Download SVG vector image",contextButtonTitle:"Chart context menu"});h.navigation={buttonOptions:{theme:{},symbolSize:14,symbolX:12.5,symbolY:10.5,align:"right",buttonSpacing:3,height:22,verticalAlign:"top",width:24}};h.exporting={type:"image/png",url:"https://export.highcharts.com/",printMaxWidth:780,scale:2,buttons:{contextButton:{className:"highcharts-contextbutton",
            menuClassName:"highcharts-contextmenu",symbol:"menu",_titleKey:"contextButtonTitle",menuItems:"printChart separator downloadPNG downloadJPEG downloadPDF downloadSVG".split(" ")}},menuItemDefinitions:{printChart:{textKey:"printChart",onclick:function(){this.print()}},separator:{separator:!0},downloadPNG:{textKey:"downloadPNG",onclick:function(){this.exportChart()}},downloadJPEG:{textKey:"downloadJPEG",onclick:function(){this.exportChart({type:"image/jpeg"})}},downloadPDF:{textKey:"downloadPDF",onclick:function(){this.exportChart({type:"application/pdf"})}},
        downloadSVG:{textKey:"downloadSVG",onclick:function(){this.exportChart({type:"image/svg+xml"})}}}};f.post=function(a,b,c){var d=u("form",y({method:"post",action:a,enctype:"multipart/form-data"},c),{display:"none"},r.body);G(b,function(a,b){u("input",{type:"hidden",name:b,value:a},null,d)});d.submit();E(d)};A(x.prototype,{sanitizeSVG:function(a,b){if(b&&b.exporting&&b.exporting.allowHTML){var c=a.match(/<\/svg>(.*?$)/);c&&c[1]&&(c='\x3cforeignObject x\x3d"0" y\x3d"0" width\x3d"'+b.chart.width+'" height\x3d"'+
        b.chart.height+'"\x3e\x3cbody xmlns\x3d"http://www.w3.org/1999/xhtml"\x3e'+c[1]+"\x3c/body\x3e\x3c/foreignObject\x3e",a=a.replace("\x3c/svg\x3e",c+"\x3c/svg\x3e"))}return a=a.replace(/zIndex="[^"]+"/g,"").replace(/isShadow="[^"]+"/g,"").replace(/symbolName="[^"]+"/g,"").replace(/jQuery[0-9]+="[^"]+"/g,"").replace(/url\(("|&quot;)(\S+)("|&quot;)\)/g,"url($2)").replace(/url\([^#]+#/g,"url(#").replace(/<svg /,'\x3csvg xmlns:xlink\x3d"http://www.w3.org/1999/xlink" ').replace(/ (|NS[0-9]+\:)href=/g," xlink:href\x3d").replace(/\n/,
        " ").replace(/<\/svg>.*?$/,"\x3c/svg\x3e").replace(/(fill|stroke)="rgba\(([ 0-9]+,[ 0-9]+,[ 0-9]+),([ 0-9\.]+)\)"/g,'$1\x3d"rgb($2)" $1-opacity\x3d"$3"').replace(/&nbsp;/g,"\u00a0").replace(/&shy;/g,"\u00ad")},getChartHTML:function(){this.inlineStyles();return this.container.innerHTML},getSVG:function(a){var b,c,d,w,k,g=y(this.options,a);c=u("div",null,{position:"absolute",top:"-9999em",width:this.chartWidth+"px",height:this.chartHeight+"px"},r.body);d=this.renderTo.style.width;k=this.renderTo.style.height;
        d=g.exporting.sourceWidth||g.chart.width||/px$/.test(d)&&parseInt(d,10)||600;k=g.exporting.sourceHeight||g.chart.height||/px$/.test(k)&&parseInt(k,10)||400;A(g.chart,{animation:!1,renderTo:c,forExport:!0,renderer:"SVGRenderer",width:d,height:k});g.exporting.enabled=!1;delete g.data;g.series=[];v(this.series,function(a){w=y(a.userOptions,{animation:!1,enableMouseTracking:!1,showCheckbox:!1,visible:a.visible});w.isInternal||g.series.push(w)});v(this.axes,function(a){a.userOptions.internalKey||(a.userOptions.internalKey=
            f.uniqueKey())});b=new f.Chart(g,this.callback);a&&v(["xAxis","yAxis","series"],function(d){var c={};a[d]&&(c[d]=a[d],b.update(c))});v(this.axes,function(a){var d=f.find(b.axes,function(b){return b.options.internalKey===a.userOptions.internalKey}),c=a.getExtremes(),e=c.userMin,c=c.userMax;d&&(void 0!==e&&e!==d.min||void 0!==c&&c!==d.max)&&d.setExtremes(e,c,!0,!1)});d=b.getChartHTML();D(this,"getSVG",{chartCopy:b});d=this.sanitizeSVG(d,g);g=null;b.destroy();E(c);return d},getSVGForExport:function(a,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 b){var c=this.options.exporting;return this.getSVG(y({chart:{borderRadius:0}},c.chartOptions,b,{exporting:{sourceWidth:a&&a.sourceWidth||c.sourceWidth,sourceHeight:a&&a.sourceHeight||c.sourceHeight}}))},exportChart:function(a,b){b=this.getSVGForExport(a,b);a=y(this.options.exporting,a);f.post(a.url,{filename:a.filename||"chart",type:a.type,width:a.width||0,scale:a.scale,svg:b},a.formAttributes)},print:function(){var a=this,b=a.container,c=[],d=b.parentNode,f=r.body,k=f.childNodes,g=a.options.exporting.printMaxWidth,
        e,l;if(!a.isPrinting){a.isPrinting=!0;a.pointer.reset(null,0);D(a,"beforePrint");if(l=g&&a.chartWidth>g)e=[a.options.chart.width,void 0,!1],a.setSize(g,void 0,!1);v(k,function(a,b){1===a.nodeType&&(c[b]=a.style.display,a.style.display="none")});f.appendChild(b);setTimeout(function(){z.focus();z.print();setTimeout(function(){d.appendChild(b);v(k,function(a,b){1===a.nodeType&&(a.style.display=c[b])});a.isPrinting=!1;l&&a.setSize.apply(a,e);D(a,"afterPrint")},1E3)},1)}},contextMenu:function(a,b,c,d,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     w,k,g){var e=this,l=e.chartWidth,p=e.chartHeight,t="cache-"+a,m=e[t],n=Math.max(w,k),C,h;m||(e[t]=m=u("div",{className:a},{position:"absolute",zIndex:1E3,padding:n+"px",pointerEvents:"auto"},e.fixedDiv||e.container),C=u("div",{className:"highcharts-menu"},null,m),h=function(){F(m,{display:"none"});g&&g.setState(0);e.openMenu=!1},e.exportEvents.push(q(m,"mouseleave",function(){m.hideTimer=setTimeout(h,500)}),q(m,"mouseenter",function(){f.clearTimeout(m.hideTimer)}),q(r,"mouseup",function(b){e.pointer.inClass(b.target,
        a)||h()}),q(m,"click",function(){e.openMenu&&h()})),v(b,function(a){"string"===typeof a&&(a=e.options.exporting.menuItemDefinitions[a]);if(f.isObject(a,!0)){var b;b=a.separator?u("hr",null,null,C):u("div",{className:"highcharts-menu-item",onclick:function(b){b&&b.stopPropagation();h();a.onclick&&a.onclick.apply(e,arguments)},innerHTML:a.text||e.options.lang[a.textKey]},null,C);e.exportDivElements.push(b)}}),e.exportDivElements.push(C,m),e.exportMenuWidth=m.offsetWidth,e.exportMenuHeight=m.offsetHeight);
        b={display:"block"};c+e.exportMenuWidth>l?b.right=l-c-w-n+"px":b.left=c-n+"px";d+k+e.exportMenuHeight>p&&"top"!==g.alignOptions.verticalAlign?b.bottom=p-d-n+"px":b.top=d+k-n+"px";F(m,b);e.openMenu=!0},addButton:function(a){var b=this,c=b.renderer,d=y(b.options.navigation.buttonOptions,a),f=d.onclick,k=d.menuItems,g,e,l=d.symbolSize||12;b.btnCount||(b.btnCount=0);b.exportDivElements||(b.exportDivElements=[],b.exportSVGElements=[]);if(!1!==d.enabled){var p=d.theme,t=p.states,m=t&&t.hover,t=t&&t.select,
        n;delete p.states;f?n=function(a){a.stopPropagation();f.call(b,a)}:k&&(n=function(){b.contextMenu(e.menuClassName,k,e.translateX,e.translateY,e.width,e.height,e);e.setState(2)});d.text&&d.symbol?p.paddingLeft=B(p.paddingLeft,25):d.text||A(p,{width:d.width,height:d.height,padding:0});e=c.button(d.text,0,0,n,p,m,t).addClass(a.className).attr({title:B(b.options.lang[d._titleKey],"")});e.menuClassName=a.menuClassName||"highcharts-menu-"+b.btnCount++;d.symbol&&(g=c.symbol(d.symbol,d.symbolX-l/2,d.symbolY-
        l/2,l,l,{width:l,height:l}).addClass("highcharts-button-symbol").attr({zIndex:1}).add(e));e.add(b.exportingGroup).align(A(d,{width:e.width,x:B(d.x,b.buttonOffset)}),!0,"spacingBox");b.buttonOffset+=(e.width+d.buttonSpacing)*("right"===d.align?-1:1);b.exportSVGElements.push(e,g)}},destroyExport:function(a){var b=a?a.target:this;a=b.exportSVGElements;var c=b.exportDivElements,d=b.exportEvents,h;a&&(v(a,function(a,d){a&&(a.onclick=a.ontouchstart=null,h="cache-"+a.menuClassName,b[h]&&delete b[h],b.exportSVGElements[d]=
        a.destroy())}),a.length=0);b.exportingGroup&&(b.exportingGroup.destroy(),delete b.exportingGroup);c&&(v(c,function(a,d){f.clearTimeout(a.hideTimer);J(a,"mouseleave");b.exportDivElements[d]=a.onmouseout=a.onmouseover=a.ontouchstart=a.onclick=null;E(a)}),c.length=0);d&&(v(d,function(a){a()}),d.length=0)}});H.prototype.inlineToAttributes="fill stroke strokeLinecap strokeLinejoin strokeWidth textAnchor x y".split(" ");H.prototype.inlineBlacklist=[/-/,/^(clipPath|cssText|d|height|width)$/,/^font$/,/[lL]ogical(Width|Height)$/,
    /perspective/,/TapHighlightColor/,/^transition/,/^length$/];H.prototype.unstyledElements=["clipPath","defs","desc"];x.prototype.inlineStyles=function(){function a(a){return a.replace(/([A-Z])/g,function(a,b){return"-"+b.toLowerCase()})}function b(c){function m(b,g){q=u=!1;if(h){for(r=h.length;r--&&!u;)u=h[r].test(g);q=!u}"transform"===g&&"none"===b&&(q=!0);for(r=f.length;r--&&!q;)q=f[r].test(g)||"function"===typeof b;q||k[g]===b&&"svg"!==c.nodeName||e[c.nodeName][g]===b||(-1!==d.indexOf(g)?c.setAttribute(a(g),
    b):t+=a(g)+":"+b+";")}var n,k,t="",w,q,u,r;if(1===c.nodeType&&-1===g.indexOf(c.nodeName)){n=z.getComputedStyle(c,null);k="svg"===c.nodeName?{}:z.getComputedStyle(c.parentNode,null);e[c.nodeName]||(l=p.getElementsByTagName("svg")[0],w=p.createElementNS(c.namespaceURI,c.nodeName),l.appendChild(w),e[c.nodeName]=y(z.getComputedStyle(w,null)),"text"===c.nodeName&&delete e.text.fill,l.removeChild(w));if(M||L)for(var x in n)m(n[x],x);else G(n,m);t&&(n=c.getAttribute("style"),c.setAttribute("style",(n?n+
    ";":"")+t));"svg"===c.nodeName&&c.setAttribute("stroke-width","1px");"text"!==c.nodeName&&v(c.children||c.childNodes,b)}}var c=this.renderer,d=c.inlineToAttributes,f=c.inlineBlacklist,h=c.inlineWhitelist,g=c.unstyledElements,e={},l,p,c=r.createElement("iframe");F(c,{width:"1px",height:"1px",visibility:"hidden"});r.body.appendChild(c);p=c.contentWindow.document;p.open();p.write('\x3csvg xmlns\x3d"http://www.w3.org/2000/svg"\x3e\x3c/svg\x3e');p.close();b(this.container.querySelector("svg"));l.parentNode.removeChild(l)};
    K.menu=function(a,b,c,d){return["M",a,b+2.5,"L",a+c,b+2.5,"M",a,b+d/2+.5,"L",a+c,b+d/2+.5,"M",a,b+d-1.5,"L",a+c,b+d-1.5]};x.prototype.renderExporting=function(){var a=this,b=a.options.exporting,c=b.buttons,d=a.isDirtyExporting||!a.exportSVGElements;a.buttonOffset=0;a.isDirtyExporting&&a.destroyExport();d&&!1!==b.enabled&&(a.exportEvents=[],a.exportingGroup=a.exportingGroup||a.renderer.g("exporting-group").attr({zIndex:3}).add(),G(c,function(b){a.addButton(b)}),a.isDirtyExporting=!1);q(a,"destroy",
        a.destroyExport)};q(x,"init",function(){var a=this;v(["exporting","navigation"],function(b){a[b]={update:function(c,d){a.isDirtyExporting=!0;y(!0,a.options[b],c);B(d,!0)&&a.redraw()}}})});x.prototype.callbacks.push(function(a){a.renderExporting();q(a,"redraw",a.renderExporting)})})(h)});
