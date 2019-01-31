const app = new Vue({
	el: '#app',
	data: {
		items: [{
			message: "hey",
			name: "John Doe"
		}, {
			message: "ho",
			name: "Johnny Cash"
		}]
	},
	mounted: function() {
		console.log('hey');
	},
	methods: {
		submitTweet() {
			this.items.push({
				message: this.$refs.message.value,
				name: this.$refs.user.value
			})
		}
	}
});