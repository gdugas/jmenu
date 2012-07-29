function Counter () {
	stack = 0;
	this.id = function () {
		stack = stack + 1;
		return stack - 1;
	}
}
counter = new Counter();


function item () {
	var self = this;
	
	this.id = 0;
	this.webid = 0;
	this.text = 0;
	this.url = 0;
	this.parent = 0;
	
	function init () {
		this.webid = counter.id();
	}
	
	this.remove = function () {
		
	}
	
	init();
}


$(document).ready(function () {
	
	$('#admin_menuitems > li').each(function () {
		
	});
	
	$("#admin_menuitems ul").sortable({
		connectWith: '#admin_menuitems ul',
		placeholder: "ui-state-highlight",
	});
});