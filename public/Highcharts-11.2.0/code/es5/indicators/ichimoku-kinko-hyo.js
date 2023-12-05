/**
 * Highstock JS v11.2.0 (2023-10-30)
 *
 * Indicator series type for Highcharts Stock
 *
 * (c) 2010-2021 Sebastian Bochan
 *
 * License: www.highcharts.com/license
 */!function(o){"object"==typeof module&&module.exports?(o.default=o,module.exports=o):"function"==typeof define&&define.amd?define("highcharts/indicators/ichimoku-kinko-hyo",["highcharts","highcharts/modules/stock"],function(t){return o(t),o.Highcharts=t,o}):o("undefined"!=typeof Highcharts?Highcharts:void 0)}(function(o){"use strict";var t=o?o._modules:{};function n(o,t,n,e){o.hasOwnProperty(t)||(o[t]=e.apply(null,n),"function"==typeof CustomEvent&&window.dispatchEvent(new CustomEvent("HighchartsModuleLoaded",{detail:{path:t,module:o[t]}})))}n(t,"Stock/Indicators/IKH/IKHIndicator.js",[t["Extensions/DataGrouping/ApproximationRegistry.js"],t["Core/Color/Color.js"],t["Core/Series/SeriesRegistry.js"],t["Core/Utilities.js"]],function(o,t,n,e){var i,p=this&&this.__extends||(i=function(o,t){return(i=Object.setPrototypeOf||({__proto__:[]})instanceof Array&&function(o,t){o.__proto__=t}||function(o,t){for(var n in t)Object.prototype.hasOwnProperty.call(t,n)&&(o[n]=t[n])})(o,t)},function(o,t){if("function"!=typeof t&&null!==t)throw TypeError("Class extends value "+String(t)+" is not a constructor or null");function n(){this.constructor=o}i(o,t),o.prototype=null===t?Object.create(t):(n.prototype=t.prototype,new n)}),s=t.parse,r=n.seriesTypes.sma,a=e.defined,l=e.extend,h=e.isArray,u=e.isNumber,c=e.getClosestDistance,f=e.merge,g=e.objectEach;function d(o){return{high:o.reduce(function(o,t){return Math.max(o,t[1])},-1/0),low:o.reduce(function(o,t){return Math.min(o,t[2])},1/0)}}function k(o){var t=o.indicator;t.points=o.points,t.nextPoints=o.nextPoints,t.color=o.color,t.options=f(o.options.senkouSpan.styles,o.gap),t.graph=o.graph,t.fillGraph=!0,n.seriesTypes.sma.prototype.drawGraph.call(t)}var y=function(o){function t(){var t=null!==o&&o.apply(this,arguments)||this;return t.data=[],t.options={},t.points=[],t.graphCollection=[],t}return p(t,o),t.prototype.init=function(){o.prototype.init.apply(this,arguments),this.options=f({tenkanLine:{styles:{lineColor:this.color}},kijunLine:{styles:{lineColor:this.color}},chikouLine:{styles:{lineColor:this.color}},senkouSpanA:{styles:{lineColor:this.color,fill:s(this.color).setOpacity(.5).get()}},senkouSpanB:{styles:{lineColor:this.color,fill:s(this.color).setOpacity(.5).get()}},senkouSpan:{styles:{fill:s(this.color).setOpacity(.2).get()}}},this.options)},t.prototype.toYData=function(o){return[o.tenkanSen,o.kijunSen,o.chikouSpan,o.senkouSpanA,o.senkouSpanB]},t.prototype.translate=function(){n.seriesTypes.sma.prototype.translate.apply(this);for(var o=0,t=this.points;o<t.length;o++)for(var e=t[o],i=0,p=this.pointArrayMap;i<p.length;i++){var s=p[i],r=e[s];u(r)&&(e["plot"+s]=this.yAxis.toPixels(r,!0),e.plotY=e["plot"+s],e.tooltipPos=[e.plotX,e["plot"+s]],e.isNull=!1)}},t.prototype.drawGraph=function(){var o,t,e,i,p,s,r,l,h,u,c,d,y,S=this,v=S.points,m=S.options,C=S.graph,A=S.color,x={options:{gapSize:m.gapSize}},Y=S.pointArrayMap.length,P=[[],[],[],[],[],[]],j={tenkanLine:P[0],kijunLine:P[1],chikouLine:P[2],senkouSpanA:P[3],senkouSpanB:P[4],senkouSpan:P[5]},B=[],b=S.options.senkouSpan,N=b.color||b.styles.fill,w=b.negativeColor,O=[[],[]],E=[[],[]],G=v.length,T=0;for(S.ikhMap=j;G--;){for(e=0,t=v[G];e<Y;e++)a(t[o=S.pointArrayMap[e]])&&P[e].push({plotX:t.plotX,plotY:t["plot"+o],isNull:!1});if(w&&G!==v.length-1){var X=j.senkouSpanB.length-1,L=function(o,t,n,e){if(o&&t&&n&&e){var i=t.plotX-o.plotX,p=t.plotY-o.plotY,s=e.plotX-n.plotX,r=e.plotY-n.plotY,a=o.plotX-n.plotX,l=o.plotY-n.plotY,h=(-p*a+i*l)/(-s*p+i*r),u=(s*l-r*a)/(-s*p+i*r);if(h>=0&&h<=1&&u>=0&&u<=1)return{plotX:o.plotX+u*i,plotY:o.plotY+u*p}}}(j.senkouSpanA[X-1],j.senkouSpanA[X],j.senkouSpanB[X-1],j.senkouSpanB[X]);if(L){var _={plotX:L.plotX,plotY:L.plotY,isNull:!1,intersectPoint:!0};j.senkouSpanA.splice(X,0,_),j.senkouSpanB.splice(X,0,_),B.push(X)}}}if(g(j,function(o,t){m[t]&&"senkouSpan"!==t&&(S.points=P[T],S.options=f(m[t].styles,x),S.graph=S["graph"+t],S.fillGraph=!1,S.color=A,n.seriesTypes.sma.prototype.drawGraph.call(S),S["graph"+t]=S.graph),T++}),S.graphCollection)for(var M=0,D=S.graphCollection;M<D.length;M++){var K=D[M];S[K].destroy(),delete S[K]}if(S.graphCollection=[],w&&j.senkouSpanA[0]&&j.senkouSpanB[0]){for(B.unshift(0),B.push(j.senkouSpanA.length-1),d=0;d<B.length-1;d++)if(i=B[d],p=B[d+1],s=j.senkouSpanB.slice(i,p+1),r=j.senkouSpanA.slice(i,p+1),Math.floor(s.length/2)>=1){var H=Math.floor(s.length/2);if(s[H].plotY===r[H].plotY){for(y=0,l=0,h=0;y<s.length;y++)l+=s[y].plotY,h+=r[y].plotY;O[c=l>h?0:1]=O[c].concat(s),E[c]=E[c].concat(r)}else O[c=s[H].plotY>r[H].plotY?0:1]=O[c].concat(s),E[c]=E[c].concat(r)}else O[c=s[0].plotY>r[0].plotY?0:1]=O[c].concat(s),E[c]=E[c].concat(r);["graphsenkouSpanColor","graphsenkouSpanNegativeColor"].forEach(function(o,t){O[t].length&&E[t].length&&(u=0===t?N:w,k({indicator:S,points:O[t],nextPoints:E[t],color:u,options:m,gap:x,graph:S[o]}),S[o]=S.graph,S.graphCollection.push(o))})}else k({indicator:S,points:j.senkouSpanB,nextPoints:j.senkouSpanA,color:N,options:m,gap:x,graph:S.graphsenkouSpan}),S.graphsenkouSpan=S.graph;delete S.nextPoints,delete S.fillGraph,S.points=v,S.options=m,S.graph=C,S.color=A},t.prototype.getGraphPath=function(o){var t,e=[],i=[];if(o=o||this.points,this.fillGraph&&this.nextPoints){if((t=n.seriesTypes.sma.prototype.getGraphPath.call(this,this.nextPoints))&&t.length){t[0][0]="L",e=n.seriesTypes.sma.prototype.getGraphPath.call(this,o),i=t.slice(0,e.length);for(var p=i.length-1;p>=0;p--)e.push(i[p])}}else e=n.seriesTypes.sma.prototype.getGraphPath.apply(this,arguments);return e},t.prototype.getValues=function(o,t){var n,e,i,p,s,r,a,l,u,f,g=t.period,k=t.periodTenkan,y=t.periodSenkouSpanB,S=o.xData,v=o.yData,m=o.xAxis,C=v&&v.length||0,A=c(m.series.map(function(o){return o.xData||[]})),x=[],Y=[];if(!(S.length<=g)&&h(v[0])&&4===v[0].length){var P=S[0]-g*A;for(s=0;s<g;s++)Y.push(P+s*A);for(s=0;s<C;s++)s>=k&&(r=((e=d(v.slice(s-k,s))).high+e.low)/2),s>=g&&(u=(r+(a=((i=d(v.slice(s-g,s))).high+i.low)/2))/2),s>=y&&(f=((p=d(v.slice(s-y,s))).high+p.low)/2),l=v[s][3],n=S[s],void 0===x[s]&&(x[s]=[]),void 0===x[s+g-1]&&(x[s+g-1]=[]),x[s+g-1][0]=r,x[s+g-1][1]=a,x[s+g-1][2]=void 0,void 0===x[s+1]&&(x[s+1]=[]),x[s+1][2]=l,s<=g&&(x[s+g-1][3]=void 0,x[s+g-1][4]=void 0),void 0===x[s+2*g-2]&&(x[s+2*g-2]=[]),x[s+2*g-2][3]=u,x[s+2*g-2][4]=f,Y.push(n);for(s=1;s<=g;s++)Y.push(n+s*A);return{values:x,xData:Y,yData:x}}},t.defaultOptions=f(r.defaultOptions,{params:{index:void 0,period:26,periodTenkan:9,periodSenkouSpanB:52},marker:{enabled:!1},tooltip:{pointFormat:'<span style="color:{point.color}">●</span> <b> {series.name}</b><br/>TENKAN SEN: {point.tenkanSen:.3f}<br/>KIJUN SEN: {point.kijunSen:.3f}<br/>CHIKOU SPAN: {point.chikouSpan:.3f}<br/>SENKOU SPAN A: {point.senkouSpanA:.3f}<br/>SENKOU SPAN B: {point.senkouSpanB:.3f}<br/>'},tenkanLine:{styles:{lineWidth:1,lineColor:void 0}},kijunLine:{styles:{lineWidth:1,lineColor:void 0}},chikouLine:{styles:{lineWidth:1,lineColor:void 0}},senkouSpanA:{styles:{lineWidth:1,lineColor:void 0}},senkouSpanB:{styles:{lineWidth:1,lineColor:void 0}},senkouSpan:{styles:{fill:"rgba(255, 0, 0, 0.5)"}},dataGrouping:{approximation:"ichimoku-averages"}}),t}(r);return l(y.prototype,{pointArrayMap:["tenkanSen","kijunSen","chikouSpan","senkouSpanA","senkouSpanB"],pointValKey:"tenkanSen",nameComponents:["periodSenkouSpanB","period","periodTenkan"]}),o["ichimoku-averages"]=function(){var t,n=[];return[].forEach.call(arguments,function(e,i){n.push(o.average(e)),t=!t&&void 0===n[i]}),t?void 0:n},n.registerSeriesType("ikh",y),y}),n(t,"masters/indicators/ichimoku-kinko-hyo.src.js",[],function(){})});//# sourceMappingURL=ichimoku-kinko-hyo.js.map