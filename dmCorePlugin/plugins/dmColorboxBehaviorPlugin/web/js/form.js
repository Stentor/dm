$.fn.extend({
  
  dmColorboxBehaviorForm: function(widget)
  {
    var self = this,
		
		formName = self.metadata().form_name,
		$form = self.find('form:first'),
		$tabs = $form.find('div.dm_tabbed_form').dmCoreTabForm()
  }
});
