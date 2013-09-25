var AuctionCollection = Backbone.Collection.extend({
// http://us.battle.net/api/wow/realm/status

// http://us.battle.net/api/wow/auction/data/blades-edge

// http://us.battle.net/api/wow/item/74843
	model: Auction,
	fetch: function() {
		var scope = this;
		// Need to use non-json apparently.
		$.getJSON("module/auction/data/blades-edge-auctions.json", {}, function(data, textStatus, jqXHR) {
			console.log("loaded!");
			console.log(data.alliance.auctions.length);
			$.each(data.alliance.auctions, function(idx, auction) {
				scope.add(auction);
			});
		});
	},
});