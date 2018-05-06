/*
Product Name: dhtmlxColorPicker 
Version: 5.0 
Edition: Standard 
License: content of this file is covered by GPL. Usage outside GPL terms is prohibited. To obtain Commercial or Enterprise license contact sales@dhtmlx.com
Copyright UAB Dinamenta http://www.dhtmlx.com
*/

window.dhtmlxAjax={get:function(a,c,b){if(b){return dhx4.ajax.getSync(a)}else{dhx4.ajax.get(a,c)}},post:function(a,b,d,c){if(c){return dhx4.ajax.postSync(a,b)}else{dhx4.ajax.post(a,b,d)}},getSync:function(a){return dhx4.ajax.getSync(a)},postSync:function(a,b){return dhx4.ajax.postSync(a,b)}};window.dhtmlXColorPickerInput=function(){return dhtmlXColorPicker.apply(window,arguments)};dhtmlXColorPicker.prototype.init=function(){};dhtmlXColorPicker.prototype.setOnSelectHandler=function(a){if(typeof a=="function"){this.attachEvent("onSelect",a)}};dhtmlXColorPicker.prototype.setOnCancelHandler=function(a){if(typeof a=="function"){this.attachEvent("onCancel",a)}};dhtmlXColorPicker.prototype._mergeLangModules=function(){if(typeof dhtmlxColorPickerLangModules!="object"){return}for(var a in dhtmlxColorPickerLangModules){this.i18n[a]=dhtmlxColorPickerLangModules[a]}};window.dhtmlxColorPickerLangModules=dhtmlXColorPicker.prototype.i18n;dhtmlXColorPicker.prototype.close=function(){this.hide()};dhtmlXColorPicker.prototype.setImagePath=function(a){};