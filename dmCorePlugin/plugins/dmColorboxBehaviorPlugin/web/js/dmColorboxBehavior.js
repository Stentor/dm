(function($) {    
    
    var methods = {        
        init: function(behavior) {                       
            var $this = $(this), data = $this.data('dmColorboxBehavior');
            if (data && behavior.dm_behavior_id != data.dm_behavior_id) { // There is attached the same, so we must report it
                alert('You can not attach captify behavior to same content'); // TODO TheCelavi - adminsitration mechanizm for this? Reporting error
            };
            $this.data('dmColorboxBehavior', behavior);
        },
        
        start: function(behavior) {  
            var $this = $(this);
            var theme=behavior.theme;
            behavior.returnFocus=false;
            behavior.onOpen=function(){
					$('#colorbox').addClass(theme);
					$('#cboxOverlay').addClass(theme);
				}
			behavior.onCleanup=function(){
					$('#colorbox').removeClass(theme);
					$('#cboxOverlay').removeClass(theme);
				}
            $this.colorbox(behavior);
        },
        stop: function(behavior) {
            $.colorbox.remove();
        },
        destroy: function(behavior) {            
            var $this = $(this);
             $.colorbox.remove();
            $this.data('dmColorboxBehavior', null);
        }
    }
    
    $.fn.dmColorboxBehavior = function(method, behavior){
        
        return this.each(function() {
            if ( methods[method] ) {
                return methods[ method ].apply( this, [behavior]);
            } else if ( typeof method === 'object' || ! method ) {
                return methods.init.apply( this, [method] );
            } else {
                $.error( 'Method ' +  method + ' does not exist on jQuery.dmCaptifyBehavior' );
            }  
        });
    };

    $.extend($.dm.behaviors, {        
        dmColorboxBehavior: {
            init: function(behavior) {
                $($.dm.behaviorsManager.getCssXPath(behavior) + ' ' + behavior.inner_target).dmColorboxBehavior('init', behavior);
            },
            start: function(behavior) {
                $($.dm.behaviorsManager.getCssXPath(behavior) + ' ' + behavior.inner_target).dmColorboxBehavior('start', behavior);
            },
            stop: function(behavior) {
                $($.dm.behaviorsManager.getCssXPath(behavior) + ' ' + behavior.inner_target).dmColorboxBehavior('stop', behavior);
            },
            destroy: function(behavior) {
                $($.dm.behaviorsManager.getCssXPath(behavior) + ' ' + behavior.inner_target).dmColorboxBehavior('destroy', behavior);
            }
        }
    });
    
})(jQuery);
