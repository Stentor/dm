$.fn.extend({
  
  dmWidgetNavigationSubMenuForm: function(widget)
  {
    var self = this,
		
		formName = self.metadata().form_name,
		
		$form = self.find('form:first')
		  .append('<input type="hidden" name="'+formName+'[widget_width]" value="'+widget.element.width()+'" />')
		,
		
		$tabs = $form.find('div.dm_tabbed_form')
		  .dmCoreTabForm()
		,
		
 
	  deleteMessage = $medias.metadata().delete_message

  }
});