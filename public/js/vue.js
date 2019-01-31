const app = new Vue({
	el: '#app',
	data() {
		return {
			tweets: null
		}
	},
	mounted: function() {
		axios
			.get('/api/all')
			.then(response => (this.tweets = response.data))
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