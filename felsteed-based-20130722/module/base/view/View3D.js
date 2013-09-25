var View3D = Backbone.View.extend({
	initialize: function() {
		//var canvas = CanvasView.instance.$el;
		
	},
	setMesh: function(mesh) {
		this.mesh = mesh;
		this.mesh.view = this;
	},
	animate: function() {
		console.log(this.toScreenXY());
	},
	toScreenXY: function() {
		return CanvasView.instance.toScreenXY(this.mesh.position);
	},
});
// Contains a mesh
// Links to a model