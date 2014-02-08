(function() {
  var template = Handlebars.template, templates = Handlebars.templates = Handlebars.templates || {};
templates['form'] = template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [2,'>= 1.0.0-rc.3'];
helpers = helpers || Handlebars.helpers; data = data || {};
  


  return "<form class=\"form-horizontal\">\n	<fieldset>\n		<legend>New Menu Item</legend>\n		<div class=\"control-group\">\n			<input type=\"text\" name=\"name\" placeholder=\"Name\" />\n		</div>\n		<div class=\"control-group\">\n			<input type=\"text\" name=\"category\" placeholder=\"Category\" />\n		</div>\n		<div class=\"control-group\">\n			<input type=\"text\" name=\"url\" placeholder=\"URL\" />\n		</div>\n		<div class=\"control-group\">\n			<input type=\"text\" name=\"imagepath\" placeholder=\"Path to image\" />\n		</div>\n		<button type=\"button\" class=\"btn btn-danger\">Cancel</button>\n		<button type=\"button\" class=\"btn btn-primary\">Save</button>\n	</fieldset>\n</form>";
  });
templates['details'] = template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [2,'>= 1.0.0-rc.3'];
helpers = helpers || Handlebars.helpers; data = data || {};
  var buffer = "", stack1, functionType="function", escapeExpression=this.escapeExpression;


  buffer += "<div>\n	<h1>";
  if (stack1 = helpers.name) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.name; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</h1>\n	<p><span class=\"label\">";
  if (stack1 = helpers.category) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.category; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</span></p>\n	<img src=\"photos/";
  if (stack1 = helpers.imagepath) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.imagepath; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "\" class=\"img-polaroid\" />\n</div>\n<p></p>\n<button type=\"button\" class=\"btn btn-danger confirm-delete\">Delete</button>";
  return buffer;
  });
templates['menu'] = template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [2,'>= 1.0.0-rc.3'];
helpers = helpers || Handlebars.helpers; data = data || {};
  var buffer = "", stack1, functionType="function", escapeExpression=this.escapeExpression, self=this;

function program1(depth0,data) {
  
  var buffer = "", stack1;
  buffer += "<li>"
    + escapeExpression(((stack1 = ((stack1 = depth0.attributes),stack1 == null || stack1 === false ? stack1 : stack1.name)),typeof stack1 === functionType ? stack1.apply(depth0) : stack1))
    + "</li>";
  return buffer;
  }

  buffer += "<ul>\n	";
  stack1 = helpers.each.call(depth0, depth0.models, {hash:{},inverse:self.noop,fn:self.program(1, program1, data),data:data});
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "\n</ul>";
  return buffer;
  });
})();