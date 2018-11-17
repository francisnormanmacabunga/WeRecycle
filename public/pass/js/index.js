!function(t){t.fn.extend({complexify:function(n,e){function r(t,n){for(var e=t.length-1;e>=0;e--)if(n[0]<=t.charCodeAt(e)&&t.charCodeAt(e)<=n[1])return n[1]-n[0]+1;return 0}var a=49,h=120,i=[[48,57],[65,90],[97,122],[33,47],[58,64],[91,96],[123,126],[128,255],[256,383],[384,591],[592,687],[688,767],[768,879],[880,1023],[1024,1279],[1328,1423],[1424,1535],[1536,1791],[1792,1871],[1920,1983],[2304,2431],[2432,2559],[2560,2687],[2688,2815],[2816,2943],[2944,3071],[3072,3199],[3200,3327],[3328,3455],[3456,3583],[3584,3711],[3712,3839],[3840,4095],[4096,4255],[4256,4351],[4352,4607],[4608,4991],[5024,5119],[5120,5759],[5760,5791],[5792,5887],[6016,6143],[6144,6319],[7680,7935],[7936,8191],[8192,8303],[8304,8351],[8352,8399],[8400,8447],[8448,8527],[8528,8591],[8592,8703],[8704,8959],[8960,9215],[9216,9279],[9280,9311],[9312,9471],[9472,9599],[9600,9631],[9632,9727],[9728,9983],[9984,10175],[10240,10495],[11904,12031],[12032,12255],[12272,12287],[12288,12351],[12352,12447],[12448,12543],[12544,12591],[12592,12687],[12688,12703],[12704,12735],[12800,13055],[13056,13311],[13312,19893],[19968,40959],[40960,42127],[42128,42191],[44032,55203],[55296,56191],[56192,56319],[56320,57343],[57344,63743],[63744,64255],[64256,64335],[64336,65023],[65056,65071],[65072,65103],[65104,65135],[65136,65278],[65279,65279],[65280,65519],[65520,65533]],o={minimumChars:8,strengthScaleFactor:1};return t.isFunction(n)&&!e&&(e=n,n={}),n=t.extend(o,n),this.each(function(){t(this).on("keyup paste keypress",function(){for(var o=t(this).val(),c=0,u=!1,s=i.length-1;s>=0;s--)c+=r(o,i[s]);c=Math.log(Math.pow(c,o.length))*(1/n.strengthScaleFactor),u=c>a&&o.length>=n.minimumChars,c=c/h*100,c=c>100?100:c,e.call(this,u,c)})})}})}(jQuery);

(function( $ ) {

	var PwdMeter = function( element, params ) {

		params = params || {};

		var defaults = {
			minimumChars: 6,
			strengthScaleFactor: 0.7
		};

		this.$element = $( element );
		this.$progress = $( "#password-meter-progress" );
		this.settings = $.extend( defaults, params );

		if( this.$element.length ) {
			this.init();
		}
	};

	PwdMeter.prototype = {
		init: function() {
			var self = this;
			self.$element.complexify( self.settings, function( valid, complexity ) {
				self.progress( complexity, self.$progress );
			});
		},
		progress: function( n, el ) {
			var self = this;
			var amount = parseInt( n, 10 );
			var perc = amount + "%";
			if( amount <= 40 ) {
				el.removeClass().addClass( "low" );
			} else if( amount > 40 && amount <= 60 ) {
				el.removeClass().addClass( "medium" );
			} else if( amount > 60 && amount <= 100 ) {
				el.removeClass().addClass( "high" );
			}
		   	if( amount <= 100 ) {
				el.css( "width", perc );
			}
		}
	};

	$(function() {
		var $meter = new PwdMeter( "#pwd" );
	});

})( jQuery );
