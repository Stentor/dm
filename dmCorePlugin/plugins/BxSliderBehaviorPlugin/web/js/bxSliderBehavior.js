(function($) {    
    
    var methods = {        
        init: function(behavior) {                       
            var $this = $(this), data = $this.data('bxSliderBehavior');
            if (data && behavior.dm_behavior_id != data.dm_behavior_id) { // There is attached the same, so we must report it
                alert('You can not attach captify behavior to same content'); // TODO TheCelavi - adminsitration mechanizm for this? Reporting error
            };
            $this.data('bxSliderBehavior', behavior);
        },
        
        start: function(behavior) { 
            var $this=$(this); 
            var slider = $(this).bxSlider(behavior);
            $this.data('bxInstance', slider);

        },
        stop: function(behavior) {

          $(this).data('bxInstance').destroySlider()
        },
        destroy: function(behavior) {            
           var $this=$(this);
           $this.data('bxSliderBehavior', null);
           //$(this).data('bxInstance').destroySlider();
        }
    }
    
    $.fn.bxSliderBehavior = function(method, behavior){
        
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
        bxSliderBehavior: {
            init: function(behavior) {
                $($.dm.behaviorsManager.getCssXPath(behavior) + ' ' + behavior.inner_target).bxSliderBehavior('init', behavior);
            },
            start: function(behavior) {
                $($.dm.behaviorsManager.getCssXPath(behavior) + ' ' + behavior.inner_target).bxSliderBehavior('start', behavior);
            },
            stop: function(behavior) {
                $($.dm.behaviorsManager.getCssXPath(behavior) + ' ' + behavior.inner_target).bxSliderBehavior('stop', behavior);
            },
            destroy: function(behavior) {
                $($.dm.behaviorsManager.getCssXPath(behavior) + ' ' + behavior.inner_target).bxSliderBehavior('destroy', behavior);
            }
        }
    });
    
})(jQuery);
