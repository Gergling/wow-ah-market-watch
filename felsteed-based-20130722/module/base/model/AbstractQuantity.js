var AbstractQuantity = Backbone.Model.extend({
	model:null,
	quantity: 0,
	idAttribute:"name",
	setModelByName: function(name, collection) {
		if (collection) {
			try {
				this.set("model", collection.get(name));
			} catch(e) {
				console.error("AbstractQuantity.setModelByName:", "Cannot find", name, "in collection:", collection);
			}
		} else {
			console.error("AbstractQuantity.setModelByName:", "Null collection object when looking for '"+name+"'");
		}
	},
	// Maybe this logic should go into the collection object.
});
