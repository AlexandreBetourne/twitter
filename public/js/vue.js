const app = new Vue({
	el: '#app',
	data: {
		user: null,
		items: [{
			message: "hey",
			name: "John Doe"
		}, {
			message: "ho",
			name: "Johnny Cash"
		}]
	},
	mounted: function() {
		// for (var i = 0; i < 20; i++) {
		// 	this.items.push({
		// 		message: this.$refs.message.value,
		// 		name: this.$refs.user.value
		// 	})
		// }
		axios.get('https://randomuser.me/api/?format=json')
			.then(function(response) {
				console.log(response);
			})
			.catch(function(error) {
				// handle error
				console.log(error);
			})
			.then(function() {
				// always executed
			});
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